<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepositoryInterface as CategoryRepository;
use App\Repositories\Post\PostRepositoryInterface as PostRepository;
use App\Repositories\Tag\TagRepositoryInterface as TagRepository;
use Illuminate\Support\Facades\Cache;
use App\Models\Post;
use CyrildeWit\EloquentViewable\Support\Period;

class CategoryController extends FrontendController
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

    public function index()
    {
        $dataSidebar = $this->getSideBarData();
        $latestPostsSidebar = $dataSidebar->latestPostsSidebar;
        $popularPostsSidebar = $dataSidebar->popularPostsSidebar;
        $latestTags = $dataSidebar->latestTags;

        return view('frontend.overall_category', compact(
            'latestPostsSidebar',
            'popularPostsSidebar',
            'latestTags'
        ));
    }

    public function show(Request $request)
    {
        $page = $request->get('page') ? $request->get('page') : 1;
        $dataSidebar = $this->getSideBarData();
        $latestPostsSidebar = $dataSidebar->latestPostsSidebar;
        $popularPostsSidebar = $dataSidebar->popularPostsSidebar;
        $latestTags = $dataSidebar->latestTags;
        $category = $this->categoryRepository->getByColumn($request->slug, 'slug');
        $category->load(['posts' => function ($query) use ($page) {
            $query->orderBy('created_at', 'desc')
                ->skip(($page - 1) * config('company.limit_posts.category_detail'))
                ->take(config('company.limit_posts.category_detail'));
        }]);
        $posts = $category->posts;
        $dataPagination = $this->paginationCategoryPosts($page, $category);

        return view('frontend.detail_category', compact(
            'latestPostsSidebar',
            'popularPostsSidebar',
            'latestTags',
            'category',
            'posts',
            'dataPagination'
        ));
    }

    public function getSideBarData()
    {
        $data = collect();
        $data->popularPostsSidebar = Cache::remember(
            'popular_posts_sidebar',
            config('company.cache_time.popular_posts_sidebar'),
            function () {
                return Post::orderBy('created_at', 'desc')
                    ->orderByViews('desc', Period::pastDays(config('company.popular_posts_views_per')))
                    ->take(config('company.limit_posts.popular_posts_sidebar'))
                    ->get();
            }
        );
        $data->latestPostsSidebar = Cache::remember(
            'latest_posts_sidebar',
            config('company.cache_time.latest_posts_layout'),
            function () {
                return $this->postRepository->getLatestPost(config('company.limit_posts.latest_posts_sidebar'));
            }
        );
        $data->latestTags = Cache::remember(
            'latest_tags',
            config('company.cache_time.latest_tags'),
            function () {
                return $this->tagRepository->getLatestTags(config('company.limit_posts.latest_tags'));
            }
        );

        return $data;
    }

    public function paginationCategoryPosts($page, $category)
    {
        $dataPagination = collect();
        $dataPagination->page = $page;
        $totalPosts = $category->posts()->count();
        $dataPagination->lastPage =
            is_float($totalPosts / config('company.limit_posts.category_detail'))
                ? intdiv($totalPosts, config('company.limit_posts.category_detail'))
                : intdiv($totalPosts, config('company.limit_posts.category_detail')) - 1;
        $dataPagination->previous = ($page > 1) ? true : false;
        $dataPagination->next = ($page < $dataPagination->lastPage) ? true : false;
        $dataPagination->routeName = 'category.detail';
        $dataPagination->previousRouteParams = ['page' => $page - 1, 'slug' => $category->slug];
        $dataPagination->nextRouteParams = ['page' => $page + 1, 'slug' => $category->slug];
        $dataPagination->firstRouteParams = ['page' => 1, 'slug' => $category->slug];
        $dataPagination->lastRouteParams = ['page' => $dataPagination->lastPage, 'slug' => $category->slug];

        return $dataPagination;
    }
}
