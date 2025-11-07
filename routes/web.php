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
Route::middleware('isAdministrator')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');
    Route::get('/data_master', [DashboardAdminController::class, 'dataMaster'])->name('data_master');

    //user
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    // role user
    Route::get('/user-role', [RoleUserController::class, 'index'])->name('user-role.index');
    Route::get('/user-role/create', [RoleUserController::class, 'create'])->name('user-role.create');
    Route::post('/user-role/store', [RoleUserController::class, 'store'])->name('user-role.store');

    //Jenis Hewan
    Route::get('/jenis-hewan', [JenisHewanController::class, 'index'])->name('jenis-hewan.index');
    Route::get('/jenis-hewan/create', [JenisHewanController::class, 'create'])->name('jenis-hewan.create');
    Route::post('/jenis-hewan/store', [JenisHewanController::class, 'store'])->name('jenis-hewan.store');

    //Ras Hewan
    Route::get('/ras-hewan', [RasHewanController::class, 'index'])->name('ras-hewan.index');
    Route::get('/ras-hewan/create', [RasHewanController::class, 'create'])->name('ras-hewan.create');
    Route::post('/ras-hewan/store', [RasHewanController::class, 'store'])->name('ras-hewan.store');

    //Pemilik
    Route::get('/pemilik', [PemilikController::class, 'index'])->name('pemilik.index');
    Route::get('/pemilik/create', [PemilikController::class, 'create'])->name('pemilik.create');
    Route::post('/pemilik/store', [PemilikController::class, 'store'])->name('pemilik.store');

    //Pet
    Route::get('/pet', [PetController::class, 'index'])->name('pet.index');
    Route::get('/pet/create', [PetController::class, 'create'])->name('pet.create');
    Route::post('/pet/store', [PetController::class, 'store'])->name('pet.store');  
   

    //Kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');  

    //Kategori Klinis
    Route::get('/kategori-klinis', [KategoriKlinisController::class, 'index'])->name('kategori-klinis.index');
    Route::get('/kategori-klinis/create', [KategoriKlinisController::class, 'create'])->name('kategori-klinis.create');
    Route::post('/kategori-klinis/store', [KategoriKlinisController::class, 'store'])->name('kategori-klinis.store');

    //Kode Tindakan
    Route::get('/kode-tindakan', [KodeTindakanController::class, 'index'])->name('kode-tindakan.index');
    Route::get('/kode-tindakan/create', [KodeTindakanController::class, 'create'])->name('kode-tindakan.create');
    Route::post('/kode-tindakan/store', [KodeTindakanController::class, 'store'])->name('kode-tindakan.store');
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
Route::middleware('isResepsionis')->prefix('resepsionis')->name('resepsionis.')->group(function () {
    Route::get('/dashboard', [DashboardResepsionisController::class, 'index'])->name('dashboard');
    Route::get('/registrasipemilik', [PemilikController::class, 'create'])->name('registrasi_pemilik');
    Route::post('/registrasipemilik', [PemilikController::class, 'store'])->name('registrasi_pemilik');  
    Route::get('/registrasipet', [PetController::class, 'create'])->name('registrasi_pet');
    Route::post('/registrasipet', [PetController::class, 'store'])->name('registrasi_pet');
});

//Pemilik
Route::middleware('isPemilik')->group(function () {
    Route::get('/pemilik/dashboard', [DashboardPemilikController::class, 'index'])->name('pemilik.dashboard');
});


