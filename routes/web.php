<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EnquiryManagement\EnquiryManagementController;
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
    return view('index');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {

Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/enquiries',[EnquiryManagementController::class, 'index'])->name('list.enquiry');
Route::get('/enquiry',[EnquiryManagementController::class, 'createEnquiry'])->name('create.enquiry');
Route::post('/enquiry',[EnquiryManagementController::class, 'storeEnquiry'])->name('store.enquiry');
Route::get('/enquiry/{id}/edit',[EnquiryManagementController::class, 'editEnquiry'])->name('edit.enquiry');
Route::post('/enquiry/{id}/update',[EnquiryManagementController::class, 'updateEnquiry'])->name('update.enquiry');
Route::get('/enquiry/{id}/delete',[EnquiryManagementController::class, 'deleteEnquiry'])->name('delete.enquiry');

});

// Route::get('/', [AdminController::class, 'index'])->name('index.dashboard');
require __DIR__.'/auth.php';
