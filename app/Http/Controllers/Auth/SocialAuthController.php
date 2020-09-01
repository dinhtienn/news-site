<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepositoryInterface as UserRepository;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SocialAuthController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        if ($this->userRepository->checkUserProvider($user)) {
            return redirect()
                ->back()
                ->withErrors([
                    'social_login_errors' => trans('auth.duplicate_email')
                ]);
        } else {
            $userRegistered = $this->findOrCreateUser($user, $provider);
            Auth::login($userRegistered, true);
            return redirect()->back();
        }
    }

    public function findOrCreateUser($user, $provider)
    {
        $auth_user = User::where('provider_id', $user->id)->first();

        return $auth_user ? $auth_user : User::create([
            'username'     => $user->name,
            'email'    => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id,
        ]);
    }
}
