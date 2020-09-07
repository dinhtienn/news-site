<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Writer\WriterRepositoryInterface as WriterRepository;
use App\Repositories\Role\RoleRepositoryInterface as RoleRepository;
use App\Repositories\User\UserRepositoryInterface as UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WriterController extends AdminController
{
    protected $writerRepository;
    protected $roleRepository;
    protected $userRepository;

    public function __construct(
        WriterRepository $writerRepository,
        RoleRepository $roleRepository,
        UserRepository $userRepository
    ) {
        parent::__construct();
        $this->writerRepository = $writerRepository;
        $this->roleRepository = $roleRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $pendingRequests = $this->writerRepository->getPendingRequests();

        return view('admin.pending_requests', compact('pendingRequests'));
    }

    public function rejected()
    {
        $rejectedUsers = $this->writerRepository->getRejectedWriter();

        return view('admin.rejected_requests', compact('rejectedUsers'));
    }

    public function accept(Request $request)
    {
        DB::transaction(function () use ($request) {
            $this->writerRepository->updateById($request->get('id'), [
                'admin_id' => Auth::id(),
                'status' => config('company.request_writer.accepted')
            ]);
            $writerRoleId = $this->roleRepository
                ->getByColumn('writer', 'name')->id;
            $requestWriter = $this->writerRepository
                ->getByColumn($request->get('id'), 'id');
            $this->userRepository->updateById($requestWriter->user->id, [
                'role_id' => $writerRoleId
            ]);
        });

        return redirect()->route('writer-requests.index');
    }

    public function reject(Request $request)
    {
        $this->writerRepository->updateById($request->get('id'), [
            'admin_id' => Auth::id()
        ]);

        return redirect()->route('writer-requests.index');
    }
}
