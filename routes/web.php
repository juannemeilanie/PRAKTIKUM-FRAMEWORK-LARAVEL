<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PetController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\Admin\PemilikController;
use App\Http\Controllers\Admin\PerawatController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\RasHewanController;
use App\Http\Controllers\Admin\RoleUserController;
use App\Http\Controllers\Admin\JenisHewanController;
use App\Http\Controllers\Dokter\DokterPetController;
use App\Http\Controllers\Admin\KodeTindakanController;
use App\Http\Controllers\Pemilik\PemilikPetController;
use App\Http\Controllers\Perawat\PerawatPetController;
use App\Http\Controllers\Perawat\RekamMedisController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\KategoriKlinisController;
use App\Http\Controllers\Dokter\DashboardDokterController;
use App\Http\Controllers\Resepsionis\TemuDokterController;
use App\Http\Controllers\Dokter\DokterRekamMedisController;
use App\Http\Controllers\Pemilik\DashboardPemilikController;
use App\Http\Controllers\Perawat\DashboardPerawatController;
use App\Http\Controllers\Pemilik\PemilikRekamMedisController;
use App\Http\Controllers\Pemilik\PemilikTemuDokterController;
use App\Http\Controllers\Resepsionis\ResepsionisPetController;
use App\Http\Controllers\Resepsionis\ResepsionisPemilikController;
use App\Http\Controllers\Resepsionis\DashboardResepsionisController;


Route::get('/', [SiteController::class, 'home'])->name('site.home');


Route::get('/home', [HomeController::class, 'index'])->name('home');
//Site
Route::get('/site/struktur', [SiteController::class, 'struktur'])->name('site.struktur');
Route::get('/site/layanan', [SiteController::class, 'layanan'])->name('site.layanan');
Route::get('/site/visimisi', [SiteController::class, 'visimisi'])->name('site.visimisi');

