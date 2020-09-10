<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Like\LikeRepositoryInterface as LikeRepository;

class LikeApiController extends Controller
{
    protected $likeRepository;

    public function __construct(LikeRepository $likeRepository)
    {
        $this->likeRepository = $likeRepository;
    }

    public function processLike(Request $request)
    {
        return response()->json($this->likeRepository->processLike(
            $request->get('userId'),
            $request->get('postId')
        ));
    }
}
