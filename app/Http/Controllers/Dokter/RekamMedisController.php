<?php

namespace App\Http\Controllers\Dokter;

use App\Models\Pet;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RekamMedisController extends Controller
{
    // tampilkan semua data rekam medis
    public function index()
    {
        $dataRekam = DB::table('rekam_medis')
        ->join('pet', 'rekam_medis.idpet', '=', 'pet.idpet')
        ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
        ->join('user', 'pemilik.iduser', '=', 'user.iduser')
        ->join('temu_dokter', 'pet.idpet', '=', 'temu_dokter.idpet')
        ->select(
            'rekam_medis.idrekam_medis',
            'rekam_medis.created_at',
            'rekam_medis.anamnesa',
            'rekam_medis.temuan_klinis',
            'rekam_medis.diagnosa',
            'rekam_medis.dokter_pemeriksa',
            'pet.nama as nama_pet',
            'temu_dokter.no_urut'
        )
        ->get();
        return view('dokter.rekam_medis', compact('dataRekam'));
    }

    // tampilkan form tambah rekam medis
    public function create(){
        $pets = DB::table('pet')->get();
        // dd($pets);
        return view('dokter.rekam_medis.tambah', compact('pets'));
    }

    // simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'idpet' => 'required|exists:pet,idpet',
            'diagnosa' => 'required|string|max:255',
            'dokter_pemeriksa' => 'required|string|max:100',
        ]);

        RekamMedis::create([
            'idpet' => $request->idpet,
            'diagnosa' => $request->diagnosa,
            'dokter_pemeriksa' => $request->dokter_pemeriksa ?? null, 

        ]);

        return redirect()->route('dokter.rekam_medis.index')
                         ->with('success', 'Data rekam medis berhasil ditambahkan!');
    }

    // tampilkan detail rekam medis
    public function show($id)
    {
        $rekam = RekamMedis::with('pet')->findOrFail($id);
        return view('dokter.rekam_medis', compact('rekam'));
    }
}

