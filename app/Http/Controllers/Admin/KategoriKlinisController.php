<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\KategoriKlinis;
use App\Http\Controllers\Controller;

class KategoriKlinisController extends Controller
{
    public function index(){
        $kategoriklinis = KategoriKlinis::all();
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

    protected function validateKategoriKlinis(Request $request){

        //validasi input
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
        return KategoriKlinis::create([
            'nama_kategori_klinis' => $data['nama_kategori_klinis'],
        ]);
    }

    protected function formatNamaKategoriKlinis($nama){
        return trim(ucwords(strtolower($nama)));
    }
}
