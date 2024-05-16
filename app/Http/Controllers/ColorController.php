<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.color.manage-color',[
            'colors' => Color::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.color.create-color');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:colors',
            'code' => 'required|string|max:255',
        ],[

        ]);

        Color::saveColor($request);
        return back()->with('message', 'Color save successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        return view('admin.color.edit-color',[
            'color' => $color,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color)
    {
        $request->validate([

        ],[

        ]);

        Color::updateColor($request, $color->id);
        return redirect()->route('color.index')->with('message', 'Update Color save successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        $color->delete();

        return back()->with('success', 'Color deleted successfully');
    }
}
