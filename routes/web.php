<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\EnquiryManagement\EnquiryManagementController;
use App\Http\Controllers\Admin\EnquiryManagement\QuotationManagementController;
use App\Http\Controllers\Admin\PropertyManagement\PropertyManagementController;

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

////////Home Controller
Route::get('/', [HomeController::class,'index'])->name('home.index');
Route::get('/password-reset', [HomeController::class,'forgotPassword'])->name('home.forgot.password');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {

    /////Admin Controller
Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/user/profile', [AdminController::class, 'userProfile'])->name('user.profile');

///////Enquiry Management Controller
Route::get('/enquiries',[EnquiryManagementController::class, 'index'])->name('list.enquiry');
Route::get('/enquiry',[EnquiryManagementController::class, 'createEnquiry'])->name('create.enquiry');
Route::post('/enquiry',[EnquiryManagementController::class, 'storeEnquiry'])->name('store.enquiry');
Route::get('/enquiry/{id}/edit',[EnquiryManagementController::class, 'editEnquiry'])->name('edit.enquiry');
Route::post('/enquiry/{id}/update',[EnquiryManagementController::class, 'updateEnquiry'])->name('update.enquiry');
Route::get('/enquiry/{id}/delete',[EnquiryManagementController::class, 'deleteEnquiry'])->name('delete.enquiry');
Route::get('/enquiry/show/{id}',[EnquiryManagementController::class, 'showEnquiry'])->name('show.enquiry');
Route::post('/enquiry/preview', [EnquiryManagementController::class, 'preview'])->name('enquiry.preview');


//////Quotation Management Controller
Route::get('/quotation',[QuotationManagementController::class, 'index'])->name('list.quotation');
Route::get('/create/quotation',[QuotationManagementController::class, 'create'])->name('create.quotation');
Route::post('/store/quotation',[QuotationManagementController::class, 'store'])->name('store.quotation');
Route::get('/quotation/{id}/edit',[QuotationManagementController::class, 'edit'])->name('edit.quotation');
Route::post('/quotation/{id}/update',[QuotationManagementController::class, 'update'])->name('update.quotation');
Route::get('/quotation/{id}/delete',[QuotationManagementController::class, 'destroy'])->name('delete.quotation');
Route::get('/quotation/show/{id}',[QuotationManagementController::class, 'show'])->name('show.quotation');
Route::post('/quotation/preview', [QuotationManagementController::class, 'preview'])->name('quotation.preview');

/////Property Management Controller
Route::get('/property',[PropertyManagementController::class, 'listProperty'])->name('list.property');
Route::get('/create/property', [PropertyManagementController::class,'createProperty'])->name('create.property');
Route::post('/store/property', [PropertyManagementController::class,'storeProperty'])->name('store.property');
Route::get('/edit/{id}/property', [PropertyManagementController::class,'editProperty'])->name('edit.property');
Route::post('/update/{id}/property', [PropertyManagementController::class,'updateProperty'])->name('update.property');
Route::get('/delete/{id}/property', [PropertyManagementController::class,'destroyProperty'])->name('delete.property');
Route::post('/property/preview', [PropertyManagementController::class, 'preview'])->name('property.preview');


});
Route::get('/generate-pdf/{id}', [QuotationManagementController::class, 'generatePDF'])->name('generate.pdf');
Route::get('/enquiry-pdf/{id}', [EnquiryManagementController::class, 'generatePDF'])->name('enquiry.pdf');
Route::get('/get-stamp-duty/{state}', [QuotationManagementController::class, 'getStampDuty']);
// Route::get('/index', [AdminController::class, 'admin'])->name('admin.index');

// Route::get('/', [AdminController::class, 'index'])->name('index.dashboard');
require __DIR__.'/auth.php';
