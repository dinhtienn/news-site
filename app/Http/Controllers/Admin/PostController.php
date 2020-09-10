<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\ContentProcessor;
use App\Repositories\Post\PostRepositoryInterface as PostRepository;
use App\Repositories\Category\CategoryRepositoryInterface as CategoryRepository;
use App\Repositories\Tag\TagRepositoryInterface as TagRepository;

class PostController extends AdminController
{
    protected $postRepository;
    protected $categoryRepository;
    protected $tagRepository;

    public function __construct(
        PostRepository $postRepository,
        CategoryRepository $categoryRepository,
        TagRepository $tagRepository
    ) {
        parent::__construct();
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
        $this->middleware('check_admin')->only([
            'acceptPost',
            'hidePost'
        ]);
    }

    public function index()
    {
        $posts = $this->postRepository->all();

        return view('admin.post', compact('posts'));
    }

    public function rejectedPosts()
    {
        $posts = $this->postRepository->getRejectedPosts();

        return view('admin.rejected_post', compact('posts'));
    }

    public function waitingPosts()
    {
        $posts = $this->postRepository->getWaitingPosts();

        return view('admin.waiting_post', compact('posts'));
    }

    public function myPosts()
    {
        $posts = $this->postRepository->getMyPosts(Auth::id());

        return view('admin.my_post', compact('posts'));
    }

    public function acceptPost(Request $request)
    {
        $this->postRepository->updateByIdWithoutScope(
            $request->get('id'),
            [
                'status' => config('company.post_status.accepted'),
                'admin_id' => Auth::id()
            ]
        );

        return redirect()->route('post.waiting');
    }

    public function hidePost(Request $request)
    {
        $this->postRepository->updateById(
            $request->get('id'),
            [
                'status' => config('company.post_status.waiting')
            ]
        );

        return redirect()->route('post.index');
    }

    public function rejectPost(Request $request)
    {
        $this->postRepository->updateByIdWithoutScope(
            $request->get('id'),
            [
                'status' => config('company.post_status.rejected'),
                'admin_id' => Auth::id()
            ]
        );

        return redirect()->route('post.index');
    }

    public function reviewPost(Request $request)
    {
        $categories = $this->categoryRepository->all();
        $post = $this->postRepository->getByIdWithoutScope($request->get('id'));
        $tags = '';
        foreach ($post->tags as $tag) {
            $tags .= ",$tag->name";
        }
        if (strlen($tags) > 0) {
            $tags = substr($tags, 1);
        }
        $review = true;
        $reviewContent = $post->comments()->where([
            'type' => config('company.comment.type.review'),
            'status' => config('company.comment.status.waiting')
        ])->first();

        return view('admin.post_edit', compact(
            'categories',
            'post',
            'tags',
            'review',
            'reviewContent'
        ));
    }

    public function create()
    {
        $categories = $this->categoryRepository->all();

        return view('admin.post_create', compact('categories'));
    }

    public function store(PostRequest $request)
    {
        $data = [
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'user_id' => Auth::id(),
            'content' => ContentProcessor::addDivContent($request->request->get('content')),
            'category_id' => $request->category_id,
        ];
        if (!$request->thumbnail) {
            $data['thumbnail'] = strpos($request->request->get('content'), '<img') ?
                explode('"', explode('src="', $request->request->get('content'))[1])[0] :
                config('company.default_post_img');
        } else {
            $thumbnail = $request->thumbnail;
            $filename = uniqid() . '-' . $thumbnail->getClientOriginalName();
            $thumbnail->move('storage/', $filename);
            $data['thumbnail'] = "/storage/$filename";
        }
        $post = $this->postRepository->create($data);
        $this->addTags($post->id, $request->tags);

        return redirect()->route('post.index');
    }

    public function edit(Request $request)
    {
        $categories = $this->categoryRepository->all();
        $post = $this->postRepository->getByIdWithoutScope($request->post);
        $tags = '';
        foreach ($post->tags as $tag) {
            $tags .= ",$tag->name";
        }
        if (strlen($tags) > 0) {
            $tags = substr($tags, 1);
        }
        if (Auth::user()->role !== 'admin' && Auth::id() !== $post->user_id) {
            abort(403);
        }

        return view('admin.post_edit', compact('categories', 'post', 'tags'));
    }

    public function update(PostRequest $request)
    {
        $post = $this->postRepository->getByIdWithoutScope($request->post);
        if (Auth::user()->role !== 'admin' && Auth::id() !== $post->user_id) {
            abort(403);
        }
        $this->postRepository->updateByIdWithoutScope($post->id, array_merge(
            $request->all(),
            ['slug' => str_slug($request->title)]
        ));
        $this->addTags($post->id, $request->tags);

        return redirect()->route('post.index');
    }

    public function destroy(Request $request)
    {
        $post = $this->postRepository->getByIdWithoutScope($request->get('id'));
        if (Auth::user()->role !== 'admin' && Auth::id() !== $post->user_id) {
            abort(403);
        }
        DB::transaction(function () use ($request, $post) {
            $post->comments()->delete();
            $post->likes()->delete();
            DB::table('tag_post')
                ->where('post_id', $request->get('id'))
                ->delete();
            $post->delete();
        });

        return redirect()->route('post.index');
    }

    public function addTags($postId, $tags)
    {
        $tagsId = [];
        if (!empty($tags)) {
            $tags = explode(',', $tags);
            foreach ($tags as $tag) {
                $foundTag = $this->tagRepository->getByColumn($tag, 'name');
                if (!$foundTag) {
                    $foundTag = $this->tagRepository->create(['name' => $tag]);
                }
                if (!$foundTag->posts->contains($postId)) {
                    $foundTag->posts()->attach($postId);
                }
                $tagsId[] = $foundTag->id;
            }
        }

        $post = $this->postRepository->getById($postId);
        $post->tags()->sync($tagsId);
    }
}
