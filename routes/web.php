<?php

use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\RoutineController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('routines/create', [RoutineController::class, 'create'])->name('routines.createroutine');
Route::post('routines', [RoutineController::class, 'store'])->name('routines.store');
Route::get('routines', [RoutineController::class, 'index'])->name('routines.index');
Route::get('routines/{id}', [RoutineController::class, 'show'])->name('routines.show');
Route::get('routines/{id}/edit', [RoutineController::class, 'edit'])->name('routines.edit');
Route::put('routines/{id}', [RoutineController::class, 'update'])->name('routines.update');
Route::delete('routines/{id}', [RoutineController::class, 'destroy'])->name('routines.destroy');

//section exercises
Route::get('exercise', [ExerciseController::class, 'index'])->name('exercise.index');
Route::get('exercise/create', [ExerciseController::class, 'create'])->name('exercise.create');
Route::post('exercise', [ExerciseController::class, 'store'])->name('exercise.store');

