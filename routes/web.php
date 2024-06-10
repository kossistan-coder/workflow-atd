<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/{id}/update',[AuthController::class,'configuration'])->name('configuration');
Route::post('/users/{id}/update',[AuthController::class,'updateConfiguration']);

Route::get('/sendMail',[MailController::class,'sendMail'])->name('sendMail');

Route::get('/overview', function () {
    return view('admins.overview');
})->name('overview');

Route::get('/login',[\App\Http\Controllers\Auth\AuthController::class,'showLoginForm'])->name('login');
Route::post('/login',[\App\Http\Controllers\Auth\AuthController::class,'login']);

Route::post('/admins',[\App\Http\Controllers\Auth\AuthController::class,'registerAdmin']);

Route::get('/admins',[\App\Http\Controllers\Auth\AdminController::class,'show'])->name('admins');
Route::get('admins/{id}/details',[\App\Http\Controllers\Auth\AdminController::class,'details'])->name('details');
Route::post('admins/{id}/details',[\App\Http\Controllers\Auth\AdminController::class,'edit']);
Route::get('admins/roles/edit',[\App\Http\Controllers\Auth\AdminController::class,'create'])->name('role-edit');

Route::post('/admins/{id}/roles/edit',[\App\Http\Controllers\Auth\AdminController::class,'editRole']);

Route::get('/users/{id}/delete',[UserController::class,'deleteUser'])->name('delete-user');
Route::get('/users/{id}/update',[UserController::class,'getUser'])->name('update-user');
Route::post('/users/{id}/update',[UserController::class,'updateUser']);
Route::post('users',[\App\Http\Controllers\Auth\UserController::class,'registerUser']);
Route::get('users',[UserController::class,'show'])->name('users');
Route::get('users/{id}/details',[UserController::class,'showDetails'])->name('user-details');
Route::post('users/{id}/details',[UserController::class,'edit']);
Route::post('users/{id}/demandes',[UserController::class,'createDemande'])->name('create-demande');


Route::get('/users/{id}/demandes',[UserController::class,'showDemandes'])->name('demandes');

Route::get('/demandes/{id}',[DemandeController::class,'index'])->name('all-demandes');
Route::post('/demandes/{id}',[UserController::class,'createDemande']);


Route::get('/demandes/{id}/edit/{statut}',[DemandeController::class,'editStatut'])->name('edit-statut');
Route::get('/demandes/{id}/delete',[DemandeController::class,'destroy'])->name('delete-demande');

Route::get('logout',[\App\Http\Controllers\Auth\AuthController::class,'logout'])->name('logout');


Route::get('/roles/{id}/delete',[RoleController::class,'delete'])->name('role-delete');
Route::get('/roles/{id}/update',[RoleController::class,'show'])->name('role-update');
Route::post('/roles/{id}/update',[RoleController::class,'update']);
Route::get('roles',[RoleController::class,'index'])->name('roles');
Route::post('roles',[RoleController::class,'create']);
