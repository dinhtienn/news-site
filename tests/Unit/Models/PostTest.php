<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use App\Models\Like;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Tests\TestCase;

class PostTest extends TestCase
{
    protected $post;

    protected function setUp(): void
    {
        parent::setUp();
        $this->post = new Post();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->post);
    }

    public function test_contains_valid_fillable_properties()
    {
        $this->assertEquals([
            'title',
            'user_id',
            'category_id',
            'slug',
            'content',
            'admin_id',
            'status',
            'thumbnail'
        ], $this->post->getFillable());
    }

    public function test_table_name()
    {
        $this->assertEquals('posts', $this->post->getTable());
    }

    public function test_tags_relation()
    {
        $this->test_belongsToMany_relation(
            Tag::class,
            'post_id',
            $this->post->tags(),
            'tag_id'
        );
    }

    public function test_category_relation()
    {
        $this->test_belongsTo_relation(
            Category::class,
            'category_id',
            $this->post->category(),
            'id'
        );
    }

    public function test_user_relation()
    {
        $this->test_belongsTo_relation(
            User::class,
            'user_id',
            $this->post->user(),
            'id'
        );
    }

    public function test_likedUsers_relation()
    {
        $this->test_belongsToMany_relation(
            User::class,
            'post_id',
            $this->post->likedUsers(),
            'user_id'
        );
    }

    public function test_admin_relation()
    {
        $this->test_belongsTo_relation(
            User::class,
            'admin_id',
            $this->post->admin(),
            'id'
        );
    }

    public function test_likes_relation()
    {
        $this->test_hasMany_relation(
            Like::class,
            'post_id',
            $this->post->likes()
        );
    }
}
