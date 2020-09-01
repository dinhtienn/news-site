<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function model()
    {
        return User::class;
    }

    public function checkUserProvider($user)
    {
        return  $this->model->where([
            ['email', $user->email],
            ['provider_id', '!=', $user->id]
        ])->first() ||
            $this->model->where([
                ['email', $user->email],
                ['provider_id', null]
            ])->first();
    }
}
