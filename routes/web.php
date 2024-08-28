<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PersetujuanController;
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

// route persetujuan
Route::resource('admin/persetujuan', PersetujuanController::class);
Route::put('admin/persetujuan/status/{id}', [PersetujuanController::class, 'updateStatus'])->name('admin.updateStatus');
Route::get('admin/persetujuan', [PersetujuanController::class, 'showProposals'])->name('admin.persetujuan');
Route::get('/view-proposal/{id}', [PersetujuanController::class, 'show'])->name('view-proposal.index');
Route::get('/admin/persetujuan/view/{id}', [PersetujuanController::class, 'show'])->name('admin.persetujuan.view');




// route dashboard
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');