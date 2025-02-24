<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'hidden' => 'required|integer',
            'order' => 'required|integer',
        ]);

        Category::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Thêm mới danh mục thành công!');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'hidden' => 'required|integer',
            'order' => 'required|integer',
        ]);

        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Sửa danh mục thành công');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Xóa danh mục thành công');
    }

}
