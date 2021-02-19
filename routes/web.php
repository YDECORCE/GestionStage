<?php

use App\Http\Controllers\CompagnyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TraineeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Routes du main Controlleur : affichage page d'accueil sans authentification
Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('/trainees/{trainee:id}',[MainController::class, 'show'])->name('trainee');
Route::get('/compagny', [MainController::class, 'compagny'])->name('compagnies'); 
Route::get('/compagny/{compagny:id}', [MainController::class, 'showcompagny'])->name('compagny');


//  routes du TraineeController : CRUD soumis à authentification Admin

Route::get('/admin/trainees/create', [TraineeController::class, 'create'])->name('trainees.create');

Route::post('/admin/trainees/store', [TraineeController::class, 'store'])->name('trainees.store');

Route::get('/admin/trainees', [TraineeController::class, 'index'])->name('trainees.index');

Route::get('/admin/trainees/{trainee}/edit', [TraineeController::class, 'edit'])->name('trainees.edit');

Route::put('/admin/trainees/{trainee}/update', [TraineeController::class, 'update'])->name('trainees.update');

Route::delete('/admin/trainees/{trainee}/destroy', [TraineeController::class, 'destroy'])->name('trainees.destroy');

//  routes du CompagnyController : CRUD soumis à authentification Admin et/ou USER

Route::get('compagnies/create', [CompagnyController::class, 'create'])->name('compagnies.create');

Route::post('compagnies/store', [CompagnyController::class, 'store'])->name('compagnies.store');

Route::get('compagnies/index', [CompagnyController::class, 'index'])->name('compagnies.index');