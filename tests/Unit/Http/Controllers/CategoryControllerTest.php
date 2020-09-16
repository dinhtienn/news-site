<?php

namespace Tests\Unit\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use Tests\TestCase;
use Mockery;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\Admin\CategoryController;
use Faker\Factory as Faker;
use Illuminate\Http\RedirectResponse;

class CategoryControllerTest extends TestCase
{
    protected $categoryMock;

    public function setUp(): void
    {
        $this->categoryMock = Mockery::mock(CategoryRepositoryInterface::class);
        parent::setUp();
    }

    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_index_function()
    {
        $this->categoryMock
            ->shouldReceive('all')
            ->once()
            ->andReturn(new Collection);
        $category = new CategoryController($this->categoryMock);
        $result = $category->index();
        $data = $result->getData();
        $this->assertIsArray($data);
        $this->assertEquals('admin.category', $result->getName());
        $this->assertArrayHasKey('categories', $data);
    }

    public function test_create_function()
    {
        $this->categoryMock
            ->shouldReceive('all')
            ->once()
            ->andReturn(new Collection);
        $category = new CategoryController($this->categoryMock);
        $result = $category->create();
        $data = $result->getData();
        $this->assertIsArray($data);
        $this->assertEquals('admin.category_create', $result->getName());
        $this->assertArrayHasKey('categories', $data);
    }

    public function test_store_function()
    {
        $faker = Faker::create();
        $this->categoryMock
            ->shouldReceive('create')
            ->once()
            ->andReturn(true);
        $name = $faker->name;
        $data = [
            'name' => $name,
            'slug' => str_slug($name),
            'parent_id' => config('company.category_id')[array_rand(config('company.category_id'))]
        ];
        $request = new CategoryRequest($data);
        $category = new CategoryController($this->categoryMock);
        $result = $category->store($request);
        $this->assertInstanceOf(RedirectResponse::class, $result);
        $this->assertEquals(route('category.index'), $result->headers->get('Location'));
    }

    public function test_edit_function()
    {
        $this->categoryMock
            ->shouldReceive('all', 'getById')
            ->once()
            ->andReturn(new Category());
        $category = new CategoryController($this->categoryMock);
        $data = [
            'category' => config('company.category_id')[array_rand(config('company.category_id'))]
        ];
        $request = new Request($data);
        $result = $category->edit($request);
        $data = $result->getData();
        $this->assertIsArray($data);
        $this->assertEquals('admin.category_edit', $result->getName());
        $this->assertArrayHasKey('categories', $data);
        $this->assertArrayHasKey('category', $data);
    }

    public function test_update_function()
    {
        $faker = Faker::create();
        $this->categoryMock
            ->shouldReceive('updateById')
            ->once()
            ->andReturn(true);
        $name = $faker->name;
        $data = [
            'name' => $name,
            'slug' => str_slug($name),
            'parent_id' => config('company.category_id')[array_rand(config('company.category_id'))]
        ];
        $request = new CategoryRequest($data);
        $category = new CategoryController($this->categoryMock);
        $result = $category->update($request);
        $this->assertInstanceOf(RedirectResponse::class, $result);
        $this->assertEquals(route('category.index'), $result->headers->get('Location'));
    }

    public function test_update_function_fail()
    {
        $faker = Faker::create();
        $this->categoryMock
            ->shouldReceive('updateById')
            ->once()
            ->andThrow(new ModelNotFoundException);
        $name = $faker->name;
        $data = [
            'name' => $name,
            'slug' => str_slug($name),
            'parent_id' => config('company.category_id')[array_rand(config('company.category_id'))]
        ];
        $request = new CategoryRequest($data);
        $category = new CategoryController($this->categoryMock);
        $result = $category->update($request);
        $this->assertInstanceOf(RedirectResponse::class, $result);
        $this->assertEquals(route('category.index'), $result->headers->get('Location'));
        $this->assertArrayHasKey('error', $result->getSession()->all());
        $this->assertTrue($result->isRedirect());
    }

    public function test_destroy_function()
    {
        $data = [
            'id' => config('company.category_id')[array_rand(config('company.category_id'))]
        ];
        $request = new Request($data);
        $this->categoryMock
            ->shouldReceive('getById')
            ->once()
            ->andReturn(new Category());
        $category = new CategoryController($this->categoryMock);
        $result = $category->destroy($request);
        $this->assertInstanceOf(RedirectResponse::class, $result);
        $this->assertEquals(route('category.index'), $result->headers->get('Location'));
    }

    public function test_destroy_function_fail()
    {
        $data = [
            'id' => config('company.category_id')[array_rand(config('company.category_id'))]
        ];
        $request = new Request($data);
        $this->categoryMock
            ->shouldReceive('getById')
            ->once()
            ->andThrow(new ModelNotFoundException);
        $category = new CategoryController($this->categoryMock);
        $result = $category->destroy($request);
        $this->assertInstanceOf(RedirectResponse::class, $result);
        $this->assertEquals(route('category.index'), $result->headers->get('Location'));
        $this->assertArrayHasKey('error', $result->getSession()->all());
        $this->assertTrue($result->isRedirect());
    }
}
