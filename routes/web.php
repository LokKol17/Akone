<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PageDontExistsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersCotroller;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [HomepageController::class, 'index']);
Route::get('/home', [HomepageController::class, 'index'])->name('homepage');

Route::get('/signup', [UsersCotroller::class, 'index'])->name('signup');
Route::post('/signup', [UsersCotroller::class, 'store']);

Route::get('/signin', [LoginController::class, 'index'])->name('signin');
Route::post('/signin', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::fallback([PageDontExistsController::class, 'index']);
