<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\View;
use App\Repositories\Category\CategoryRepositoryInterface as CategoryRepository;
use App\Repositories\Post\PostRepositoryInterface as PostRepository;
use Illuminate\Support\Facades\Cache;

class FrontendController extends Controller
{
    protected $categoryRepository;
    protected $postRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        PostRepository $postRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
        $this->getLocale();
        View::share('dateNow', Date::now()->format('l, F j'));
        View::share(
            'categories',
            Cache::remember(
                'category_menu',
                config('company.cache_time.category_menu'),
                function () {
                    return $this->categoryRepository->getCategories();
                }
            )
        );
        View::share(
            'latestPostsSidebar',
            Cache::remember(
                'latest_posts_sidebar',
                config('company.cache_time.latest_posts_layout'),
                function () {
                    return $this->postRepository->getLatestPost(config('company.limit_posts.latest_posts_sidebar'));
                }
            )
        );
        View::share(
            'latestPostsFooter',
            Cache::remember(
                'latest_posts_footer',
                config('company.cache_time.latest_posts_layout'),
                function () {
                    return $this->postRepository->getLatestPost(config('company.limit_posts.latest_posts_footer'));
                }
            )
        );
    }

    public function getLocale()
    {
        if (!empty(Cookie::get('news-site-locale'))) {
            App::setLocale(Cookie::get('news-site-locale'));
        }
    }

    public function setLocale(Request $request)
    {
        return redirect()->back()->cookie(
            'news-site-locale',
            $request->get('locale'),
            config('app.locale_cookie_time')
        );
    }
}
