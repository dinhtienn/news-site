<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id',
        'user_id',
        'content',
        'type',
        'status'
    ];

    const STATUS = [
        1 => 'display',
        2 => 'hidden',
        3 => 'waiting',
        4 => 'processed',
    ];

    const TYPE = [
        1 => 'comment',
        2 => 'review',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
