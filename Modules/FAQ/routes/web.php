<?php

use Illuminate\Support\Facades\Route;
use Modules\FAQ\App\Http\Controllers\FAQController;

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


Route::prefix('faq')->group(function() {
    Route::get('/', [FAQController::class, 'index'])->name('faq.index');
    Route::post('/', [FAQController::class, 'store'])->name('faq.store');
    Route::get('/edit/{id}', [FAQController::class, 'edit'])->name('faq.edit');
    Route::post('/update/{id}', [FAQController::class, 'update'])->name('faq.update');
    Route::get('/delete/{id}', [FAQController::class, 'destroy'])->name('faq.destroy');
});
