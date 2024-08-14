<?php

use App\Http\Controllers\CapaianController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManageDraftController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\TimController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Manager;

Route::get('/', [LoginController::class, 'index'])->name('login');

//Dosen Router
Route::resource('dosen/manage_proposal', ProposalController::class);
Route::resource('dosen/manage_tim', TimController::class);
Route::resource('dosen/manage_luaran', CapaianController::class);

Route::get('dosen/manage_draft', [ManageDraftController::class,'index'])->name("managedraft");
Route::get('/dosen',[DosenController::class,'dashboard'])->name('dashboard');