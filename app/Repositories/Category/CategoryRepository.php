<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function model()
    {
        return Category::class;
    }

    public function getCategories()
    {
        return $this->model
            ->where('parent_id', null)
            ->with('children')
            ->with(['posts' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }])
            ->get();
    }
}
