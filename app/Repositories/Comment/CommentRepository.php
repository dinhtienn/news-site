<?php

namespace App\Repositories\Comment;

use App\Models\Comment;
use App\Repositories\BaseRepository;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    public function model()
    {
        return Comment::class;
    }

    public function getCurrentReview($postId)
    {
        return $this->model->where([
            'post_id' => $postId,
            'type' => config('company.comment.type.review'),
            'status' => config('company.comment.status.waiting')
        ])->first();
    }
}
