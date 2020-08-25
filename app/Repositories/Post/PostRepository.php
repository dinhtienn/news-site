<?php

namespace App\Repositories\Post;

use App\Models\Post;
use App\Repositories\BaseRepository;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    public function model()
    {
        return Post::class;
    }

    public function getLatestPost($limit)
    {
        return $this->model
            ->orderBy('created_at', 'desc')
            ->take($limit)
            ->get();
    }

    public function getPaginationPosts($skip, $limit)
    {
        return $this->model
            ->orderBy('created_at', 'desc')
            ->skip($skip)
            ->take($limit)
            ->get();
    }
}
