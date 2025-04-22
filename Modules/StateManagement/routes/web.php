<?php

use Illuminate\Support\Facades\Route;
use Modules\StateManagement\App\Http\Controllers\StateManagementController;

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


Route::get('states', [StateManagementController::class, 'index'])->name('state.index');
Route::post('states', [StateManagementController::class, 'store'])->name('state.store');
Route::get('states/{id}/edit', [StateManagementController::class, 'edit'])->name('edit.state');
Route::post('states/{id}/update', [StateManagementController::class, 'update'])->name('state.update');
Route::get('states/{id}', [StateManagementController::class, 'destroy'])->name('delete.state');
