<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->paginate(10);
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name'=>'required|string|max:100|unique:categories,name']);
        Category::create(['name'=>$request->name]);
        return redirect()->route('categories.index')->with('success','Kategori berhasil disimpan');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate(['name'=>'required|string|max:100|unique:categories,name,'.$category->id]);
        $category->update(['name'=>$request->name]);
        return redirect()->route('categories.index')->with('success','Kategori berhasil diperbarui');
    }

    public function destroy(Category $category)
    {
        // jika ada archive terkait, cascade delete karena foreign key onDelete cascade
        $category->delete();
        return redirect()->route('categories.index')->with('success','Kategori berhasil dihapus');
    }
}
