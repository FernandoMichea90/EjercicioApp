<?php

use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\RoutineController;
use App\Http\Controllers\SetController;

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

Route::get('/body',[GeneralController::class,'index'])->name('general.index');
Route::get('/', [RoutineController::class, 'welcome'])->name('routines.welcome');
Route::get('routines/create', [RoutineController::class, 'create'])->name('routines.createroutine');
Route::post('routines', [RoutineController::class, 'store'])->name('routines.store');
Route::get('routines', [RoutineController::class, 'index'])->name('routines.index');
Route::get('routines/{id}', [RoutineController::class, 'show'])->name('routines.show');
Route::put('routines/{id}', [RoutineController::class, 'update'])->name('routines.update');
Route::delete('routines/{id}', [RoutineController::class, 'destroy'])->name('routines.destroy');
Route::get('routines/{id}/view', [RoutineController::class, 'view'])->name('routines.view');

//section exercises
Route::get('exercises', [ExerciseController::class, 'index'])->name('exercise.index');
Route::get('exercises/create', [ExerciseController::class, 'create'])->name('exercise.create');
Route::post('exercises', [ExerciseController::class, 'store'])->name('exercise.store');
Route::delete('exercise/{id}',[ExerciseController::class,'destroy'])->name('exercise.destroy');
Route::get('exercise/{id}/show', [ExerciseController::class, 'show'])->name('exercise.show');
Route::put('exercise/{id}',[ExerciseController::class,'update'])->name('exercise.update');


// Section set

Route::post('/sets', [SetController::class, 'store'])->name('sets.store');
Route::get('/sets/{id}/edit', [SetController::class, 'edit'])->name('sets.edit');
Route::delete('/sets/{id}', [SetController::class, 'destroy'])->name('sets.destroy');
Route::put('/sets/{id}', [SetController::class, 'update'])->name('sets.update');

