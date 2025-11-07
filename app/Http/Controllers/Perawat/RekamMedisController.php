<?php

namespace App\Http\Controllers\Perawat;

use App\Models\Pet;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RekamMedisController extends Controller
{
    // tampilkan semua data rekam medis
    public function index()
    {
        $dataRekam = RekamMedis::with('pet')->get();
        return view('perawat.rekam_medis', compact('dataRekam'));
    }

    // tampilkan form tambah rekam medis
    public function create(){
        $pets = Pet::all();
        // dd($pets);
        return view('perawat.rekam_medis_tambah', compact('pets'));
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

        return redirect()->route('perawat.rekam_medis.index')
                         ->with('success', 'Data rekam medis berhasil ditambahkan!');
    }

    // tampilkan detail rekam medis
    public function show($id)
    {
        $rekam = RekamMedis::with('pet')->findOrFail($id);
        return view('perawat.rekam_medis_detail', compact('rekam'));
    }
}