Auth::routes();
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
    Route::get('/user-role/edit/{id}', [RoleUserController::class, 'edit'])->name('user-role.edit');
    Route::put('/user-role/update/{id}', [RoleUserController::class, 'update'])->name('user-role.update');
    Route::delete('/user-role/destroy/{id}', [RoleUserController::class, 'destroy'])->name('user-role.destroy');

    //Jenis Hewan
    Route::get('/jenis-hewan', [JenisHewanController::class, 'index'])->name('jenis-hewan.index');
    Route::get('/jenis-hewan/create', [JenisHewanController::class, 'create'])->name('jenis-hewan.create');
    Route::post('/jenis-hewan/store', [JenisHewanController::class, 'store'])->name('jenis-hewan.store');
    Route::get('/jenis-hewan/edit/{id}', [JenisHewanController::class, 'edit'])->name('jenis-hewan.edit');
    Route::put('/jenis-hewan/update/{id}', [JenisHewanController::class, 'update'])->name('jenis-hewan.update');
    Route::delete('/jenis-hewan/destroy/{id}', [JenisHewanController::class, 'destroy'])->name('jenis-hewan.destroy');

    //Ras Hewan
    Route::get('/ras-hewan', [RasHewanController::class, 'index'])->name('ras-hewan.index');
    Route::get('/ras-hewan/create', [RasHewanController::class, 'create'])->name('ras-hewan.create');
    Route::post('/ras-hewan/store', [RasHewanController::class, 'store'])->name('ras-hewan.store');
    Route::get('/ras-hewan/edit/{id}', [RasHewanController::class, 'edit'])->name('ras-hewan.edit');
    Route::put('/ras-hewan/update/{id}', [RasHewanController::class, 'update'])->name('ras-hewan.update');
    Route::delete('/ras-hewan/destroy/{id}', [RasHewanController::class, 'destroy'])->name('ras-hewan.destroy');

    //Pemilik
    Route::get('/pemilik', [PemilikController::class, 'index'])->name('pemilik.index');
    Route::get('/pemilik/create', [PemilikController::class, 'create'])->name('pemilik.create');
    Route::post('/pemilik/store', [PemilikController::class, 'store'])->name('pemilik.store');
    Route::get('/pemilik/edit/{id}', [PemilikController::class, 'edit'])->name('pemilik.edit');
    Route::put('/pemilik/update/{id}', [PemilikController::class, 'update'])->name('pemilik.update');
    Route::delete('/pemilik/destroy/{id}', [PemilikController::class, 'destroy'])->name('pemilik.destroy');

    //Pet
    Route::get('/pet', [PetController::class, 'index'])->name('pet.index');
    Route::get('/pet/create', [PetController::class, 'create'])->name('pet.create');
    Route::post('/pet/store', [PetController::class, 'store'])->name('pet.store');
    Route::get('/pet/edit/{id}', [PetController::class, 'edit'])->name('pet.edit');
    Route::put('/pet/update/{id}', [PetController::class, 'update'])->name('pet.update');
    Route::delete('/pet/destroy/{id}', [PetController::class, 'destroy'])->name('pet.destroy');  
   

    //Kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');  

    //Kategori Klinis
    Route::get('/kategori-klinis', [KategoriKlinisController::class, 'index'])->name('kategori-klinis.index');
    Route::get('/kategori-klinis/create', [KategoriKlinisController::class, 'create'])->name('kategori-klinis.create');
    Route::post('/kategori-klinis/store', [KategoriKlinisController::class, 'store'])->name('kategori-klinis.store');
    Route::get('/kategori-klinis/edit/{id}', [KategoriKlinisController::class, 'edit'])->name('kategori-klinis.edit');
    Route::put('/kategori-klinis/update/{id}', [KategoriKlinisController::class, 'update'])->name('kategori-klinis.update');
    Route::delete('/kategori-klinis/destroy/{id}', [KategoriKlinisController::class, 'destroy'])->name('kategori-klinis.destroy');

    //Kode Tindakan
    Route::get('/kode-tindakan', [KodeTindakanController::class, 'index'])->name('kode-tindakan.index');
    Route::get('/kode-tindakan/create', [KodeTindakanController::class, 'create'])->name('kode-tindakan.create');
    Route::post('/kode-tindakan/store', [KodeTindakanController::class, 'store'])->name('kode-tindakan.store');
    Route::get('/kode-tindakan/edit/{id}', [KodeTindakanController::class, 'edit'])->name('kode-tindakan.edit');
    Route::put('/kode-tindakan/update/{id}', [KodeTindakanController::class, 'update'])->name('kode-tindakan.update');
    Route::delete('/kode-tindakan/destroy/{id}', [KodeTindakanController::class, 'destroy'])->name('kode-tindakan.destroy');

    //Data Dokter
    Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.index');
    Route::get('/dokter/create', [DokterController::class, 'create'])->name('dokter.create');
    Route::post('/dokter/store', [DokterController::class, 'store'])->name('dokter.store');
    Route::get('/dokter/edit/{id}', [DokterController::class, 'edit'])->name('dokter.edit');
    Route::put('/dokter/update/{id}', [DokterController::class, 'update'])->name('dokter.update');
    Route::delete('/dokter/destroy/{id}', [DokterController::class, 'destroy'])->name('dokter.destroy');

    //Data Perawat
    Route::get('/perawat', [PerawatController::class, 'index'])->name('perawat.index');
    Route::get('/perawat/create', [PerawatController::class, 'create'])->name('perawat.create');
    Route::post('/perawat/store', [PerawatController::class, 'store'])->name('perawat.store');
    Route::get('/perawat/edit/{id}', [PerawatController::class, 'edit'])->name('perawat.edit');
    Route::put('/perawat/update/{id}', [PerawatController::class, 'update'])->name('perawat.update');
    Route::delete('/perawat/destroy/{id}', [PerawatController::class, 'destroy'])->name('perawat.destroy');

});

//Dokter
Route::middleware('isDokter')->group(function () {
    Route::get('/dokter/dashboard', [DashboardDokterController::class, 'index'])->name('dokter.dashboard');

    Route::prefix('dokter.rekam_medis')->group(function () {
        Route::get('/', [DokterRekamMedisController::class, 'index'])->name('dokter.rekam_medis.index');
        Route::get('/show/{id}', [DokterRekamMedisController::class, 'show'])->name('dokter.rekam_medis.show');
        Route::get('/show/{id}/tambah', [DokterRekamMedisController::class, 'createDetail'])->name('dokter.rekam_medis.create');
        Route::post('/show/{id}/tambah/store', [DokterRekamMedisController::class, 'storeDetail'])->name('dokter.rekam_medis.store');
        Route::get('/show/{iddetail}/edit', [DokterRekamMedisController::class, 'editDetail'])->name('dokter.rekam_medis.edit');
        Route::put('/show/{iddetail}/update', [DokterRekamMedisController::class, 'updateDetail'])->name('dokter.rekam_medis.update');
        Route::delete('/show/{iddetail}/destroy', [DokterRekamMedisController::class, 'destroyDetail'])->name('dokter.rekam_medis.destroy');
    });

    Route::prefix('dokter.data-pasien')->group(function () {
        Route::get('/', [DokterPetController::class, 'index'])->name('dokter.data-pasien.index');
    });
});

