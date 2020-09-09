<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Comment\CommentRepositoryInterface as CommentRepository;
use App\Repositories\Post\PostRepositoryInterface as PostRepository;

class CommentApiController extends Controller
{
    protected $commentRepository;
    protected $postRepository;

    public function __construct(
        CommentRepository $commentRepository,
        PostRepository $postRepository
    ) {
        $this->commentRepository = $commentRepository;
        $this->postRepository = $postRepository;
    }

    public function markCommentAsRead(Request $request)
    {
        $this->postRepository->updateByIdWithoutScope(
            $request->get('postId'),
            ['status' => config('company.post_status.waiting')]
        );

        return response()->json(
            $this->commentRepository->updateById(
                $request->get('id'),
                ['status' => config('company.comment.status.processed')]
            )
        );
    }

    public function insertComment(Request $request)
    {
        $commentCurrent = $this->commentRepository->getCurrentReview($request->get('postId'));
        $this->postRepository->updateByIdWithoutScope(
            $request->get('postId'),
            ['status' => config('company.post_status.commented')]
        );

        if (!$commentCurrent) {
            $check = $this->commentRepository->create([
                'post_id' => $request->get('postId'),
                'user_id' => $request->get('userId'),
                'content' => $request->get('content'),
                'type' => config('company.comment.type.review'),
                'status' => config('company.comment.status.waiting')
            ]);
        } else {
            $check = $this->commentRepository->updateById(
                $request->get('id'),
                ['content' => $commentCurrent->content . $request->get('content')]
            );
        }

        return response()->json($check);
    }
}
