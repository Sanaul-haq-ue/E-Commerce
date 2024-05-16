<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.Sub-category.manage-sub-category',[
            'sub_categories' => SubCategory::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Sub-category.create-sub-category',[
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|integer',

        ], [
            'category_id.required' => 'The category name field is required.',
            'image.max' => 'The image field must not be greater than 2 MB',
            'name.required' => 'The sub category name field is required.',
        ]);

        SubCategory::saveSubCategory($request);
        return back()->with('message', 'Sub Category save successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        return view('admin.Sub-category.edit-sub-category',[
            'categories' => Category::all(),
            'sub_category' => $subCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $request->validate([
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',

        ], [
            'image.max' => 'The image field must not be greater than 2 MB',
        ]);


        SubCategory::updateSubCategory($request, $subCategory->id);
        return redirect()->route('sub-category.index')->with('message', 'Update Sub Category save successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        SubCategory::deleteSubCategory($subCategory);

        return back()->with('success', 'Sub category deleted successfully');
    }
}
