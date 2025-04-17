<?php

use Illuminate\Support\Facades\Route;
use Modules\RoleManagement\App\Http\Controllers\RoleManagementController;
use Modules\RoleManagement\App\Http\Controllers\PermissionManagementController;
use Modules\RoleManagement\App\Http\Controllers\UserManagementController;

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

Route::group(['middleware' => ['isAdmin']], function() {

    // Permissions Routes
    Route::prefix('permissions')->group(function() {
        Route::get('/', [PermissionManagementController::class, 'index'])->name('permission.list')->middleware('permission:view permission');
        Route::get('/create', [PermissionManagementController::class, 'create'])->name('permission.create')->middleware('permission:create permission');
        Route::get('/{id}/edit', [PermissionManagementController::class, 'edit'])->name('permission.edit')->middleware('permission:edit permission');
        Route::patch('/{id}', [PermissionManagementController::class, 'update'])->name('permission.update')->middleware('permission:update permission');
        Route::get('/{id}/delete', [PermissionManagementController::class, 'destroy'])->name('permission.delete')->middleware('permission:delete permission');
    });

     // Roles Routes
     Route::prefix('roles')->group(function() {
        Route::get('/', [RoleManagementController::class, 'index'])->name('role.list')->middleware('permission:view role');
        Route::get('/create', [RoleManagementController::class, 'create'])->name('role.create')->middleware('permission:view role');
        Route::post('/', [RoleManagementController::class, 'store'])->name('role.store');
        Route::get('/{id}/edit', [RoleManagementController::class, 'edit'])->name('role.edit')->middleware('permission:edit role');
        Route::patch('/{id}', [RoleManagementController::class, 'update'])->name('role.update')->middleware('permission:update role');
        Route::get('/{id}/delete', [RoleManagementController::class, 'destroy'])->name('role.delete')->middleware('permission:delete role');
        Route::get('/{id}/permissions', [RoleManagementController::class, 'permissionToRole'])->name('role.permissions');
        Route::patch('/{id}/permissions', [RoleManagementController::class, 'updatePermissionToRole'])->name('role.updatePermissions');
    });
     // Users Routes
     Route::prefix('users')->group(function() {
        Route::get('/', [UserManagementController::class, 'index'])->name('users.list')->middleware('permission:view user');
        Route::get('/create', [UserManagementController::class, 'create'])->name('user.create')->middleware('permission:create user');
        Route::post('/users', [UserManagementController::class, 'store'])->name('user.store');
        Route::get('/{id}/edit', [UserManagementController::class, 'edit'])->name('user.edit')->middleware('permission:edit user');
        Route::patch('/{id}', [UserManagementController::class, 'update'])->name('user.update')->middleware('permission:update user');
        Route::get('/{id}/delete', [UserManagementController::class, 'destroy'])->name('user.delete')->middleware('permission:delete user');

    });


});

