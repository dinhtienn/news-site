<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepositoryInterface as CategoryRepository;
use App\Repositories\Post\PostRepositoryInterface as PostRepository;

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
        $post = $this->postRepository->getByColumn($request->slug, 'slug');
        $relatedPosts = $post
            ->category
            ->posts()
            ->orderBy('created_at', 'desc')
            ->take(config('company.limit_posts.related_posts'))
            ->get(['title', 'slug', 'thumbnail']);
        views($post)->cooldown(config('company.count_views_cooldown_time'))->record();
        $viewNumber = views($post)->count();

        return view('frontend.posts', compact(
            'post',
            'relatedPosts',
            'viewNumber'
        ));
    }
}
