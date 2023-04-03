<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Controller;
use \App\Http\Controllers\MenyuController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\SovgaController;
use \App\Http\Controllers\SavatController;
use \App\Http\Controllers\CategoryController;


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
//Route::get('/users',[MenyuController::class,'index'])->name('user.index');
//Route::get('/admins',[AdminController::class,'index'])->name('admin.index');
Route::resource('/users',MenyuController::class);
Route::resource('/admins',AdminController::class);

//Sovg`a bo`limiga o`tadi
Route::resource('/sovga',SovgaController::class)->name('index','sovga');
Route::resource('/savat',SavatController::class);
Route::resource('/category',CategoryController::class);
Route::get('/admin/sovga/edit/{id}',[SovgaController::class,'sovga_update'])->name('admin.sovga.update');
Route::post('/users/savat/{id}', [SavatController::class ,'addToCart'])->name('user.savat');

