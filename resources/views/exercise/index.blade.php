@extends('layout.app')

@section('content')
<div class="container">
    <h1>Exercise</h1>
    
    <p>agregrar ejercicio <a href="{{ route('exercise.create') }}">➕</a> </p>
  

    @if ($exercises->isEmpty())
        <p>No exercises found.</p>
    @else
    <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>User</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($exercises as $routine)
                    <tr>
                        <td>{{ $routine->name }}</td>
                        <td>{{ $routine->user->name }}</td>
                        <td>{{ $routine->created_at->format('d/m/Y H:i:s') }}</td>
                        <td>
                            <!-- Aquí puedes agregar enlaces para ver, editar o eliminar la rutina -->
                            <a href="{{ route('exercises.show', $routine->id_routine) }}" class="btn btn-sm btn-primary">View</a>
                            <a href="{{ route('exercises.edit', $routine->id_routine) }}" class="btn btn-sm btn-secondary">Edit</a>
                            <!-- Formulario para eliminar (opcional) -->
                            <form action="{{ route('exercises.destroy', $routine->id_routine) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this routine?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
