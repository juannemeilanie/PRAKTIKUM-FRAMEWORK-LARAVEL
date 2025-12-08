<?php

namespace App\Http\Controllers\Pemilik;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardPemilikController extends Controller
{
    public function index(){
        $totalPet = DB::table('pet')->count();
        $totaltemuDokter = DB::table('temu_dokter')->count();
        $totalRekam = DB::table('rekam_medis')->count();
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
            ->get();

        $dataRekam = DB::table('rekam_medis')
            ->join('pet', 'rekam_medis.idpet', '=', 'pet.idpet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('user as pemilik_user', 'pemilik.iduser', '=', 'pemilik_user.iduser')
            ->join('role_user', 'rekam_medis.dokter_pemeriksa', '=', 'role_user.idrole_user')
            ->join('user as dokter', 'role_user.iduser', '=', 'dokter.iduser')
            ->select(
                'rekam_medis.idrekam_medis',
                'rekam_medis.created_at',
                'rekam_medis.diagnosa',
                'pet.nama as nama_pet',
                'pemilik_user.nama as nama_pemilik',
                'dokter.nama as nama_dokter'
            )
            ->orderBy('rekam_medis.created_at', 'DESC')
            ->get();
        return view('pemilik.dashboard-pemilik', compact('totalPet', 'pets', 'totaltemuDokter', 'temuDokter','totalRekam', 'dataRekam'));
    }
}
