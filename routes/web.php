<?php

use App\Models\Traineeship;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\TraineeController;
use App\Http\Controllers\CContactController;
use App\Http\Controllers\CompagnyController;
use App\Http\Controllers\TraineeshipController;
use App\Http\Controllers\DashboardAdminController;

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

Auth::routes();

// Routes du main Controlleur : affichage page d'accueil sans authentification
Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('trainees/{trainee:id}',[MainController::class, 'show'])->name('trainee');


// Routes soumises au Middleware ('admin') limitée au user ayant le role ADMIN
Route::middleware('admin')->group(function(){
    Route::delete('admin/trainees/{trainee}/destroy', [TraineeController::class, 'destroy'])->name('trainees.destroy');
    Route::delete('compagnies/{compagny}/destroy', [CompagnyController::class, 'destroy'])->name('compagnies.destroy');
    Route::get('c_contacts/{compagny}/index', [CContactController::class, 'index'])->name('c_contacts.index');
    Route::get('c_contacts/{compagny}/create', [CContactController::class, 'create'])->name('c_contacts.create');
    Route::post('c_contacts/store', [CContactController::class, 'store'])->name('c_contacts.store');
    Route::get('c_contacts/{cContact}/edit', [CContactController::class, 'edit'])->name('c_contacts.edit');
    Route::put('c_contacts/{cContact}/update', [CContactController::class, 'update'])->name('c_contacts.update');
    Route::get('admin/index', [DashboardAdminController::class, 'index'])->name('admins.index');
    Route::get('admin/{trainee}/show',[DashboardAdminController::class, 'show'])->name('admins.show');
    Route::get('promo/index', [PromoController::class, 'index'])->name('promos.index');
    Route::post('promo/store', [PromoController::class, 'store'])->name('promos.store');
    Route::put('promo/{promo}/update', [PromoController::class, 'update'])->name('promos.update');
    Route::get('skill/index', [SkillController::class, 'index'])->name('skills.index'); 
    Route::post('skill/store', [SkillController::class, 'store'])->name('skills.store');
});

// Routes soumises au Middleware ('auth') limitée au user connecté
Route::middleware('auth')->group(function(){
    Route::get('compagny', [MainController::class, 'compagny'])->name('compagnies'); 
    Route::get('compagny/{compagny:id}', [MainController::class, 'showcompagny'])->name('compagny');
    Route::get('trainees/create', [TraineeController::class, 'create'])->name('trainees.create');
    Route::post('trainees/store', [TraineeController::class, 'store'])->name('trainees.store');
    Route::get('trainees/{trainee}/show', [TraineeController::class, 'show'])->name('trainees.show'); 
    Route::get('trainees/{trainee}/edit', [TraineeController::class, 'edit'])->name('trainees.edit');
    Route::put('trainees/{trainee}/update', [TraineeController::class, 'update'])->name('trainees.update');
    Route::get('compagnies/create', [CompagnyController::class, 'create'])->name('compagnies.create');
    Route::post('compagnies/store', [CompagnyController::class, 'store'])->name('compagnies.store');
    Route::get('compagnies/index', [CompagnyController::class, 'index'])->name('compagnies.index');
    Route::get('compagnies/{compagny}/edit', [CompagnyController::class, 'edit'])->name('compagnies.edit');
    Route::put('compagnies/{compagny}/update', [CompagnyController::class, 'update'])->name('compagnies.update');
    Route::post('traineeships/store', [TraineeshipController::class, 'store'])->name('traineeships.store');
    Route::get('traineeships/{traineeship}/edit', [TraineeshipController::class, 'edit'])->name('traineeships.edit');
    Route::put('trainneships/{traineeship}/update', [TraineeshipController::class, 'update'])->name('traineeships.update');
});


