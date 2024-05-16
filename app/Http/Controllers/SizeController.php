<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.size.manage-size',[
            'sizes' => Size::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.size.create-size');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:sizes',
            'code' => 'required|string|max:255',
        ],[

        ]);

        Size::saveSize($request);
        return back()->with('message', 'Size save successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        return view('admin.size.edit-size',[
            'size' => $size,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $size)
    {
        $request->validate([

        ],[

        ]);

        Size::updateSize($request, $size->id);
        return redirect()->route('size.index')->with('message', 'Update Size save successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        $size->delete();

        return back()->with('success', 'Size deleted successfully');
    }
}
