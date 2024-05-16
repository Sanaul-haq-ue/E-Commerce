<?php

namespace App\Http\Controllers;

use App\Models\Unite;
use Illuminate\Http\Request;

class UniteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.unite.manage-unite',[
            'unites' => Unite::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.unite.create-unite');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:unites',
            'code' => 'required|string|max:255',
        ],[

        ]);

        Unite::saveUnite($request);
        return back()->with('message', 'Unite save successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unite $unite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unite $unite)
    {
        return view('admin.unite.edit-unite',[
            'unite' => $unite,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unite $unite)
    {
        $request->validate([

        ],[

        ]);

        Unite::updateUnite($request, $unite->id);
        return redirect()->route('unite.index')->with('message', 'Update Unite save successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unite $unite)
    {
        $unite->delete();

        return back()->with('success', 'Unite deleted successfully');
    }
}
