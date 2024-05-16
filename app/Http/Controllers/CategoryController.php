<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.manage-category',[
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create-category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'image.max' => 'The image field must not be greater than 2 MB.'
        ]);

        Category::saveCategory($request);
        return back()->with('message', 'Category save successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit-category',[
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'image.max' => 'The image field must not be greater than 2 MB.'
        ]);

        Category::updateCategory($request, $category->id);
        return redirect()->route('category.index')->with('message', 'Update Category save successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::deleteCategory($category);

        return back()->with('success', 'Category deleted successfully');
    }
}
