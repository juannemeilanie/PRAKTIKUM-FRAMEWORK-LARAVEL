<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use App\Models\KodeTindakan;
use Illuminate\Http\Request;
use App\Models\KategoriKlinis;
use App\Http\Controllers\Controller;

class KodeTindakanController extends Controller
{
    public function index(){
        $kodetindakan = KodeTindakan::all();
        return view('admin.kode-tindakan.index', compact('kodetindakan'));
    }

    public function create(){
        return view('admin.kode-tindakan.tambah', [
            'kategori' => Kategori::all(),
            'kategoriKlinis' => KategoriKlinis::all(), 
        ]);
    }

    public function store(Request $request){
        $validatedData = $this->validateKodeTindakan($request);

        $kodetindakan = $this->createKodeTindakan($validatedData);

        return redirect()->route('admin.kode-tindakan.index')
                        ->with('success', 'Kode Tindakan berhasil ditambahkan.');
    }

    protected function validateKodeTindakan(Request $request){
        $uniqueRule = $id ?
            'unique:kode_tindakan_terapi,' . $id . ',idkode_tindakan_terapi':
            'unique:kode_tindakan_terapi';

        //validasi input
        return $request->validate([
            'kode_tindakan' => [
                'required', 
                'string', 
                'max:10', 
                'min:3', 
                $uniqueRule
            ],
            'nama_tindakan' => [
                'required', 
                'string', 
                'max:255', 
                'min:3'
            ],
            'kategori_id' => [
                'required', 
                'exists:kategori,idkategori'
            ],
            'kategori_klinis_id' => [
                'required', 
                'exists:kategori_klinis,idkategori_klinis'
            ],
        ], [
            'kode_tindakan.required' => 'Kode Tindakan wajib diisi.',
            'kode_tindakan.string' => 'Kode Tindakan harus berupa teks.',
            'kode_tindakan.max' => 'Kode Tindakan maksimal 10 karakter.',
            'kode_tindakan.min' => 'Kode Tindakan minimal 3 karakter.',
            'kode_tindakan.unique' => 'Kode Tindakan sudah digunakan.',

            // nama_tindakan
            'nama_tindakan.required' => 'Nama Tindakan wajib diisi.',
            'nama_tindakan.string' => 'Nama Tindakan harus berupa teks.',
            'nama_tindakan.max' => 'Nama Tindakan maksimal 255 karakter.',
            'nama_tindakan.min' => 'Nama Tindakan minimal 3 karakter.',

            // kategori_id
            'kategori_id.required' => 'Kategori wajib dipilih.',
            'kategori_id.exists' => 'Kategori tidak valid.',

            // kategori_klinis_id
            'kategori_klinis_id.required' => 'Kategori Klinis wajib dipilih.',
            'kategori_klinis_id.exists' => 'Kategori Klinis tidak valid.',
        ]);
    }

    // protected function createKodeTindakan(array $data){
    //     try{
    //         return KodeTindakan::create([
    //             ''
    //         ]);
    //     } catch (\Exception $e){
    //         //
    //     }
    // }
}
