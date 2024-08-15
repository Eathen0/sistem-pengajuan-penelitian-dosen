<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengumumanController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'index'])->name('login');



Route::get('/', [PengumumanController::class, 'index'])->name('welcome');
Route::get('admin/pengumuman', [PengumumanController::class,'admin'])->name('pengumuman.admin');
Route::get('/pengumuman/{id}', [PengumumanController::class, 'show'])->name('pengumuman.show');
Route::get('/admin/viewpengumuman/', [PengumumanController::class, 'admin'])->name('pengumuman');
Route::get('admin/pengumuman/create', [PengumumanController::class, 'create'])->name('pengumuman.create');
Route::post('admin/pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
Route::get('admin/pengumuman/{id}/edit', [PengumumanController::class, 'edit'])->name('pengumuman.edit');
Route::put('admin/pengumuman/{id}', [PengumumanController::class, 'update'])->name('pengumuman.update');
Route::delete('admin/pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');

// route dashboard
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');