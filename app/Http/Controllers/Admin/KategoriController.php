<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function index(){
        // Query Builder
        $kategori = DB::table('kategori')
                    ->select('idkategori', 'nama_kategori')
                    ->get();

        return view('admin.kategori.index', compact('kategori'));
    }

    public function create(){
        return view('admin.kategori.tambah');
    }

    public function store(Request $request){
        $validatedData = $this->validateKategori($request);

        $kategori = $this->createKategori($validatedData);

        return redirect()->route('admin.kategori.index')
                        ->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id){
        $kategori = DB::table('kategori')
                    ->where('idkategori', $id)
                    ->first();

        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id){
        // Validasi untuk update (abaikan id sekarang)
        $request->validate([
            'nama_kategori' => [
                'required',
                'string',
                'unique:kategori,nama_kategori,' . $id . ',idkategori'
            ]
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi',
            'nama_kategori.string' => 'Nama kategori harus berupa teks',
        ]);

        DB::table('kategori')
            ->where('idkategori', $id)
            ->update([
                'nama_kategori' => $this->formatNamaKategori($request->nama_kategori)
            ]);

        return redirect()->route('admin.kategori.index')
                        ->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy($id){
        DB::table('kategori')
            ->where('idkategori', $id)
            ->delete();

        return redirect()->route('admin.kategori.index')
                        ->with('success', 'Kategori berhasil dihapus');
    }

    protected function validateKategori(Request $request){
        // FIX: $id tidak ada → hilangkan kondisi yang membuat error
        return $request->validate([
            'nama_kategori' => [
                'required',
                'string',
                'unique:kategori,nama_kategori'
            ],
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi',
            'nama_kategori.string' => 'Nama kategori harus berupa teks',
        ]);
    }

    protected function createKategori(array $data){
        try{
            return DB::table('kategori')->insert([
                'nama_kategori' => $this->formatNamaKategori($data['nama_kategori']),
            ]);

        } catch (\Exception $e){
            throw new \Exception('Gagal menyimpan data kategori: ' . $e->getMessage());
        }
    }

    protected function formatNamaKategori($nama){
        return trim(ucwords(strtolower($nama)));
    }
}
