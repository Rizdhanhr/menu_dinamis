<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MapsController;
use App\Http\Controllers\MenuController;
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

// Route::get('/', function () {
//     return view('auth.login');
// });


// Auth::routes();
Route::get('login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('login', [LoginController::class,'login']);


Route::middleware(['auth'])->group(function () {
    Route::post('logout', [LoginController::class,'logout'])->name('logout');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('/roles',RolesController::class);
    Route::get('/roles/aksesmenu/{id}', [RolesController::class,'akses']);
    Route::post('/roles/changemenu',[RolesController::class,'change']);
    Route::resource('/user',UserController::class);
    Route::resource('/pegawai',PegawaiController::class);
    Route::resource('/pekerjaan',PekerjaanController::class);
    Route::resource('/lokasi',MapsController::class);
    Route::resource('/menu',MenuController::class);
});


