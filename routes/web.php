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
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('admin/category-list', [CategoryController::class, 'manageCategory'])->name('admin.categorylist')->middleware('is_admin');
Route::post('admin/add-category', [CategoryController::class, 'addCategory'])->name('add.category')->middleware('is_admin');
Route::get('/admin/user/{userId}', [HomeController::class, 'getDisplayUserDash'])->name('displaydashboard')->middleware('is_admin');