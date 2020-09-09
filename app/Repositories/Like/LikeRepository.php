<?php

namespace App\Repositories\Like;

use App\Models\Like;
use App\Repositories\BaseRepository;

class LikeRepository extends BaseRepository implements LikeRepositoryInterface
{
    public function model()
    {
        return Like::class;
    }

    public function processLike($userId, $postId)
    {
        $likeRecord = $this->model->where([
            'user_id' => $userId,
            'post_id' => $postId
        ])->first();
        if ($likeRecord) {
            $this->deleteById($likeRecord->id);

            return false;
        } else {
            $this->create([
                'user_id' => $userId,
                'post_id' => $postId
            ]);

            return true;
        }
    }
}
