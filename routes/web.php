<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\KomunitasController;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Client\Request;
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
// Route::delete('/usersD/{user}', function(User $user){$user->delete();return back()->with('Data berhasil di hapus!')  
// });

Route::get('/', [HomeController::class, 'index']);
Route::post('/pencarian', [HomeController::class, 'pencarian']);
Route::post('/pencarian2', [HomeController::class, 'pencarian2']);
Route::get('watch/{id}', [HomeController::class, 'watch']);
Route::get('/read/{id}', [HomeController::class, 'read']);


// Route::get('/login', function(){})->name('login');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'checking'])->middleware('guest');
Route::get('/register', [LoginController::class, 'register'])->middleware('guest');
Route::post('/register', [LoginController::class, 'store'])->middleware('guest');


Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/profil/{id}', [DashboardController::class, 'lihatProfil'])->middleware('auth');
Route::post('/dashboard/profil/{id}', function ($id) {
    User::where('id', $id)
        ->update(['level' => request()->level]);
    return back()->with('flash', 'Data telah berhasil dirubah');
})->middleware('auth');
Route::get('/profil', [DashboardController::class, 'profil'])->middleware('auth');
Route::post('/profil', [DashboardController::class, 'updateProfil'])->middleware('auth');
Route::delete('/user/{user}', [DashboardController::class, 'delete'])->middleware('auth');

Route::resource('resep', ResepController::class)->middleware('auth');

Route::get('komunitas', [KomunitasController::class, 'index'])->middleware('auth');
Route::get('/komunitas/{id}', [KomunitasController::class, 'show'])
->where('id', '[0-9]+');
Route::get('/komunitas/create', [KomunitasController::class, 'create'])->middleware('auth');
Route::post('/komunitas', [KomunitasController::class, 'store'])->middleware('auth');
Route::put('/komunitas', [KomunitasController::class, 'update'])->middleware('auth');
Route::get('/komunitas/destroy/{id}', [KomunitasController::class, 'destroy'])->middleware('auth')
->where('id', '[0-9]+');
