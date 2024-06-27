@extends('layout.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 dark:text-white">Rutina: {{ $routine->name }}</h1>

    <!-- Formulario para agregar un set -->
    <form action="{{ route('sets.store') }}" method="POST" class="mb-4">
        @csrf
        <input type="hidden" name="routine_id" value="{{ $routine->id_routine }}">
        
        <div class="mb-4">
            <label for="exercise_id" class="block text-gray-700 dark:text-gray-300">Ejercicio:</label>
            <select name="exercise_id" id="exercise_id" 
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
            >
                @foreach($exercises as $exercise)
                    <option value="{{ $exercise->id }}">{{ $exercise->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-4">
            <label for="set_number" class="block text-gray-700 dark:text-gray-300">Número de Set:</label>
            <input type="number" name="set_number" id="set_number" 
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                required
            >
        </div>

        <div class="mb-4">
            <label for="reps" class="block text-gray-700 dark:text-gray-300">Repeticiones:</label>
            <input type="number" name="reps" id="reps" 
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                required
            >
        </div>

        <div class="mb-4">
            <label for="equipment_id" class="block text-gray-700 dark:text-gray-300">Equipo:</label>
            <select name="equipment_id" id="equipment_id" 
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
            >
                @foreach($equipment as $equip)
                    <option value="{{ $equip->id }}">{{ $equip->equipment }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Agregar Set
        </button>
    </form>

    <!-- Tabla para mostrar los sets asociados -->
    <table class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-200 dark:bg-gray-700">
            <tr>
                <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">#</th>
                <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Ejercicio</th>
                <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Número de Set</th>
                <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Repeticiones</th>
                <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Equipo</th>
                <th class="px-4 py-2 text-left text-gray-600 dark:text-gray-300">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sets as $set)
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <td class="border px-4 py-2 text-gray-800 dark:text-gray-300">{{ $set->id }}</td>
                    <td class="border px-4 py-2 text-gray-800 dark:text-gray-300">{{ $set->exercise->name }}</td>
                    <td class="border px-4 py-2 text-gray-800 dark:text-gray-300">{{ $set->set_number }}</td>
                    <td class="border px-4 py-2 text-gray-800 dark:text-gray-300">{{ $set->reps }}</td>
                    <td class="border px-4 py-2 text-gray-800 dark:text-gray-300">{{ $set->equipment->equipment }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('sets.edit', $set->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">
                            Editar
                        </a>
                        <form action="{{ route('sets.destroy', $set->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
