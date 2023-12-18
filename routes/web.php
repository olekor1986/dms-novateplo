<?php

use Illuminate\Support\Facades\Route;

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

/**  Admin Routes */
Route::group(['prefix' => 'admin'], function () {

    /**  Admin Main */
    Route::get('/', [\App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin.main');

    /**  Admin Roles */
    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\RoleController::class, 'index'])->name('admin.role.index');
        Route::get('/create', [\App\Http\Controllers\Admin\RoleController::class, 'create'])->name('admin.role.create');
        Route::get('/{role}', [\App\Http\Controllers\Admin\RoleController::class, 'show'])->name('admin.role.show');
        Route::post('/', [\App\Http\Controllers\Admin\RoleController::class, 'store'])->name('admin.role.store');
        Route::get('/{role}/edit', [\App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('admin.role.edit');
        Route::patch('/{role}', [\App\Http\Controllers\Admin\RoleController::class, 'update'])->name('admin.role.update');
        Route::delete('/{role}', [\App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('admin.role.delete');
    });

});
