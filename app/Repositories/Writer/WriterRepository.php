<?php

namespace App\Repositories\Writer;

use App\Models\Writer;
use App\Repositories\BaseRepository;

class WriterRepository extends BaseRepository implements WriterRepositoryInterface
{
    public function model()
    {
        return Writer::class;
    }

    public function getPendingRequests()
    {
        return $this->where('admin_id', null)->with('user')->get();
    }

    public function getRejectedWriter()
    {
        return $this->model->where([
            ['status', 0],
            ['admin_id', '!=', null]
        ])->with('user')->get();
    }
}
