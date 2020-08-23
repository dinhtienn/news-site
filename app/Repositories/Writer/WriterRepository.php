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
}
