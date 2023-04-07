<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenyuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SavatController;
use App\Http\Controllers\SovgaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'role:admin'])->name('dashboard');

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/users',MenyuController::class);
Route::resource('/admins',AdminController::class);

//Sovg`a bo`limiga o`tadi
Route::resource('/sovga',SovgaController::class)->name('index','sovga');
Route::resource('/savat',SavatController::class);
Route::resource('/category',CategoryController::class);
Route::get('/admin/sovga/edit/{id}',[SovgaController::class,'sovga_update'])->name('admin.sovga.update');
Route::post('/users/savat/', [SavatController::class ,'savat'])->name('user.savat');
Route::middleware(['auth','verified'])->group(function () {
Route::post('/savat/{sovga}',[SavatController::class,'trash'])->name('trash');
});

require __DIR__.'/auth.php';
