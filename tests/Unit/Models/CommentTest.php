<?php

namespace Tests\Unit\Models;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Tests\TestCase;

class CommentTest extends TestCase
{
    protected $comment;

    protected function setUp(): void
    {
        parent::setUp();
        $this->comment = new Comment();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->comment);
    }

    public function test_contains_valid_fillable_properties()
    {
        $this->assertEquals([
            'post_id',
            'user_id',
            'content',
            'type',
            'status',
            'parent_id'
        ], $this->comment->getFillable());
    }

    public function test_table_name()
    {
        $this->assertEquals('comments', $this->comment->getTable());
    }

    public function test_user_reletion()
    {
        $this->test_belongsTo_relation(
            User::class,
            'user_id',
            $this->comment->user(),
            'id'
        );
    }

    public function test_post_relation()
    {
        $this->test_belongsTo_relation(
            Post::class,
            'post_id',
            $this->comment->post(),
            'id'
        );
    }

    public function test_children_relation()
    {
        $this->test_hasMany_relation(
            Comment::class,
            'parent_id',
            $this->comment->children()
        );
    }
}
