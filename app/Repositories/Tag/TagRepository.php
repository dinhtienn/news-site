<?php

namespace App\Repositories\Tag;

use App\Models\Tag;
use App\Repositories\BaseRepository;

class TagRepository extends BaseRepository implements TagRepositoryInterface
{
    public function model()
    {
        return Tag::class;
    }

    public function getLatestTags($limit)
    {
        return $this->model
            ->orderBy('created_at', 'desc')
            ->take($limit)
            ->get();
    }
}
