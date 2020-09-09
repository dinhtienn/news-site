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

    public function countMonthPosts($month)
    {
        return $this->model
            ->whereMonth('created_at', $month)
            ->count();
    }

    public function getMonthPosts($month)
    {
        return $this->model
            ->whereMonth('created_at', $month)
            ->with('user')
            ->get();
    }

    public function getByIdWithoutScope($id)
    {
        return $this->model->withoutGlobalScope('status')->findOrFail($id);
    }

    public function getByColumnWithoutScope($item, $column, array $columns = ['*'])
    {
        $this->unsetClauses();

        $this->newQuery()->eagerLoad();

        return $this->query->withoutGlobalScope('status')->where($column, $item)->first($columns);
    }

    public function updateByIdWithoutScope($id, array $data, array $options = [])
    {
        $this->unsetClauses();
        $model = $this->getByIdWithoutScope($id);
        $model->update($data, $options);

        return $model;
    }

    public function getRejectedPosts()
    {
        return $this->model
            ->withoutGlobalScope('status')
            ->where('status', config('company.post_status.rejected'))
            ->get();
    }

    public function getWaitingPosts()
    {
        return $this->model
            ->withoutGlobalScope('status')
            ->whereIn('status', [
                config('company.post_status.waiting'),
                config('company.post_status.commented')
            ])
            ->get();
    }

    public function getMyPosts($userId)
    {
        return $this->model
            ->withoutGlobalScope('status')
            ->where('user_id', $userId)
            ->get();
    }
}
