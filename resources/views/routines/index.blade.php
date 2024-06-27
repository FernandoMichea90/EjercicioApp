@extends('layout.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex items-center justify-between">
    <h1 class="text-3xl font-bold mb-6 dark:text-white">Routines</h1>
    <a class="bg-sky-700 rounded-lg font-bold py-1 px-3 mx-1 " href="{{ route('routines.createroutine') }}">
    <p class="text-white dark:text-gray-300 flex items-center justify-between" >Agregar rutina 
        <span class="text-sky-500 hover:text-sky-700 dark:text-sky-400 dark:hover:text-sky-600">
        <svg xmlns="http://www.w3.org/2000/svg"  width="1em" height="1em" viewBox="0 0 50 50" class="mx-2 fill-white stroke-white h-5 w-5"><path  d="M25 42c-9.4 0-17-7.6-17-17S15.6 8 25 8s17 7.6 17 17s-7.6 17-17 17m0-32c-8.3 0-15 6.7-15 15s6.7 15 15 15s15-6.7 15-15s-6.7-15-15-15"/><path  d="M16 24h18v2H16z"/><path  d="M24 16h2v18h-2z"/></svg>
        </span>
    </p>
    </a>
        
    </div>

    @if ($routines->isEmpty())
        <p class="text-gray-700 dark:text-gray-300">No routines found.</p>
    @else
        <table class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200 dark:bg-gray-700">
                <tr>
                    <th class="py-2 px-4 text-left text-gray-600 dark:text-gray-300">Name</th>
                    <th class="py-2 px-4 text-left text-gray-600 dark:text-gray-300 hidden md:table-cell ">User</th>
                    <th class="py-2 px-4 text-left text-gray-600 dark:text-gray-300 hidden md:table-cell">Created At</th>
                    <th class="py-2 px-4 text-left text-gray-600 dark:text-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($routines as $routine)
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="py-2 px-4 text-gray-800 dark:text-gray-300">{{ $routine->name }}</td>
                        <td class="py-2 px-4 text-gray-800 dark:text-gray-300 hidden md:table-cell">{{ $routine->user->name }}</td>
                        <td class="py-2 px-4 text-gray-800 dark:text-gray-300 hidden md:table-cell">{{ $routine->created_at->format('d/m/Y H:i:s') }}</td>
                        <td class="py-2 px-4 text-gray-800 dark:text-gray-300">
                            <!-- Aquí puedes agregar enlaces para ver, editar o eliminar la rutina -->
                            <a 
                                href="{{ route('routines.show', $routine->id_routine) }}" 
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 m-1 rounded text-sm sm:w-full"
                            >
                                View
                            </a>
                            <a 
                                href="{{ route('routines.view', $routine->id_routine) }}" 
                                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-3 m-1 rounded text-sm sm:w-full"
                            >
                                Edit
                            </a>
                            <!-- Formulario para eliminar (opcional) -->
                            <form action="{{ route('routines.destroy', $routine->id_routine) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-sm m-1 sm:w-full"
                                    onclick="return confirm('Are you sure you want to delete this routine?')"
                                >
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
