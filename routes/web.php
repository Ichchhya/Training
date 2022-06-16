<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\TrainingCenterController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
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
Route::controller(UserController::class)->prefix('admin/users')->name('admin.users.')->group(function() {
    // Route::resource('/');
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/store','store')->name('store');
    Route::get('/edit/{id}','edit')->name('edit');
    Route::put('/update/{id}','update')->name('update');
    Route::get('/delete/{id}','destroy')->name('destroy');
});

Route::controller(CourseController::class)->prefix('admin/courses')->name('admin.courses.')->group(function() {
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/store','store')->name('store');
    Route::get('/edit/{id}','edit')->name('edit');
    Route::put('/update/{id}','update')->name('update');
    Route::get('/delete/{id}','destroy')->name('destroy');
});
Route::group(['middleware' => ['auth']], function() {
Route::controller(TrainingCenterController::class)->prefix('admin/training-centers')->name('admin.training-centers.')->group(function() {
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
});
});

Route::controller(CategoryController::class)->prefix('admin/categories')->name('admin.categories.')->group(function() {
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/store','store')->name('store');
    Route::get('/edit/{id}','edit')->name('edit');
    Route::put('/update/{id}','update')->name('update');
    Route::get('/delete/{id}','destroy')->name('destroy');
});

Route::get('/', function () {
    return view('backend.system.layouts.app');
});

Route::get('/dashboard',function(){
    return view ('backend.system.dashboard');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
