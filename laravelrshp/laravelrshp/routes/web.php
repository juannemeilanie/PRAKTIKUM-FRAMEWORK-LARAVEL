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
use App\Http\Controllers\Perawat\RekamMedisController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\KategoriKlinisController;
use App\Http\Controllers\Dokter\DashboardDokterController;
use App\Http\Controllers\Pemilik\DashboardPemilikController;
use App\Http\Controllers\Perawat\DashboardPerawatController;
use App\Http\Controllers\Resepsionis\DashboardResepsionisController;


Route::get('/', [SiteController::class, 'home'])->name('site.home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Site
Route::get('/site/struktur', [SiteController::class, 'struktur'])->name('site.struktur');
Route::get('/site/layanan', [SiteController::class, 'layanan'])->name('site.layanan');
Route::get('/site/visimisi', [SiteController::class, 'visimisi'])->name('site.visimisi');
Route::get('/login', [SiteController::class, 'login'])->name('login');

//Admin
Route::middleware('isAdministrator')->group(function () {
    Route::get('/admin/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/data_master', [DashboardAdminController::class, 'dataMaster'])->name('data_master');
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
});

//Dokter
Route::middleware('isDokter')->group(function () {
    Route::get('/dokter/dashboard', [DashboardDokterController::class, 'index'])->name('dokter.dashboard');
});

//Perawat
Route::middleware('isPerawat')->group(function () {
    Route::get('/perawat/dashboard', [DashboardPerawatController::class, 'index'])->name('perawat.dashboard');
    Route::prefix('perawat.rekam_medis')->group(function () {
        Route::get('/', [RekamMedisController::class, 'index'])->name('perawat.rekam_medis.index');
        Route::get('/create', [RekamMedisController::class, 'create'])->name('perawat.rekam_medis.create');
        Route::post('/store', [RekamMedisController::class, 'store'])->name('perawat.rekam_medis.store');
        Route::get('/{id}', [RekamMedisController::class, 'show'])->name('perawat.rekam_medis.detail');
});
});

//Resepsionis
Route::middleware('isResepsionis')->group(function () {
    Route::get('/resepsionis/dashboard', [DashboardResepsionisController::class, 'index'])->name('resepsionis.dashboard');
    Route::get('/resepsionis/registrasi', [DashboardResepsionisController::class, 'registrasi'])->name('resepsionis.registrasi');
});

//Pemilik
Route::middleware('isPemilik')->group(function () {
    Route::get('/pemilik/dashboard', [DashboardPemilikController::class, 'index'])->name('pemilik.dashboard');
});


