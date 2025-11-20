<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class KategoriKlinisController extends Controller
{
    public function index(){
        // Query builder: ambil semua data
        $kategoriklinis = DB::table('kategori_klinis')->get();

        return view('admin.kategori-klinis.index', compact('kategoriklinis'));
    }

    public function create(){
        return view('admin.kategori-klinis.tambah');
    }

    public function store(Request $request){
        $validatedData = $this->validateKategoriKlinis($request);

        $kategoriklinis = $this->createKategoriKlinis($validatedData);

        return redirect()->route('admin.kategori-klinis.index')
                        ->with('success', 'Kategori Klinis berhasil ditambahkan.');
    }

    public function edit($id){
        // Query builder: ambil data berdasarkan id
        $kategoriklinis = DB::table('kategori_klinis')->where('idkategori_klinis', $id)->first();

        return view('admin.kategori-klinis.edit', compact('kategoriklinis'));
    }

    public function update(Request $request, $id){
        // Validasi, tetapi unique harus mengabaikan id yang sedang diedit
        $request->validate([
            'nama_kategori_klinis' => [
                'required',
                'string',
                'max:255',
                'min:3',
                'unique:kategori_klinis,nama_kategori_klinis,' . $id . ',idkategori_klinis'
            ],
        ], [
            'nama_kategori_klinis.required' => 'Nama Kategori Klinis wajib diisi.',
            'nama_kategori_klinis.string' => 'Nama Kategori Klinis harus berupa teks.',
            'nama_kategori_klinis.max' => 'Nama Kategori Klinis maksimal 255 karakter.',
            'nama_kategori_klinis.min' => 'Nama Kategori Klinis minimal 3 karakter.',
            'nama_kategori_klinis.unique' => 'Nama Kategori Klinis sudah ada.',
        ]);

        // Query builder: update data
        DB::table('kategori_klinis')
            ->where('idkategori_klinis', $id)
            ->update([
                'nama_kategori_klinis' => $request->nama_kategori_klinis,
            ]);

        return redirect()->route('admin.kategori-klinis.index')
                        ->with('success', 'Kategori Klinis berhasil diperbarui.');
    }

    public function destroy($id){
        // Query builder: delete
        DB::table('kategori_klinis')->where('idkategori_klinis', $id)->delete();

        return redirect()->route('admin.kategori-klinis.index')
                        ->with('success', 'Kategori Klinis berhasil dihapus.');
    }

    protected function validateKategoriKlinis(Request $request){
        return $request->validate([
            'nama_kategori_klinis' => [
                'required', 
                'string', 
                'max:255', 
                'min:3', 
                'unique:kategori_klinis,nama_kategori_klinis'
            ],
        ], [
            'nama_kategori_klinis.required' => 'Nama Kategori Klinis wajib diisi.',
            'nama_kategori_klinis.string' => 'Nama Kategori Klinis harus berupa teks.',
            'nama_kategori_klinis.max' => 'Nama Kategori Klinis maksimal 255 karakter.',
            'nama_kategori_klinis.min' => 'Nama Kategori Klinis minimal 3 karakter.',
            'nama_kategori_klinis.unique' => 'Nama Kategori Klinis sudah ada.',
        ]);
    }

    protected function createKategoriKlinis(array $data){
        return DB::table('kategori_klinis')->insert([
            'nama_kategori_klinis' => $data['nama_kategori_klinis'],
        ]);
    }

    protected function formatNamaKategoriKlinis($nama){
        return trim(ucwords(strtolower($nama)));
    }
}
