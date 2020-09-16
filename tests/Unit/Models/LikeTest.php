<?php

namespace Tests\Unit\Models;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Tests\TestCase;

class LikeTest extends TestCase
{
    protected $like;

    protected function setUp(): void
    {
        parent::setUp();
        $this->like = new Like();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->like);
    }

    public function test_contains_valid_fillable_properties()
    {
        $this->assertEquals(['post_id', 'user_id'], $this->like->getFillable());
    }

    public function test_table_name()
    {
        $this->assertEquals('likes', $this->like->getTable());
    }

    public function test_user_reletion()
    {
        $this->test_belongsTo_relation(
            User::class,
            'user_id',
            $this->like->user(),
            'id'
        );
    }

    public function test_post_relation()
    {
        $this->test_belongsTo_relation(
            Post::class,
            'post_id',
            $this->like->post(),
            'id'
        );
    }
}
