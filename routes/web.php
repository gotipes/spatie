<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['role:superadmin']], function () {
    // Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    Route::get('/manage/admin/read', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.read');
    Route::get('/manage/admin/create', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.create');
    Route::get('/manage/admin/update', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.update');
    Route::get('/manage/admin/delete', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.delete');
});

Route::group(['middleware' => ['role:superadmin|admin|client']], function () {
    // Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    Route::get('/manage/client/read', [App\Http\Controllers\ClientController::class, 'index'])->name('client.read');
    Route::get('/manage/client/create', [App\Http\Controllers\ClientController::class, 'create'])->name('client.create');
    Route::post('/manage/client/store', [App\Http\Controllers\ClientController::class, 'store'])->name('client.store');
    Route::get('/manage/client/edit/{id}', [App\Http\Controllers\ClientController::class, 'edit'])->name('client.edit');
    Route::put('/manage/client/update/{id}', [App\Http\Controllers\ClientController::class, 'update'])->name('client.update');
    Route::get('/manage/client/delete', [App\Http\Controllers\ClientController::class, 'index'])->name('client.delete');
});

Route::group(['middleware' => ['role:client']], function () {
    Route::get('/client', [App\Http\Controllers\ClientController::class, 'index'])->name('client');
});

