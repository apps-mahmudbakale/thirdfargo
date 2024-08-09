<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('test', function () {
    return $users = \App\User::all();
});

Route::get('/test/{id}', function () {
    return $users = \App\User::all();
});

Route::get('/transactions', function () {
    return view('transactions');
})->name('transactions');

Auth::routes();
Route::post('signup', [\App\Http\Controllers\LoginController::class, 'register'])->name('doRegister');
Route::post('sigin', [\App\Http\Controllers\LoginController::class, 'login'])->name('doLogin');
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users/edit/{id}', [AdminController::class, 'edit'])->name('users.edit');
    Route::post('/admin/users/delete/{id}', [AdminController::class, 'delete'])->name('users.destroy');
    Route::put('/admin/users/update/{id}', [AdminController::class, 'update'])->name('users.update');
    // Other admin routes
});
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

