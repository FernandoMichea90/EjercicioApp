<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Ejercicio_grupo_muscular;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $exercises=Exercise::all();
        $grupo_muscular=Ejercicio_grupo_muscular::all();
        return view('exercise.index',compact('exercises','grupo_muscular'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {    
        return view('exercise.create');     
    }

    /**
     * Store a newly created resource in storage.
     */
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        //Obtener exercise
        $exercise=Exercise::findOrFail($id);
        return view('exercise.view',compact('exercise'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $exercise = Exercise::findOrFail($id);
        $exercise->name = $request->name;
        $exercise->save();
    
        return redirect()->route('exercise.index')->with('success', 'Exercise updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Elminar ejericicio 
        $exercise=Exercise::findOrFail($id);
        $exercise->delete();
        return redirect()->route('exercise.index')->with('success', 'Routine deleted successfully.');

    }
}
