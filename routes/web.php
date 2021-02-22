<?php

use App\Http\Controllers\CContactController;
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

Route::get('/trainees/{trainee}/show', [TraineeController::class, 'show'])->name('trainees.show');

Route::get('/admin/trainees/{trainee}/edit', [TraineeController::class, 'edit'])->name('trainees.edit');

Route::put('/admin/trainees/{trainee}/update', [TraineeController::class, 'update'])->name('trainees.update');

Route::delete('/admin/trainees/{trainee}/destroy', [TraineeController::class, 'destroy'])->name('trainees.destroy');

//  routes du CompagnyController : CRUD soumis à authentification Admin et/ou USER

Route::get('compagnies/create', [CompagnyController::class, 'create'])->name('compagnies.create');

Route::post('compagnies/store', [CompagnyController::class, 'store'])->name('compagnies.store');

Route::get('compagnies/index', [CompagnyController::class, 'index'])->name('compagnies.index');

Route::get('compagnies/{compagny}/edit', [CompagnyController::class, 'edit'])->name('compagnies.edit');

Route::put('compagnies/{compagny}/update', [CompagnyController::class, 'update'])->name('compagnies.update');

Route::delete('compagnies/{compagny}/destroy', [CompagnyController::class, 'destroy'])->name('compagnies.destroy');

//Routes du CContactController : Gestion des contacts en entreprise

Route::get('c_contacts/{compagny}/index', [CContactController::class, 'index'])->name('c_contacts.index');

Route::get('c_contacts/{compagny}/create', [CContactController::class, 'create'])->name('c_contacts.create');

Route::post('c_contacts/store', [CContactController::class, 'store'])->name('c_contacts.store');

Route::get('c_contacts/{cContact}/edit', [CContactController::class, 'edit'])->name('c_contacts.edit');

Route::put('c_contacts/{cContact}/update', [CContactController::class, 'update'])->name('c_contacts.update');


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
