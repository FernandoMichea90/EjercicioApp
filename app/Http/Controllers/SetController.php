<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Set;
use App\Models\Routine;
use App\Models\Exercise;
use App\Models\Equipment;

class SetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los sets
        $sets = Set::all();
        return view('sets.index', compact('sets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener rutinas, ejercicios y equipos para el formulario
        $routines = Routine::all();
        $exercises = Exercise::all();
        $equipment = Equipment::all();
        
        return view('sets.create', compact('routines', 'exercises', 'equipment'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'routine_id' => 'required|exists:routine,id_routine',
            'exercise_id' => 'required|exists:exercise,id',
            'set_number' => 'required|integer|min:1',
            'reps' => 'required|integer|min:1',
            'equipment_id' => 'required|exists:equipment,id',
        ]);

        // Crear un nuevo set con los datos del formulario
        $set = new Set();
        $set->routine_id = $request->routine_id;
        $set->exercise_id = $request->exercise_id;
        $set->set_number = $request->set_number;
        $set->reps = $request->reps;
        $set->equipment_id = $request->equipment_id;
        $set->save();

        // Redirigir a la vista de detalle de la rutina asociada
        return redirect()->route('routines.view', $request->routine_id)->with('success', 'Set agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mostrar detalles de un set específico (no implementado en este caso)
        return abort(404); // Puedes implementar según tus necesidades
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Obtener el set a editar
        $set = Set::findOrFail($id);
        $routine=Routine::findOrFail($set->routine_id);
        $sets = Set::where('routine_id',$set->routine_id)->get();

        // Obtener rutinas, ejercicios y equipos para el formulario
        $routines = Routine::all();
        $exercises = Exercise::all();
        $equipment = Equipment::all();

        return view('set.edit', compact('set', 'routines', 'exercises', 'equipment','routine','sets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'routine_id' => 'required|exists:routine,id_routine',
            'exercise_id' => 'required|exists:exercise,id',
            'set_number' => 'required|integer|min:1',
            'reps' => 'required|integer|min:1',
            'equipment_id' => 'required|exists:equipment,id',
        ]);

        // Actualizar el set existente
        $set = Set::findOrFail($id);
        $set->routine_id = $request->routine_id;
        $set->exercise_id = $request->exercise_id;
        $set->set_number = $request->set_number;
        $set->reps = $request->reps;
        $set->equipment_id = $request->equipment_id;
        $set->save();

        // Redirigir a la vista de detalle de la rutina asociada
        return redirect()->route('routines.view', $request->routine_id)->with('success', 'Set actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Eliminar un set específico
        $set = Set::findOrFail($id);
        $routine_id = $set->routine_id; // Guardamos el ID de la rutina antes de eliminar el set
        $set->delete();

        // Redirigir a la vista de detalle de la rutina asociada
        return redirect()->route('routines.view', $routine_id)->with('success', 'Set eliminado correctamente.');
    }
}
