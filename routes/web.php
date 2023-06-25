<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adhoards\AddPostController;
use App\Http\Controllers\adhoards\AdhordsController;
use App\Http\Controllers\adhoards\Auth;
use App\Http\Controllers\universal\formController;

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

Route::get('/login', [Auth::class, 'login']);
Route::get('/register', [Auth::class, 'register']);
Route::post('/user_status',[Auth::class,'checkUserStatus']);



Route::get('/custom_form',[formController::class,'customForm']);
Route::post('/custom_form',[formController::class,'storeCustomForm']);
Route::get('/modify_custom_form',[formController::class,'modifyForm']);
Route::post('/modify_custom_form',[formController::class,'modifyFormData']);
Route::post('/delete_custom_form',[formController::class,'deleteField']);
Route::post('/delete_option',[formController::class,'deleteOption']);

Route::post('/show_form',[formController::class,'showFormDetails']);
Route::get('/category',[formController::class,'showCategory']);
Route::post('/store_category',[formController::class,'storeCategory']);

Route::get('/form',[formController::class,'dynamicForm']);
Route::post('/get_form',[formController::class,'getForm']);
Route::post('/store_form_data',[formController::class,'storeFormData']);
Route::get('/list_form_data',[formController::class,'showFormData']);
Route::get('/list_form_data/{id}',[formController::class,'showFormData']);
// Route::get('/show_form',[formController::class,'showForm']);
// Route::post('/show_form',[formController::class,'getFormData']);
// Route::post('/destroy_form',[formController::class,'destroyForm']);
// Route::post('/assign_to',[formController::class,'assignTo']);
Route::post('/get_sub_category',[formController::class,'getSubCategory']);

Route::get('/', [AdhordsController::class, 'adhoards']);
Route::get('/{cat_slug}/{sub_cat_slug}', [AdhordsController::class, 'showAdpost']);

Route::get('/adposts', [AddPostController::class, 'adposts']);
Route::post('/onclick_proceed',[AddPostController::class,'proceed']);
Route::post('/adpost/adsubmit',[AddPostController::class,'adSubmit']);
Route::get('/adposts/{cat}/{sub_cat}', [AddPostController::class, 'formGenerate']);
