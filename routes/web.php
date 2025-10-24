<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PetController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PemilikController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\RasHewanController;
use App\Http\Controllers\Admin\RoleUserController;
use App\Http\Controllers\Admin\JenisHewanController;
use App\Http\Controllers\Admin\KodeTindakanController;
use App\Http\Controllers\Admin\KategoriKlinisController;


Route::get('/', [SiteController::class, 'home'])->name('site.home');

//Site
Route::get('/site/struktur', [SiteController::class, 'struktur'])->name('site.struktur');
Route::get('/site/layanan', [SiteController::class, 'layanan'])->name('site.layanan');
Route::get('/site/visimisi', [SiteController::class, 'visimisi'])->name('site.visimisi');
Route::get('/login', [SiteController::class, 'login'])->name('login');

//Admin
Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user.index');
Route::get('/admin/role', [RoleController::class, 'index'])->name('admin.role.index');
Route::get('/admin/user-role', [RoleUserController::class, 'index'])->name('admin.user-role.index');
Route::get('/admin/jenis-hewan', [JenisHewanController::class, 'index'])->name('admin.jenis-hewan.index');
Route::get('/admin/ras-hewan', [RasHewanController::class, 'index'])->name('admin.ras-hewan.index');
Route::get('/admin/pemilik', [PemilikController::class, 'index'])->name('admin.pemilik.index');
Route::get('/admin/pet', [PetController::class, 'index'])->name('admin.pet.index');
Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('admin.kategori.index');
Route::get('/admin/kategori-klinis', [KategoriKlinisController::class, 'index'])->name('admin.kategori-klinis.index');
Route::get('/admin/kode-tindakan', [KodeTindakanController::class, 'index'])->name('admin.kode-tindakan.index');
