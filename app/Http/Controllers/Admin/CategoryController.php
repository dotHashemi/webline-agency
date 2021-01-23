<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends AdminController
{
    public function index(Request $request)
    {
        $categories = Category::get();

        return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        $categories = Category::orderBy('id', 'DESC')->get();

        return view('admin.categories.create', compact('categories'));
    }


    public function store(CategoryRequest $request)
    {
        $inputs = $request->only('title', 'father');

        Category::create($inputs);

        alert()->success($this->alerts['create']);
        return redirect()->route('admin.categories.index');
    }


    public function edit(Category $category)
    {
        $categories = Category::orderBy('id', 'DESC')->get();

        return view('admin.categories.edit', compact('category', 'categories'));
    }


    public function update(CategoryRequest $request, Category $category)
    {
        $inputs = $request->only('title', 'father');

        $category->update($inputs);

        alert()->success($this->alerts['update']);
        return redirect()->route('admin.categories.index');
    }


    public function destroy(Category $category)
    {
        try {
            $category->delete();

            alert()->success($this->alerts['delete']);
            return redirect()->route('admin.categories.index');
        } catch (Exception $e) {
            return redirect()->route('admin.categories.index')->withErrors(['database' => 'این دسته حاوی مقاله است.']);
        }
    }
}
