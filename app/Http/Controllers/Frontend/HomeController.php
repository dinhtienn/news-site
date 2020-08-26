<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\Category\CategoryRepositoryInterface as CategoryRepository;
use App\Repositories\Post\PostRepositoryInterface as PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Post;
use CyrildeWit\EloquentViewable\Support\Period;

class HomeController extends FrontendController
{
    protected $postRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        PostRepository $postRepository
    )
    {
        parent::__construct($categoryRepository, $postRepository);
        $this->postRepository = $postRepository;
    }

    public function index(Request $request)
    {
        $page = $request->get('page') ? $request->get('page') : 1;
        if ($page === 1) {
            $latestPosts = Cache::remember(
                'latest_posts',
                config('company.cache_time.latest_posts_homepage'),
                function () {
                    return $this
                        ->postRepository
                        ->getLatestPost(config('company.limit_posts.latest_posts_homepage'));
                }
            );
            $dataPagination = Cache::remember(
                'data_pagination',
                config('company.cache_time.pagination'),
                function () {
                    return $this->paginationLatestPosts(1);
                }
            );
        } else {
            $latestPosts = $this->postRepository->getPaginationPosts(
                ($page - 1) * config('company.limit_posts.latest_posts_homepage'),
                config('company.limit_posts.latest_posts_homepage')
            );
            $dataPagination = $this->paginationLatestPosts($page);
        }

        $hotPosts = Cache::remember(
            'hot_posts',
            config('company.cache_time.hot_posts'),
            function () {
                return Post::orderBy('created_at', 'desc')
                    ->with('category')
                    ->orderByViews('desc', Period::pastDays(config('company.hot_posts_views_per')))
                    ->take(config('company.limit_posts.hot_posts'))
                    ->get();
            }
        );
        $popularPosts = Cache::remember(
            'popular_posts',
            config('company.cache_time.popular_posts_homepage'),
            function () {
                return Post::orderBy('created_at', 'desc')
                    ->with('category')
                    ->orderByViews('desc', Period::pastDays(config('company.popular_posts_views_per')))
                    ->take(config('company.limit_posts.popular_posts_homepage'))
                    ->get();
            }
        );

        return view('frontend.homepage', compact(
            'latestPosts',
            'hotPosts',
            'popularPosts',
            'dataPagination'
        ));
    }

    public function paginationLatestPosts($page)
    {
        $dataPagination = collect();
        $dataPagination->page = $page;
        $totalPosts = $this->postRepository->count();
        $dataPagination->lastPage =
            is_float($totalPosts / config('company.limit_posts.latest_posts_homepage'))
                ? intdiv($totalPosts, config('company.limit_posts.latest_posts_homepage'))
                : intdiv($totalPosts, config('company.limit_posts.latest_posts_homepage')) - 1;
        $dataPagination->previous = ($page > 1) ? true : false;
        $dataPagination->next = ($page < $dataPagination->lastPage) ? true : false;
        $dataPagination->routeName = 'home';
        $dataPagination->previousRouteParams = ['page' => $page - 1];
        $dataPagination->nextRouteParams = ['page' => $page + 1];
        $dataPagination->firstRouteParams = ['page' => 1];
        $dataPagination->lastRouteParams = ['page' => $dataPagination->lastPage];

        return $dataPagination;
    }
}
