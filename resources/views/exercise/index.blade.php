@extends('layout.app')

@section('content')
<div class="container">
    <h1>Exercise</h1>
    
    <p>agregrar ejercicio <a href="{{ route('exercise.create') }}">➕</a> </p>
  

    @if ($exercises->isEmpty())
        <p>No exercises found.</p>
    @else
        <p>
            Exercises
        </p>
    @endif
</div>
@endsection
