<?php

use App\Http\Controllers\CapaianController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\TimController;
use Illuminate\Http\Request;
use App\Http\Controllers\PengumumanController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'index'])->name('login');




Route::get('/', [PengumumanController::class, 'index'])->name('welcome');
Route::get('/pengumuman/{id}', [PengumumanController::class, 'show'])->name('pengumuman.show');
Route::get('admin/pengumuman/create', [PengumumanController::class, 'create'])->name('pengumuman.create');
Route::post('admin/pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
Route::get('admin/pengumuman/{id}/edit', [PengumumanController::class, 'edit'])->name('pengumuman.edit');
Route::put('admin/pengumuman/{id}', [PengumumanController::class, 'update'])->name('pengumuman.update');
Route::delete('admin/pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');

//Dosen Router
Route::resource('dosen/manage_proposal', ProposalController::class);
Route::resource('dosen/manage_tim', TimController::class);
Route::resource('dosen/manage_luaran', CapaianController::class);