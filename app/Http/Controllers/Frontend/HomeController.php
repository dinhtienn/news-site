<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepositoryInterface as CategoryRepository;
use App\Repositories\Post\PostRepositoryInterface as PostRepository;

class HomeController extends FrontendController
{
    public function __construct(
        CategoryRepository $categoryRepository,
        PostRepository $postRepository
    )
    {
        parent::__construct($categoryRepository, $postRepository);
    }

    public function index()
    {
        return view('frontend.homepage');
    }
}
