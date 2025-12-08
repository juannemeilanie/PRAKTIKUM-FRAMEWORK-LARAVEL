<?php

namespace App\Http\Controllers\Pemilik;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PemilikTemuDokterController extends Controller
{
    public function index(){
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

        return view('pemilik.temu-dokter', compact('temuDokter'));
    }
}
