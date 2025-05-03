<?php

use Illuminate\Support\Facades\Route;
use Modules\MasterSetting\App\Http\Controllers\MasterSettingController;
use Modules\MasterSetting\App\Http\Controllers\CategoryController;
use Modules\MasterSetting\App\Http\Controllers\ContractController;

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

Route::group([], function () {
    Route::resource('mastersetting', MasterSettingController::class)->names('mastersetting');
});

Route::get('/category', [CategoryController::class, 'indexCategory'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'createCategory'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

/////////Contract Controller
Route::get('/contract', [ContractController::class, 'index'])->name('contract.index');
Route::post('/contract/store', [ContractController::class, 'store'])->name('contract.store');
Route::get('/contract/edit/{id}', [ContractController::class, 'edit'])->name('contract.edit');
Route::post('/contract/update/{id}', [ContractController::class, 'update'])->name('contract.update');
Route::get('/contract/destroy/{id}', [ContractController::class, 'destroy'])->name('contract.destroy');
