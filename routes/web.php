<?php

use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/transactions', function () {
    return view('transactions');
})->name('transactions');

Auth::routes();
Route::post('signup', [\App\Http\Controllers\LoginController::class, 'register'])->name('doRegister');
Route::post('sigin', [\App\Http\Controllers\LoginController::class, 'login'])->name('doLogin');
Route::get('/home', 'HomeController@index')->name('home');
