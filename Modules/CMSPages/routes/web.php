<?php

use Illuminate\Support\Facades\Route;
use Modules\CMSPages\App\Http\Controllers\CMSPagesController;

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

Route::prefix('pages')->group(function() {
    Route::get('/', [CMSPagesController::class, 'index'])->name('page.index');
    Route::post('/', [CMSPagesController::class, 'store'])->name('page.store');
    Route::get('/edit/{id}', [CMSPagesController::class, 'edit'])->name('page.edit');
    Route::post('/update/{id}', [CMSPagesController::class, 'update'])->name('page.update');
    Route::get('/delete/{id}', [CMSPagesController::class, 'destroy'])->name('page.destroy');

});
