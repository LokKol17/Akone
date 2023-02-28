<?php

use App\Http\Controllers\AccountController\AccountControllerIndex;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LoginController\LoginControllerDestroy;
use App\Http\Controllers\LoginController\LoginControllerIndex;
use App\Http\Controllers\LoginController\LoginControllerStore;
use App\Http\Controllers\PageDontExistsController;
use App\Http\Controllers\UploadController\UploadControllerEdit;
use App\Http\Controllers\UploadController\UploadControllerIndex;
use App\Http\Controllers\UploadController\UploadControllerPut;
use App\Http\Controllers\UploadController\UploadControllerStore;
use App\Http\Controllers\UsersController\UsersControllerIndex;
use App\Http\Controllers\UsersController\UsersControllerStore;
use App\Http\Middleware\AdminMiddleware;
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

Route::get('/signup', [UsersControllerIndex::class, 'index'])->name('signup');
Route::post('/signup', [UsersControllerStore::class, 'store']);

Route::get('/signin', [LoginControllerIndex::class, 'index'])->name('signin');
Route::post('/signin', [LoginControllerStore::class, 'store']);
Route::post('/logout', [LoginControllerDestroy::class, 'destroy'])->name('logout');

Route::get('/account', [AccountControllerIndex::class, 'index'])->name('account');

Route::get('/upload', [UploadControllerIndex::class, 'index'])->name('upload')
    ->middleware([AdminMiddleware::class]);
Route::post('/upload', [UploadControllerStore::class, 'store']);

Route::get('/upload/{id}', [UploadControllerEdit::class, 'edit'])->name('upload.edit')
    ->middleware([AdminMiddleware::class]);

Route::put('/upload/{id}', [UploadControllerPut::class, 'put'])->name('upload.put')
    ->middleware([AdminMiddleware::class]);


Route::fallback([PageDontExistsController::class, 'index']);
