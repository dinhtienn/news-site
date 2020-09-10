<?php

namespace App\Helpers;

class CommentProcessor
{
    static public function countComments($posts)
    {
        foreach ($posts as $key => $post) {
            $post->commentCount = $post->comments()->where([
                'type' => config('company.comment.type.comment'),
                'status' => config('company.comment.status.display'),
                'parent_id' => null
            ])->count();
            $posts[$key] = $post;
        }

        return $posts;
    }
}
