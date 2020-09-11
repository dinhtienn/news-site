<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepositoryInterface as CategoryRepository;
use App\Repositories\Post\PostRepositoryInterface as PostRepository;
use Illuminate\Support\Facades\Auth;

class PostController extends FrontendController
{
    public function __construct(
        CategoryRepository $categoryRepository,
        PostRepository $postRepository
    ) {
        parent::__construct($categoryRepository, $postRepository);
    }

    public function show(Request $request)
    {
        if (Auth::check() && Auth::user()->role->name !== 'user') {
            $post = $this->postRepository->getByColumnWithoutScope($request->slug, 'slug');
            if ($post->status === config('company.post_status.rejected')) {
                abort(404);
            }
        } else {
            $post = $this->postRepository->getByColumn($request->slug, 'slug');
            if (!$post) {
                abort(403);
            }
        }
        $post->load('tags');
        $relatedPosts = $post
            ->category
            ->posts()
            ->where('id', '!=', $post->id)
            ->orderBy('created_at', 'desc')
            ->take(config('company.limit_posts.related_posts'))
            ->get(['title', 'slug', 'thumbnail']);
        views($post)->cooldown(config('company.count_views_cooldown_time'))->record();
        $viewNumber = views($post)->count();
        $liked = Auth::check() ? $post->likedUsers->contains(Auth::user()) : false;
        $comments = $post->comments()->where([
            'type' => config('company.comment.type.comment'),
            'status' => config('company.comment.status.display'),
            'parent_id' => null
        ])->with('children', 'user')->get();

        return view('frontend.posts', compact(
            'post',
            'relatedPosts',
            'viewNumber',
            'liked',
            'comments'
        ));
    }
}
