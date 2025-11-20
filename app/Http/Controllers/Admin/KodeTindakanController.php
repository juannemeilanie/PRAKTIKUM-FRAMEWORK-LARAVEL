<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kategori;
use App\Models\KategoriKlinis;
use App\Http\Controllers\Controller;

class KodeTindakanController extends Controller
{
    public function index(){
    $kodetindakan = DB::table('kode_tindakan_terapi as kt')
        ->join('kategori as k', 'kt.idkategori', '=', 'k.idkategori')
        ->join('kategori_klinis as kk', 'kt.idkategori_klinis', '=', 'kk.idkategori_klinis')
        ->select(
            'kt.*',
            'k.nama_kategori',
            'kk.nama_kategori_klinis'
        )
        ->get();

    return view('admin.kode-tindakan.index', compact('kodetindakan'));
    }

    public function create(){
        return view('admin.kode-tindakan.tambah', [
            'kategori' => DB::table('kategori')->get(),
            'kategoriKlinis' => DB::table('kategori_klinis')->get(),
        ]);
    }

    public function store(Request $request){
        $validatedData = $this->validateKodeTindakan($request);

        $kodetindakan = $this->createKodeTindakan($validatedData);

        return redirect()->route('admin.kode-tindakan.index')
                        ->with('success', 'Kode Tindakan berhasil ditambahkan.');
    }

    protected function validateKodeTindakan(Request $request){
        return $request->validate([
            'kode' => [
                'required',
                'string',
                'max:5',
                'unique:kode_tindakan_terapi,kode'
            ],
            'deskripsi_tindakan_terapi' => [
                'required',
                'string',
                'max:1000'
            ],
            'idkategori' => [
                'required',
                'exists:kategori,idkategori'
            ],
            'idkategori_klinis' => [
                'required',
                'exists:kategori_klinis,idkategori_klinis'
            ],
        ]);
    }


    protected function createKodeTindakan(array $data){
        try {
            return DB::table('kode_tindakan_terapi')->insert([
                'kode' => strtoupper($data['kode']),
                'deskripsi_tindakan_terapi' => $data['deskripsi_tindakan_terapi'],
                'idkategori' => $data['idkategori'],
                'idkategori_klinis' => $data['idkategori_klinis'],
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan kode tindakan: ' . $e->getMessage());
        }
    }


    public function edit($id){
        $kodetindakan = DB::table('kode_tindakan_terapi')
                            ->where('idkode_tindakan_terapi', $id)
                            ->first();

        return view('admin.kode-tindakan.edit', [
            'kodetindakan' => $kodetindakan,
            'kategori' => DB::table('kategori')->get(),
            'kategoriKlinis' => DB::table('kategori_klinis')->get(),
        ]);
    }

    public function update(Request $request, $id){
        // Validasi update → abaikan ID sendiri
        $request->validate([
            'kode' => [
                'required',
                'string',
                'max:10',
                'min:3',
                'unique:kode_tindakan_terapi,kode,' . $id . ',idkode_tindakan_terapi'
            ],
            'deskripsi_tindakan_terapi' => [
                'required',
                'string',
                'max:255',
                'min:3'
            ],
            'idkategori' => [
                'required',
                'exists:kategori,idkategori'
            ],
            'idkategori_klinis' => [
                'required',
                'exists:kategori_klinis,idkategori_klinis'
            ],
        ]);

        DB::table('kode_tindakan_terapi')
            ->where('idkode_tindakan_terapi', $id)
            ->update([
                'kode' => strtoupper($request->kode),
                'deskripsi_tindakan_terapi' => $request->deskripsi_tindakan_terapi,
                'idkategori' => $request->idkategori,
                'idkategori_klinis' => $request->idkategori_klinis,
            ]);

        return redirect()->route('admin.kode-tindakan.index')
                        ->with('success', 'Kode Tindakan berhasil diperbarui.');
    }

    public function destroy($id){
        DB::table('kode_tindakan_terapi')
            ->where('idkode_tindakan_terapi', $id)
            ->delete();

        return redirect()->route('admin.kode-tindakan.index')
                        ->with('success', 'Kode Tindakan berhasil dihapus.');
    }
}
