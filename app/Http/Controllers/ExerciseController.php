<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Ejercicio_grupo_muscular;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
    //  */
    public function index()
    {
        //
        $exercises = Exercise::all();
        $grupo_muscular = Ejercicio_grupo_muscular::all();
        return view('exercise.index', compact('exercises', 'grupo_muscular'));
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
        // Obtener el ejercicio junto con sus grupos musculares
        $exercise = Exercise::with('gruposMusculares')->findOrFail($id);

        // Registrar la información en el log (opcional)
        Log::info('Mostrando la información del ejercicio y sus grupos musculares:', [
            'exercise' => $exercise->toArray(),
        ]);

        // Devolver la vista con la información del ejercicio y los grupos musculares
        return view('exercise.view', compact('exercise'));
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

        // Iniciar la transacción
        DB::beginTransaction();

        try {
            // Buscar el ejercicio existente
            $exercise = Exercise::findOrFail($id);

            // Actualizar el nombre del ejercicio
            $exercise->name = $request->name;
            $exercise->save();

            // Si se proporcionaron grupos musculares, actualizarlos
            if ($request->has('grupos_musculares') && is_array($request->grupos_musculares)) {
                // Eliminar los grupos musculares existentes asociados a este ejercicio
                Ejercicio_grupo_muscular::where('exercise_id', $exercise->id)->delete();

                // Asociar los nuevos grupos musculares
                foreach ($request->grupos_musculares as $grupoMuscular) {
                    Ejercicio_grupo_muscular::create([
                        'exercise_id' => $exercise->id,
                        'grupo_muscular' => $grupoMuscular,
                    ]);
                }
            }

            // Confirmar la transacción
            DB::commit();

            // Registrar la información en el log
            Log::info('Se ha actualizado un ejercicio con los siguientes grupos musculares:', [
                'exercise' => $exercise->toArray(),
                'grupos_musculares' => $request->grupos_musculares
            ]);

            return redirect()->route('exercise.index')->with('success', 'Exercise updated successfully');
        } catch (\Exception $e) {
            // Revertir la transacción en caso de error
            DB::rollBack();

            // Registrar el error en el log
            Log::error('Error al actualizar el ejercicio: ' . $e->getMessage(), [
                'exercise_id' => $id,
                'request_data' => $request->all()
            ]);

            return redirect()->route('exercise.index')->with('error', 'Failed to update exercise. Please try again.');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Elminar ejericicio 
        $exercise = Exercise::findOrFail($id);
        $exercise->delete();
        return redirect()->route('exercise.index')->with('success', 'Routine deleted successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        // Iniciar la transacción
        DB::beginTransaction();

        try {
            // Crear el nuevo ejercicio
            $exercise = Exercise::create([
                'name' => $request->name,
            ]);

            // Verificar si hay grupos musculares en el request
            if ($request->has('grupos_musculares') && is_array($request->grupos_musculares)) {
                // Recorrer el array de grupos musculares y crear las relaciones
                foreach ($request->grupos_musculares as $grupoMuscular) {
                    Ejercicio_grupo_muscular::create([
                        'exercise_id' => $exercise->id,
                        'grupo_muscular' => $grupoMuscular,
                    ]);
                }
            }

            // Confirmar la transacción
            DB::commit();

            // Registrar la información en el log
            Log::info('Se ha creado un nuevo ejercicio con los siguientes grupos musculares:', [
                'exercise' => $exercise->toArray(),
                'grupos_musculares' => $request->grupos_musculares
            ]);

            return redirect()->route('exercise.index')->with('success', "Exercise created");
        } catch (\Exception $e) {
            // Revertir la transacción en caso de error
            DB::rollBack();

            // Registrar el error en el log
            Log::error('Error al crear el ejercicio: ' . $e->getMessage(), [
                'request_data' => $request->all()
            ]);

            return redirect()->route('exercise.index')->with('error', 'Failed to create exercise. Please try again.');
        }
    }
}
