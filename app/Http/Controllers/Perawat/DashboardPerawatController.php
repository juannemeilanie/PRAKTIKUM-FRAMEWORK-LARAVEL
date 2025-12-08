<?php

namespace App\Http\Controllers\Perawat;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardPerawatController extends Controller
{
    public function index(){
    $totalRekam = DB::table('rekam_medis')->count();
    $totalPasien = DB::table('pet')->count();
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

        $pets = DB::table('pet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->join('ras_hewan', 'pet.idras_hewan', '=', 'ras_hewan.idras_hewan')
            ->select(
                'pet.idpet',
                'pet.nama',
                'pet.tanggal_lahir',
                'pet.warna_tanda',
                'pet.jenis_kelamin',
                'user.nama as nama_pemilik',
                'ras_hewan.nama_ras'
            )
            ->get();
        return view('perawat.dashboard-perawat', compact('dataRekam', 'totalRekam', 'pets', 'totalPasien'));
    }
}
