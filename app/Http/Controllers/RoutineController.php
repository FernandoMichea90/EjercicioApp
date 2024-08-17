<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use App\Models\Exercise;
use App\Models\Equipment;
use App\Models\Set;


use Illuminate\Http\Request;

class RoutineController extends Controller
{

    public function create()
    {
        return view('routines.createroutine');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $routines = Routine::all();
        return view('routines.index', compact('routines'));
    }

    public function welcome()
    {
        $routines = Routine::all();
        return view('welcome', compact('routines'));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        $routine = Routine::create($request->all());

        return redirect()->route('routines.index')->with('success', 'Routine created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $routine = Routine::findOrFail($id);
        $sets = Set::where('routine_id', $id)->get();
        return view('routines.show', compact('routine','sets'));
    }

    /**
     * Display the specified resource.
     */
    public function view(string $id)
    {
        $routine = Routine::findOrFail($id);
        $exercises = Exercise::all();
        $equipment = Equipment::all();
        $sets = Set::where('routine_id', $id)->get();
        
        return view('routines.view', compact('routine', 'exercises', 'equipment', 'sets'));
    }





    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $routine = Routine::findOrFail($id);
        return view('routines.edit', compact('routine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        $routine = Routine::findOrFail($id);
        $routine->update($request->all());

        return redirect()->route('routines.index')->with('success', 'Routine updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $routine = Routine::findOrFail($id);
        $routine->delete();

        return redirect()->route('routines.index')->with('success', 'Routine deleted successfully.');
    }   
}
