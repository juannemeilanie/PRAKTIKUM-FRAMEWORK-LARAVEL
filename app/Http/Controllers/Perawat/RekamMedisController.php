<?php

namespace App\Http\Controllers\Perawat;

use App\Models\Pet;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RekamMedisController extends Controller
{
    // tampilkan semua data rekam medis
    public function index(){
        $dataRekam = DB::table('rekam_medis')
            ->join('pet', 'rekam_medis.idpet', '=', 'pet.idpet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('user as pemilik_user', 'pemilik.iduser', '=', 'pemilik_user.iduser')
            ->join('role_user', 'rekam_medis.dokter_pemeriksa', '=', 'role_user.idrole_user')
            ->join('user as dokter', 'role_user.iduser', '=', 'dokter.iduser')
            ->select('rekam_medis.*', 'pet.nama as nama_pet', 'pemilik_user.nama as nama_pemilik', 'dokter.nama as nama_dokter')
            ->orderBy('rekam_medis.idrekam_medis', 'asc')
            ->get();

        return view('perawat.rekam_medis.rekam_medis', compact('dataRekam'));
    }

    // tampilkan form tambah rekam medis
    public function create(){
        $pets = DB::table('temu_dokter')
            ->join('pet', 'temu_dokter.idpet', '=', 'pet.idpet')
            ->select(
                'pet.idpet',
                'pet.nama',
                'temu_dokter.idreservasi_dokter',
                'temu_dokter.no_urut'
            )
            ->where('temu_dokter.status', 1) // misal status aktif
            ->orderBy('temu_dokter.no_urut')
            ->get();
        $dokter = DB::table('role_user')
            ->join('user', 'role_user.iduser', '=', 'user.iduser')
            ->where('role_user.idrole', 2) // role dokter
            ->select('role_user.idrole_user', 'user.nama')
            ->get();
        return view('perawat.rekam_medis.rekam_medis_tambah', compact('pets', 'dokter'));
    }

    // simpan data baru
    public function store(Request $request){
        $validated = $this->validateRekamMedis($request);

        $this->createRekamMedis($validated);

        return redirect()->route('perawat.rekam_medis.index')
            ->with('success', 'Data rekam medis berhasil ditambahkan!');
    }

    protected function validateRekamMedis(Request $request){
        return $request->validate([
            'idpet' => 'required|exists:pet,idpet',
            'idreservasi_dokter' => 'required|exists:temu_dokter,idreservasi_dokter',
            'anamnesa' => 'required|string',
            'temuan_klinis' => 'required|string',
            'diagnosa' => 'required|string|max:255',
            'dokter_pemeriksa' => 'required|exists:role_user,idrole_user',
        ]);
    }

    protected function createRekamMedis($data){
        return DB::table('rekam_medis')->insert([
            'idpet'            => $data['idpet'],
            'idreservasi_dokter' => $data['idreservasi_dokter'],
            'anamnesa'        => $data['anamnesa'],
            'temuan_klinis'    => $data['temuan_klinis'],
            'diagnosa'         => $data['diagnosa'],
            'dokter_pemeriksa' => $data['dokter_pemeriksa'],
            'created_at'       => now(),
        ]);
    }
    // tampilkan detail rekam medis
    public function show($id){
        $rekam = DB::table('rekam_medis')
            ->join('pet', 'rekam_medis.idpet', '=', 'pet.idpet')
            ->join('role_user', 'rekam_medis.dokter_pemeriksa', '=', 'role_user.idrole_user')
            ->join('user as dokter', 'role_user.iduser', '=', 'dokter.iduser')
            ->select(
                'rekam_medis.*',
                'pet.nama as nama_pet',
                'dokter.nama as nama_dokter'
            )
            ->where('rekam_medis.idrekam_medis', $id)
            ->first();

        $tindakan = DB::table('detail_rekam_medis')
            ->join('kode_tindakan_terapi', 'detail_rekam_medis.idkode_tindakan_terapi', '=', 'kode_tindakan_terapi.idkode_tindakan_terapi')
            ->where('detail_rekam_medis.idrekam_medis', $id)
            ->select(
                'detail_rekam_medis.iddetail_rekam_medis',
                'detail_rekam_medis.detail',
                'kode_tindakan_terapi.kode',
                'kode_tindakan_terapi.deskripsi_tindakan_terapi'
            )
            ->get();

        return view('perawat.rekam_medis.detail', compact('rekam', 'tindakan'));

    }

    public function edit($id){
        $rekam = DB::table('rekam_medis')
            ->join('pet', 'rekam_medis.idpet', '=', 'pet.idpet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('user as pemilik_user', 'pemilik.iduser', '=', 'pemilik_user.iduser')
            ->select(
                'rekam_medis.*',
                'pet.nama as nama_pet',
                'pemilik_user.nama as nama_pemilik'

            )
            ->where('rekam_medis.idrekam_medis', $id)
            ->first();

        $pets = DB::table('pet')->get();
        $dokters = DB::table('role_user')
            ->join('user', 'role_user.iduser', '=', 'user.iduser')
            ->where('role_user.idrole', 2) // role dokter
            ->select('role_user.idrole_user', 'user.nama')
            ->get();

        return view('perawat.rekam_medis.edit', compact('rekam', 'pets', 'dokters'));
    }

    public function update(Request $request, $id){
        $validated = $this->validateRekamMedis($request);

        DB::table('rekam_medis')
            ->where('idrekam_medis', $id)
            ->update([
                'idpet' => $validated['idpet'],
                'anamnesa' => $validated['anamnesa'],
                'temuan_klinis' => $validated['temuan_klinis'],
                'diagnosa' => $validated['diagnosa'],
                'dokter_pemeriksa' => $validated['dokter_pemeriksa'],
            ]);

        return redirect()->route('perawat.rekam_medis.index')
            ->with('success', 'Data rekam medis berhasil diperbarui!');
    }

    public function destroy($id)
    {
        DB::table('detail_rekam_medis')
            ->where('idrekam_medis', $id)
            ->delete();
        DB::table('rekam_medis')
            ->where('idrekam_medis', $id)
            ->delete();

        return redirect()->route('perawat.rekam_medis.index')
            ->with('success', 'Data rekam medis berhasil dihapus!');
    }
}

