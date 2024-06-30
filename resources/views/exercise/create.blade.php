@extends('layout.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 dark:text-white">Create Exercise</h1>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6 dark:bg-red-200 dark:text-red-800">
        <strong class="font-bold">Whoops!</strong>
        <span class="block sm:inline">There were some problems with your input.</span>
        <ul class="mt-3 list-disc list-inside">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('exercise.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700 dark:text-gray-300">Exercise Name</label>
            <input type="text" name="name" id="name" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
        </div>


        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 mb-2">Grupos Musculares</label>
            <div class="grid grid-cols-2 gap-4">
                @foreach(['Pecho','Espalda','Trapecio','Hombros','Biceps','Triceps','Antebrazos','Muslos','Pantorrillas','Glúteos','Abdomen'] as $grupo)
                <label class="inline-flex items-center">
                    <input type="checkbox" name="grupos_musculares[]" value="{{ $grupo }}" class="form-checkbox h-5 w-5 text-blue-600 border-gray-300 rounded dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">{{ $grupo }}</span>
                </label>
                @endforeach
            </div>
        </div>


        <div class="mb-4">
            <label for="user_id" class="block text-gray-700 dark:text-gray-300">User</label>
            <select name="user_id" id="user_id" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                @foreach(App\Models\User::all() as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create Exercise
        </button>
    </form>
</div>
@endsection