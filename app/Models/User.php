<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function writerRequest()
    {
        return $this->hasOne(Writer::class);
    }

    public function writerConfirm()
    {
        return $this->hasMany(Writer::class, 'admin_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
