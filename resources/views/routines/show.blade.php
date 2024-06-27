@extends('layout.app')

@section('content')
<div class="container mx-auto">
    <!-- Tabla para mostrar los sets asociados -->
    <div>
        <div class="flex items-center">
            <div class="h-16 w-16 bg-white dark:bg-gray-800/50 flex items-center justify-center rounded-full shadow-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 stroke-red-500" viewBox="0 0 48 48"><path fill="none"  stroke-linecap="round" stroke-linejoin="round" d="M9.5 14.06h3.66v3.66H9.5zm3.66 16.517H9.5v-3.66h3.66zM9.5 33.728h3.66v3.66H9.5zm0-23.116h29m-22.193 5.279H38.5M16.307 28.747H38.5M16.307 35.54H38.5m0-11.813h-29"/><path fill="none"  stroke-linecap="round" stroke-linejoin="round" d="M38.5 5.5h-29a4 4 0 0 0-4 4v29a4 4 0 0 0 4 4h29a4 4 0 0 0 4-4v-29a4 4 0 0 0-4-4"/></svg>
            </div>
            <h1 class="m-5 py-5 text-center dark:text-white text-gray font-semibold text-xl">{{ $routine->name }}</h1>

        </div>
        <div>
            @foreach($sets as $set)
            <div class="p-1">
                <div class="bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex flex-col hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                    <div class="p-6">
                        <div class="flex  justify-between">

                            <div class="flex items-center">
                                <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 stroke-red-500" viewBox="0 0 2048 2048">
                                        <path fill="#ef4444" d="m1883 640l128 128l-283 282l-320-319l-677 677l319 320l-282 283l-128-128l-160 159l-192-191q-10 9-20 21t-22 22t-25 18t-29 8q-26 0-45-19t-19-45q0-15 7-28t18-25t23-22t21-21L6 1568l159-160l-128-128l283-282l320 319l677-677l-319-320l282-283l128 128L1568 6l192 191q10-9 20-21t22-22t25-18t29-8q26 0 45 19t19 45q0 15-7 28t-18 25t-23 22t-21 21l191 192zM549 1792l-293-293l-69 69l293 293zm321-64l-550-550l-101 102l549 549zm629-1472l293 293l69-69l-293-293zm330 512l-549-549l-102 101l550 550z" />
                                    </svg>
                                </div>
                                <div class="mx-5">
                                    <h2 class="text-xl font-semibold mb-2  text-gray-700 dark:text-white">{{ $set->exercise->name }}</h2>
                                    <p class="text-gray-300 mb-4 text-gray-400"> {{ $set->set_number }} Series de {{ $set->reps }} repeticiones</p>
                                </div>


                            </div>
                            <p class="text-gray-300 mb-4 text-center text-gray-400">{{ $set->equipment->equipment }}</p>

                            <!-- <p class="text-gray-300 mb-4 text-center">#{{ $set->id }}</p> -->
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection