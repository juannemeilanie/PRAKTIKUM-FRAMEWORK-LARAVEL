<?php

namespace App\Http\Controllers\Pemilik;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PemilikRekamMedisController extends Controller
{
    public function index(){
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
        return view('pemilik.rekam-medis', compact('dataRekam'));
    }
}
