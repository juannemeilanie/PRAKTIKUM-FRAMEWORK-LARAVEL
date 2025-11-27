<?php

namespace App\Http\Controllers\Resepsionis;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardResepsionisController extends Controller
{
    public function index(){
        $totalPemilik = DB::table('pemilik')->count();

        $totalPet = DB::table('pet')->count();

        $totalTemuDokter = DB::table('temu_dokter')->count();

        $pets = DB::table('pet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->join('ras_hewan', 'pet.idras_hewan', '=', 'ras_hewan.idras_hewan')
            ->select(
                'pet.idpet',
                'pet.nama as nama_pet',
                'pet.tanggal_lahir',
                'pet.warna_tanda',
                'pet.jenis_kelamin',
                'user.nama as nama_pemilik',
                'ras_hewan.nama_ras'
            )
            ->limit(5)
            ->get();
            
        $pemilik = DB::table('pemilik')
            ->join('user', 'user.iduser', '=', 'pemilik.iduser')
            ->select('pemilik.*', 'user.nama', 'user.email')
            ->limit(5)
            ->get();

        $temuDokter = DB::table('temu_dokter')
            ->join('pet', 'temu_dokter.idpet', '=', 'pet.idpet')
            ->join('role_user', 'temu_dokter.idrole_user', '=', 'role_user.idrole_user')
            ->join('user', 'role_user.iduser', '=', 'user.iduser')
            ->select(
                'temu_dokter.idreservasi_dokter',
                'temu_dokter.no_urut',
                'temu_dokter.waktu_daftar',
                'temu_dokter.status',  
                'pet.nama as nama_pet', 
                'user.nama as nama_dokter'
            )
            ->where('role_user.idrole', '2')
            ->limit(5)
            ->get();

        return view('resepsionis.dashboard-resepsionis', compact('totalPemilik', 'totalPet', 'totalTemuDokter', 'pets', 'pemilik', 'temuDokter'));
    }
}
