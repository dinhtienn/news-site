<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\WriterRequest;
use App\Repositories\Category\CategoryRepositoryInterface as CategoryRepository;
use App\Repositories\Post\PostRepositoryInterface as PostRepository;
use App\Repositories\Writer\WriterRepositoryInterface as WriterRepository;
use Illuminate\Support\Facades\Auth;

class WriterController extends FrontendController
{
    protected $writerRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        PostRepository $postRepository,
        WriterRepository $writerRepository
    ) {
        parent::__construct($categoryRepository, $postRepository);
        $this->writerRepository = $writerRepository;
    }

    public function create()
    {
        return view('frontend.request_writer');
    }

    public function store(WriterRequest $request)
    {
        $cv = $request->cv_path;
        $filename = uniqid() . '-' . $cv->getClientOriginalName();
        $cv->move('storage/', $filename);
        $this->writerRepository->create(array_merge(
            $request->all(),
            [
                'user_id' => Auth::id(),
                'cv_path' => "/storage/$filename"
            ]
        ));

        return redirect()->back()->with(['popup' => [
            'status' => 'success',
            'title' => trans('app.success'),
            'content' => trans('app.request_writer_success')
        ]]);
    }
}
