<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepositoryInterface as CategoryRepository;
use App\Repositories\Post\PostRepositoryInterface as PostRepository;
use App\Repositories\Tag\TagRepositoryInterface as TagRepository;
use Illuminate\Support\Facades\Cache;
use CyrildeWit\EloquentViewable\Support\Period;
use App\Models\Post;

class TagController extends FrontendController
{
    protected $tagRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        PostRepository $postRepository,
        TagRepository $tagRepository
    ) {
        parent::__construct($categoryRepository, $postRepository);
        $this->tagRepository = $tagRepository;
    }

    public function show(Request $request)
    {
        $page = $request->get('page') ? $request->get('page') : 1;
        $popularPostsSidebar = Cache::remember(
            'popular_posts_sidebar',
            config('company.cache_time.popular_posts_sidebar'),
            function () {
                return Post::orderBy('created_at', 'desc')
                    ->orderByViews('desc', Period::pastDays(config('company.popular_posts_views_per')))
                    ->take(config('company.limit_posts.popular_posts_sidebar'))
                    ->get();
            }
        );
        $latestPostsSidebar = Cache::remember(
            'latest_posts_sidebar',
            config('company.cache_time.latest_posts_layout'),
            function () {
                return $this->postRepository->getLatestPost(config('company.limit_posts.latest_posts_sidebar'));
            }
        );
        $latestTags = Cache::remember(
            'latest_tags',
            config('company.cache_time.latest_tags'),
            function () {
                return $this->tagRepository->getLatestTags(config('company.limit_posts.latest_tags'));
            }
        );
        $tag = $this->tagRepository->getByColumn($request->name, 'name');
        $tag->load(['posts' => function ($query) use ($page) {
            $query->orderBy('created_at', 'desc')
                ->skip(($page - 1) * config('company.limit_posts.tag_detail'))
                ->take(config('company.limit_posts.tag_detail'));
        }]);
        $posts = $tag->posts;
        $posts->load('category');
        $dataPagination = $this->paginationTagPosts($page, $tag);

        return view('frontend.tags', compact(
            'popularPostsSidebar',
            'latestPostsSidebar',
            'latestTags',
            'tag',
            'posts',
            'dataPagination'
        ));
    }

    public function paginationTagPosts($page, $tag)
    {
        $dataPagination = collect();
        $dataPagination->page = $page;
        $totalPosts = $tag->posts()->count();
        $dataPagination->lastPage =
            is_float($totalPosts / config('company.limit_posts.tag_detail'))
                ? intdiv($totalPosts, config('company.limit_posts.tag_detail'))
                : intdiv($totalPosts, config('company.limit_posts.tag_detail')) - 1;
        $dataPagination->previous = ($page > 1) ? true : false;
        $dataPagination->next = ($page < $dataPagination->lastPage) ? true : false;
        $dataPagination->routeName = 'tag.detail';
        $dataPagination->previousRouteParams = ['page' => $page - 1, 'name' => $tag->name];
        $dataPagination->nextRouteParams = ['page' => $page + 1, 'name' => $tag->name];
        $dataPagination->firstRouteParams = ['page' => 1, 'name' => $tag->name];
        $dataPagination->lastRouteParams = ['page' => $dataPagination->lastPage, 'name' => $tag->name];

        return $dataPagination;
    }
}
