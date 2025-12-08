<?php

namespace App\Http\Controllers\Dokter;

use App\Models\Pet;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DokterRekamMedisController extends Controller
{
    // tampilkan semua data rekam medis
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
    return view('dokter.rekam_medis.rekam_medis', compact('dataRekam'));
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

        return view('dokter.rekam_medis.detail', compact('rekam', 'tindakan'));
    }

    public function createDetail($id){
        $rekam = DB::table('rekam_medis')
            ->where('idrekam_medis', $id)
            ->first();

        $kode = DB::table('kode_tindakan_terapi')->get();

        return view('dokter.rekam_medis.tambah_detail', compact('rekam', 'kode'));
    }

    public function storeDetail(Request $request, $id){
        $validated = $request->validate([
            'idkode_tindakan_terapi' => 'required|exists:kode_tindakan_terapi,idkode_tindakan_terapi',
            'detail' => 'required|string',
        ]);

        DB::table('detail_rekam_medis')->insert([
            'idrekam_medis' => $id,
            'idkode_tindakan_terapi' => $validated['idkode_tindakan_terapi'],
            'detail' => $validated['detail'],
        ]);

        return redirect()->route('dokter.rekam_medis.show', $id)
            ->with('success', 'Detail rekam medis berhasil ditambahkan.');
    }

    public function editDetail($id){
        $detail = DB::table('detail_rekam_medis')
            ->where('iddetail_rekam_medis', $id)
            ->first();

        $kode = DB::table('kode_tindakan_terapi')->get();

        return view('dokter.rekam_medis.edit_detail', compact('detail', 'kode'));
    }

    public function updateDetail(Request $request, $id){
        $validated = $request->validate([
            'idkode_tindakan_terapi' => 'required|exists:kode_tindakan_terapi,idkode_tindakan_terapi',
            'detail' => 'required|string',
        ]);

        DB::table('detail_rekam_medis')
            ->where('iddetail_rekam_medis', $id)
            ->update([
                'idkode_tindakan_terapi' => $validated['idkode_tindakan_terapi'],
                'detail' => $validated['detail'],
            ]);

        $rekamDetail = DB::table('detail_rekam_medis')
            ->where('iddetail_rekam_medis', $id)
            ->first();

        return redirect()->route('dokter.rekam_medis.show', $rekamDetail->idrekam_medis)
            ->with('success', 'Detail rekam medis berhasil diperbarui.');
    }

    public function destroyDetail($id){
        $rekamDetail = DB::table('detail_rekam_medis')
            ->where('iddetail_rekam_medis', $id)
            ->first();

        DB::table('detail_rekam_medis')
            ->where('iddetail_rekam_medis', $id)
            ->delete();

        return redirect()->route('dokter.rekam_medis.show', $rekamDetail->idrekam_medis)
            ->with('success', 'Detail rekam medis berhasil dihapus.');
    }

}

