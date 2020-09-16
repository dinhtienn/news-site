<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Category\CategoryRepositoryInterface as CategoryRepository;
use App\Http\Requests\CategoryRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CategoryController extends AdminController
{
    protected $categoryRepository;

    public function __construct(
        CategoryRepository $categoryRepository
    ) {
        parent::__construct();
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->all();

        return view('admin.category', compact('categories'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->all();

        return view('admin.category_create', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->parent_id === 'null' ? $request->only(['name']) : $request->all();
        $this->categoryRepository->create(array_merge(
            $data,
            ['slug' => str_slug($request->name)]
        ));

        return redirect()->route('category.index');
    }

    public function edit(Request $request)
    {
        $categories = $this->categoryRepository->all();
        $category = $this->categoryRepository->getById($request->category);

        return view('admin.category_edit', compact('categories', 'category'));
    }

    public function update(CategoryRequest $request)
    {
        try {
            $data = [
                'name' => $request->name,
                'parent_id' => $request->parent_id
            ];
            if ($request->parent_id === 'null') {
                $data['parent_id'] = null;
            }
            $this->categoryRepository->updateById($request->category, array_merge(
                $data,
                ['slug' => str_slug($request->name)]
            ));

            return redirect()->route('category.index');
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('category.index')
                ->with('error', trans('app.error'));
        }
    }

    public function destroy(Request $request)
    {
        try {
            $id = $request->get('id');
            $category = $this->categoryRepository->getById($id);
            $category->posts()->delete();
            if ($category->children) {
                foreach ($category->children as $childCate) {
                    $childCate->posts()->delete();
                    $childCate->delete();
                }
            }
            $category->delete();

            return redirect()->route('category.index');
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('category.index')
                ->with('error', trans('app.error'));
        }
    }
}