//Perawat
Route::middleware('isPerawat')->group(function () {
    Route::get('/perawat/dashboard', [DashboardPerawatController::class, 'index'])->name('perawat.dashboard');

    Route::prefix('perawat.rekam_medis')->group(function () {
        Route::get('/', [RekamMedisController::class, 'index'])->name('perawat.rekam_medis.index');
        Route::get('/create', [RekamMedisController::class, 'create'])->name('perawat.rekam_medis.create');
        Route::post('/store', [RekamMedisController::class, 'store'])->name('perawat.rekam_medis.store');
        Route::get('/show/{id}', [RekamMedisController::class, 'show'])->name('perawat.rekam_medis.show');
        Route::get('/edit/{id}', [RekamMedisController::class, 'edit'])->name('perawat.rekam_medis.edit');
        Route::put('/update/{id}', [RekamMedisController::class, 'update'])->name('perawat.rekam_medis.update');
        Route::delete('/destroy/{id}', [RekamMedisController::class, 'destroy'])->name('perawat.rekam_medis.destroy');
    });

    Route::prefix('perawat.data-pasien')->group(function () {
        Route::get('/', [PerawatPetController::class, 'index'])->name('perawat.data-pasien.index');
    });
});

//Resepsionis
Route::middleware('isResepsionis')->prefix('resepsionis')->name('resepsionis.')->group(function () {
    Route::get('/dashboard', [DashboardResepsionisController::class, 'index'])->name('dashboard');

    Route::get('/pemilik/index',[ResepsionisPemilikController::class, 'index'])->name('pemilik.index');
    Route::get('/registrasipemilik', [ResepsionisPemilikController::class, 'create'])->name('pemilik.create');
    Route::post('/registrasipemilik', [ResepsionisPemilikController::class, 'store'])->name('pemilik.store'); 
    Route::get('/pemilik/edit/{id}', [ResepsionisPemilikController::class, 'edit'])->name('pemilik.edit');
    Route::put('/pemilik/update/{id}', [ResepsionisPemilikController::class, 'update'])->name('pemilik.update');
    Route::delete('/pemilik/destroy/{id}', [ResepsionisPemilikController::class, 'destroy'])->name('pemilik.destroy');


    Route::get('/pet/index',[ResepsionisPetController::class, 'index'])->name('pet.index'); 
    Route::get('/registrasipet', [ResepsionisPetController::class, 'create'])->name('pet.create');
    Route::post('/registrasipet', [ResepsionisPetController::class, 'store'])->name('pet.store');
    Route::get('/edit/{id}', [ResepsionisPetController::class, 'edit'])->name('pet.edit');
    Route::put('/update/{id}', [ResepsionisPetController::class, 'update'])->name('pet.update');
    Route::delete('/destroy/{id}', [ResepsionisPetController::class, 'destroy'])->name('pet.destroy');

    Route::get('/temu-dokter', [TemuDokterController::class, 'index'])->name('temu-dokter.index');
    Route::get('/temu-dokter/create', [TemuDokterController::class, 'create'])->name('temu-dokter.create');
    Route::post('/temu-dokter/store', [TemuDokterController::class, 'store'])->name('temu-dokter.store');
    Route::get('/temu-dokter/edit/{id}', [TemuDokterController::class, 'edit'])->name('temu-dokter.edit');
    Route::put('/temu-dokter/update/{id}', [TemuDokterController::class, 'update'])->name('temu-dokter.update');    
    Route::delete('/temu-dokter/destroy/{id}', [TemuDokterController::class, 'destroy'])->name('temu-dokter.destroy');
});

//Pemilik
Route::middleware('isPemilik')->group(function () {
    Route::get('/pemilik/dashboard', [DashboardPemilikController::class, 'index'])->name('pemilik.dashboard');
    Route::get('/pemilik/data-pet', [PemilikPetController::class, 'index'])->name('pemilik.data-pet.index');
    Route::get('/pemilik/rekam-medis', [PemilikRekamMedisController::class, 'index'])->name('pemilik.rekam-medis.index');
    Route::get('/pemilik/temu-dokter', [PemilikTemuDokterController::class, 'index'])->name('pemilik.temu-dokter.index');
});


