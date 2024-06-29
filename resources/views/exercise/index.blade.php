@extends('layout.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex items-center justify-between">
    <h1 class="text-3xl font-bold mb-6 dark:text-white">Exercise</h1>
    
    <a class="bg-sky-700 rounded-lg font-bold py-1 px-3 mx-1 " href="{{ route('exercise.create') }}">
    <p class="text-white dark:text-gray-300" >Agregar ejercicio 
        <span class="text-sky-500 hover:text-sky-700 dark:text-sky-400 dark:hover:text-sky-600">➕</span>
    </p>
    </a>
    
    </div>
  
    @if ($exercises->isEmpty())
        <p class="text-gray-700 dark:text-gray-300">No exercises found.</p>
    @else
    <table class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-200 dark:bg-gray-700">
            <tr>
                <th class="py-2 px-4 text-left text-gray-600 dark:text-gray-300">Name</th>
                <th class="py-2 px-4 text-left text-gray-600 dark:text-gray-300 hidden md:table-cell">Created at</th>
                <th class="py-2 px-4 text-left text-gray-600 dark:text-gray-300">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($exercises as $exercise)
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <td class="py-2 px-4 text-gray-800 dark:text-gray-300">{{ $exercise->name }}</td>
                    <td class="py-2 px-4 text-gray-800 dark:text-gray-300 hidden md:table-cell">{{ $exercise->created_at->format('d/m/Y H:i:s') }}</td>
                    <td class="py-2 px-4 text-gray-800 dark:text-gray-300">
                        <a 
                            href="{{ route('exercise.show', $exercise->id) }}"
                            class="bg-sky-500 hover:bg-sky-700 text-white font-bold py-1 px-3 m-1 rounded text-sm"
                        >
                            Editar
                        </a>
                        <form action="{{ route('exercise.destroy', $exercise->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-sm m-1"
                                onclick="return confirm('Are you sure you want to delete this routine?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
   </div>
@endsection
