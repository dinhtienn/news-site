<?php

namespace App\Repositories\Like;

use App\Repositories\BaseRepositoryInterface;

interface LikeRepositoryInterface extends BaseRepositoryInterface
{
    public function processLike($userId, $postId);
}
