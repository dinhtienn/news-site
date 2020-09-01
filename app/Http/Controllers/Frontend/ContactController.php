<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\Category\CategoryRepositoryInterface as CategoryRepository;
use App\Repositories\Post\PostRepositoryInterface as PostRepository;

class ContactController extends FrontendController
{
    public function __construct(
        CategoryRepository $categoryRepository,
        PostRepository $postRepository
    ) {
        parent::__construct($categoryRepository, $postRepository);
    }

    public function __invoke()
    {
        return view('frontend.contact');
    }
}
