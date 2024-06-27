@extends('layout.app')

@section('content')
<div class="container">
    <h1 class="my-5 py-5">Rutina: {{ $routine->name }}</h1>

    <!-- Formulario para agregar un set -->
    <form action="{{ route('sets.update',$set->id) }}" method="POST" class="mb-4">
        @csrf
        @method('PUT')
        <input type="hidden" name="routine_id" value="{{ $routine->id_routine }}">
        
        <div class="mb-4">
            <label for="exercise_id" class="block text-gray-700">Ejercicio:</label>
            <select name="exercise_id" id="exercise_id" 
            class="form-select mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            >
                @foreach($exercises as $exercise)
                    <option value="{{ $exercise->id }}"   {{ $set->exercise_id == $exercise->id ? 'selected' : '' }}   >{{ $exercise->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-4">
            <label for="set_number" class="block text-gray-700">Número de Set:</label>
            <input type="number" name="set_number" id="set_number" 
            class="form-input mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            value="{{$set->set_number}}"
            required>
        </div>

        <div class="mb-4">
            <label for="reps" class="block text-gray-700">Repeticiones:</label>
            <input type="number" name="reps" id="reps" 
            class="form-input mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
               value="{{$set->reps}}"
             required>
        </div>

        <div class="mb-4">
            <label for="equipment_id" class="block text-gray-700">Equipo:</label>
            <select name="equipment_id" id="equipment_id" 
            class="form-input mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"

            >
                @foreach($equipment as $equip)
                    <option value="{{ $equip->id }}">{{ $equip->equipment }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Agregar Set</button>
    </form>

    <!-- Tabla para mostrar los sets asociados -->
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Ejercicio</th>
                <th class="px-4 py-2">Número de Set</th>
                <th class="px-4 py-2">Repeticiones</th>
                <th class="px-4 py-2">Equipo</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sets as $set)
                <tr>
                    <td class="border px-4 py-2">{{ $set->id }}</td>
                    <td class="border px-4 py-2">{{ $set->exercise->name }}</td>
                    <td class="border px-4 py-2">{{ $set->set_number }}</td>
                    <td class="border px-4 py-2">{{ $set->reps }}</td>
                    <td class="border px-4 py-2">{{ $set->equipment->equipment }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('sets.edit', $set->id) }}" class="bg-yellow-500 text-white py-1 px-2 rounded">Editar</a>
                        <form action="{{ route('sets.destroy', $set->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white py-1 px-2 rounded">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
