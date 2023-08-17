<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
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

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin',  'middleware' => 'is_admin'], function () {
    Route::get('home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('category-list', [CategoryController::class, 'manageCategory'])->name('admin.categorylist');
    Route::post('add-category', [CategoryController::class, 'addCategory'])->name('add.category');
    Route::get('/user/{userId}', [HomeController::class, 'getDisplayUserDash'])->name('displaydashboard');
    Route::resource('categorys', CategoryController::class)->middleware('is_admin');
});

