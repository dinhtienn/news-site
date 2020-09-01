<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepositoryInterface as UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserApiController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function checkUser(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $user = $this->userRepository->getByColumn($email, 'email');

        return response()->json(Hash::check($password, $user->password));
    }

    public function checkUsername(Request $request)
    {
        $user = $this->userRepository->getByColumn($request->get('username'), 'username');

        return response()->json($user ? true : false);
    }

    public function checkEmail(Request $request)
    {
        $user = $this->userRepository->getByColumn($request->get('email'), 'email');

        return response()->json($user ? true : false);
    }
}
