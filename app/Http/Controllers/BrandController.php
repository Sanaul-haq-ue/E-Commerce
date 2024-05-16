<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.brand.manage-brand',[
            'brands' => Brand::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create-brand');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'image.max' => 'The image field must not be greater than 2 MB.'
        ]);

        Brand::saveBrand($request);
        return back()->with('message', 'Brand save successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit-brand',[
            'brand' => $brand,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'image.max' => 'The image field must not be greater than 2 MB.'
        ]);

        Brand::updateBrand($request, $brand->id);
        return redirect()->route('brand.index')->with('message', 'Update Brand save successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        Brand::deleteBrand($brand);

        return back()->with('success', 'Brand deleted successfully');
    }
}















