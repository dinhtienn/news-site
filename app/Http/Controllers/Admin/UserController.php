<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Role\RoleRepositoryInterface as RoleRepository;
class UserController extends AdminController
{
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        parent::__construct();
        $this->roleRepository = $roleRepository;
    }

    public function user()
    {
        $users = $this->roleRepository->getByColumn('user', 'name')->users;
        $object = 'user';

        return view('admin.users', compact('users', 'object'));
    }

    public function writer()
    {
        $users = $this->roleRepository->getByColumn('writer', 'name')->users;
        $object = 'writer';

        return view('admin.users', compact('users', 'object'));
    }

    public function admin()
    {
        $users = $this->roleRepository->getByColumn('admin', 'name')->users;
        $object = 'admin';

        return view('admin.users', compact('users', 'object'));
    }
}
