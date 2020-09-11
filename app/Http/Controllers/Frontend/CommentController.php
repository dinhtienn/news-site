<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepositoryInterface as CategoryController;
use App\Repositories\Post\PostRepositoryInterface as PostRepository;
use App\Repositories\Comment\CommentRepositoryInterface as CommentRepository;
use Illuminate\Support\Facades\Auth;

class CommentController extends FrontendController
{
    protected $commentRepository;

    public function __construct(
        CategoryController $categoryRepository,
        PostRepository $postRepository,
        CommentRepository $commentRepository
    ) {
        parent::__construct($categoryRepository, $postRepository);
        $this->commentRepository = $commentRepository;
    }

    public function comment(Request $request)
    {
        if (!Auth::check()) {
            abort(403);
        }
        if (isset($request->comment_id) && !is_null($request->comment_id)) {
            $comment = $this->commentRepository->getById($request->comment_id);
            if (Auth::id() !== $comment->user_id) {
                abort(403);
            }
            $this->commentRepository->updateById(
                $request->comment_id,
                ['content' => $request->request->get('content')]
            );
        }
        $this->commentRepository->create([
            'user_id' => Auth::id(),
            'post_id' => $request->post_id,
            'content' => $request->request->get('content'),
            'type' => config('company.comment.type.comment'),
            'status' => config('company.comment.status.display'),
            'parent_id' => $request->parent_id
        ]);

        return redirect()->to(url()->previous());
    }

    public function hide(Request $request)
    {
        if (!Auth::check()) {
            abort(403);
        }
        $this->commentRepository->updateById(
            $request->get('id'),
            ['status' => config('company.comment.status.hidden')]
        );

        return redirect()->to(url()->previous());
    }

    public function delete(Request $request)
    {
        if (!Auth::check()) {
            abort(403);
        }
        $comment = $this->commentRepository->getById($request->get('id'));
        if (Auth::id() !== $comment->user_id) {
            abort(403);
        }
        $comment->children()->delete();
        $this->commentRepository->deleteById($request->get('id'));

        return redirect()->to(url()->previous());
    }
}
