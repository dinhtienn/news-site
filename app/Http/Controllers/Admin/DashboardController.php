<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use CyrildeWit\EloquentViewable\Support\Period;
use App\Repositories\Post\PostRepositoryInterface as PostRepository;
use App\Repositories\Role\RoleRepositoryInterface as RoleRepository;

class DashboardController extends AdminController
{
    protected $postRepository;
    protected $roleRepository;

    public function __construct(
        PostRepository $postRepository,
        RoleRepository $roleRepository
    ) {
        parent::__construct();
        $this->postRepository = $postRepository;
        $this->roleRepository = $roleRepository;
    }

    public function __invoke()
    {
        $now = Carbon::now();
        $month = $now->month;

        $personalMonthSalary = 0;
        if (Auth::user()->role->name === 'writer') {
            $personalMonthSalary =
                Auth::user()->writerRequest->salary *
                Auth::user()->posts()->whereMonth('created_at', $month)->count();
        }

        $monthPosts = Cache::remember(
            'month_posts',
            config('company.cache_time.month_posts'),
            function () use ($month) {
                return $this->postRepository->countMonthPosts($month);
            }
        );

        $monthSalary = Cache::remember(
            'month_salary',
            config('company.cache_time.month_salary'),
            function () use ($month) {
                $count = 0;
                $posts = $this->postRepository->getMonthPosts($month - 1);
                foreach ($posts as $post) {
                    $count += $post->user->writerRequest->salary;
                }
                return $count;
            }
        );

        $monthViews = Cache::remember(
            'month_views',
            config('company.cache_time.month_views'),
            function () use ($now, $month) {
                $count = 0;
                $posts = $this->postRepository->all();
                foreach ($posts as $post) {
                    $count += views($post)->period(Period::since("$now->year-$month-01"))->count();
                }
                return $count;
            }
        );

        $topWriters = Cache::remember(
            'month_writers',
            config('company.cache_time.month_writers'),
            function () use ($month) {
                $writers = $this->roleRepository->getByColumn('writer', 'name')->users;
                for ($i = 0; $i < count($writers) - 1; $i++) {
                    for ($j = 0; $j < count($writers) - $i - 1; $j++) {
                        if ($writers[$j]->posts()->count() <
                            $writers[$j + 1]->posts()->count()) {
                            $temp = $writers[$j];
                            $writers[$j] = $writers[$j + 1];
                            $writers[$j + 1] = $temp;
                        }
                    }
                }
                return $writers;
            }
        );

        return view('admin.dashboard', compact(
            'personalMonthSalary',
            'monthPosts',
            'monthViews',
            'monthSalary',
            'topWriters'
        ));
    }
}
