@extends('layout.app')

@section('content')

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 dark:text-white">Frente y espalda</h1>
    <div class="flex flex-wrap items-end justify-center gap-8">
        <figure class="text-center">
            <figcaption class="mb-2 text-sm text-gray-500 dark:text-gray-300">Frente</figcaption>
            <div class="body-figure-wrap">{!! $front !!}</div>
        </figure>
        <figure class="text-center">
            <figcaption class="mb-2 text-sm text-gray-500 dark:text-gray-300">Espalda</figcaption>
            <div class="body-figure-wrap">{!! $back !!}</div>
        </figure>
    </div>
</div>
<style>
    .body-figure-wrap svg { height: 320px; width: auto; }
</style>
@endsection
