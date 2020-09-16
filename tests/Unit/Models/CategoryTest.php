<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use App\Models\Post;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    protected $category;

    protected function setUp(): void
    {
        parent::setUp();
        $this->category = new Category();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->category);
    }

    public function test_contains_valid_fillable_properties()
    {
        $this->assertEquals(['name', 'slug', 'parent_id'], $this->category->getFillable());
    }

    public function test_table_name()
    {
        $this->assertEquals('categories', $this->category->getTable());
    }

    public function test_posts_relation()
    {
        $this->test_hasMany_relation(
            Post::class,
            'category_id',
            $this->category->posts()
        );
    }

    public function test_parent_relation()
    {
        $this->test_belongsTo_relation(
            Category::class,
            'parent_id',
            $this->category->parent(),
            'id'
        );
    }

    public function test_children_relation()
    {
        $this->test_hasMany_relation(
            Category::class,
            'parent_id',
            $this->category->children()
        );
    }
}
