<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jobPortal\admin\auth\{
    AdminAuth,
};
use App\Http\Controllers\jobPortal\front\user\auth\{
    UsersAuth,
};
use App\Http\Controllers\jobPortal\front\employer\auth\{
    EmployerAuth,
};
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


Route::name('admin.')->prefix('admin')->group(function () {

    // Route::get('/signup', [AdminAuth::class, 'signUp'])->name('signup');
    Route::get('/login', [AdminAuth::class, 'login'])->name('login');
    Route::post('/login', [AdminAuth::class, 'login'])->name('login.post');
    Route::post('/logout', [AdminAuth::class, 'logout'])->name('logout');
});
Route::name('employer.')->prefix('employers')->group(function () {
    Route::get('/signup', [EmployerAuth::class, 'signUp'])->name('signup');
    Route::post('/signup', [EmployerAuth::class, 'signUp'])->name('signup.post');
    Route::get('/login', [EmployerAuth::class, 'login'])->name('login');
    Route::post('/login', [EmployerAuth::class, 'loginPost'])->name('login.post');
    Route::post('/logout', [EmployerAuth::class, 'logout'])->name('logout')->middleware('auth:employer');
});

Route::name('users.')->prefix('users')->group(function () {
    Route::get('/signup', [UsersAuth::class, 'signUp'])->name('signup');
    Route::post('/signup', [UsersAuth::class, 'signUp'])->name('signup.post');
    Route::get('/login', [UsersAuth::class, 'login'])->name('login');
    Route::post('/login', [UsersAuth::class, 'loginPost'])->name('login.post');
    Route::post('/logout', [UsersAuth::class, 'logout'])->name('logout')->middleware('auth');
});
