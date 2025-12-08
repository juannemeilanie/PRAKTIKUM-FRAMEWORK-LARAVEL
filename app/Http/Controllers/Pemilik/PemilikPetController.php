<?php

namespace App\Http\Controllers\Pemilik;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PemilikPetController extends Controller
{
    public function index(){
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
        return view('pemilik.data-pet', compact('pets'));
    }
}
