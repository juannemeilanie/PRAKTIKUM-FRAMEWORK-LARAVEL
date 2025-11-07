<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function index(){
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    public function create(){
        return view('admin.kategori.tambah');
    }

    public function store(Request $request){
        $validatedData = $this->validateKategori($request);

        $kategori = $this->createKategori($validatedData);

        return redirect()->route('admin.kategori.index')
                        ->with('succes', 'Kategori berhasil ditambahkan');
    }

    protected function validateKategori(Request $request){
        $uniqueRule = $id ?
            'unique:kategori,nama_kategori' . $id . ',idkategori' :
            'unique:kategori,nama_kategori';

        return $request->validate([
            'nama_kategori' => [
                'required',
                'string',
                $uniqueRule
            ],
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi',
            'nama_kategori.string' => 'Nama kategori harus berupa teks',
        ]);
    }

    protected function createKategori(array $data){
        try{
            return Kategori::create([
                'nama_kategori' => $this->formatNamaKategori($data['nama_kategori']),
            ]);
        }catch (\Exception $e){
            throw new \Exception('Gagal menyimpan data kategori: ' . $e->getMessage());
        }
    }

    protected function formatNamaKategori($nama){
        return trim(ucwords(strtolower($nama)));
    }
}
