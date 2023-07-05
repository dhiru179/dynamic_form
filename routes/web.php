<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jobPortal\admin\{
    FormController,
    AdminDashboard,
    JobController
};
use App\Http\Controllers\jobPortal\front\{
    LandingPage,
};

use App\Http\Controllers\jobPortal\front\user\{
    User,
};
use App\Http\Controllers\jobPortal\front\employer\{
    Employer,
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

Route::get('/', [LandingPage::class, 'landingPage'])->name('landing_page');

require_once(__DIR__ . '/auth.php');

Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminDashboard::class, 'index']);

    Route::get('/create-form', [FormController::class, 'createForm'])->name('create-form');
    Route::post('/custom_form', [FormController::class, 'storeFormField'])->name('store-field-info');
    Route::get('/modify-form', [FormController::class, 'modifyForm'])->name('modify-form');
    Route::post('/modify_custom_form', [FormController::class, 'modifyFormData']);
    Route::post('/delete_custom_form', [FormController::class, 'deleteField']);
    Route::post('/delete_option', [FormController::class, 'deleteOption']);

    Route::post('/show_form', [FormController::class, 'showFormDetails']);
    Route::get('/category', [FormController::class, 'showCategory']);
    Route::post('/store_category', [FormController::class, 'storeCategory']);


    Route::post('/get_form', [FormController::class, 'getForm']);

    #json ways
    Route::get('/form', [jsonFormController::class, 'dynamicForm']);
    Route::post('/store_form_data', [jsonFormController::class, 'storeFormData']);
    Route::get('/list_form_data', [jsonFormController::class, 'showFormData']);
    Route::get('/list_form_data/{id}', [jsonFormController::class, 'showFormData']);
    #end

});
Route::middleware(['auth:employer'])->name('employer.')->prefix('employers')->group(function () {
    Route::get('/dashboard', [Employer::class, 'dashboard'])->name('dashboard');

});

Route::middleware(['auth'])->name('users.')->prefix('users')->group(function () {

    Route::get('/index', [User::class, 'index'])->name('index');

});
