<?php

namespace App\Repositories\Post;

use App\Repositories\BaseRepositoryInterface;

interface PostRepositoryInterface extends BaseRepositoryInterface
{
    public function getLatestPost($limit);

    public function getPaginationPosts($skip, $limit);

    public function countMonthPosts($month);

    public function getMonthPosts($month);

    public function getByIdWithoutScope($id);

    public function getByColumnWithoutScope($item, $column, array $columns = ['*']);

    public function updateByIdWithoutScope($id, array $data, array $options = []);

    public function getRejectedPosts();

    public function getWaitingPosts();

    public function getMyPosts($userId);
}
