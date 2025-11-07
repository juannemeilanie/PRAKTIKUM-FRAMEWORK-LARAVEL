<?php

namespace App\Http\Controllers\Admin;

use App\Models\RasHewan;
use App\Models\JenisHewan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RasHewanController extends Controller
{
    public function index(){
        $rashewan = RasHewan::all();
        return view('admin.ras-hewan.index', compact('rashewan'));
    }

    public function create(){
        return view('admin.ras-hewan.tambah',[
            'jenishewan' => JenisHewan::all(),
        ]);
    }

    public function store(Request $request){
        $validatedData = $this->validateRasHewan($request);

        $rashewan = $this->createRasHewan($validatedData);

        return redirect()->route('admin.ras-hewan.index')
                        ->with('success', 'Ras Hewan berhasil ditambahkan.');
    }

    protected function validateRasHewan(Request $request, $id = null){

        //data bersifat unik
        $uniqueRule = $id ?
            'unique:ras_hewan,nama_ras,' . $id . ',idras_hewan' :
            'unique:ras_hewan,nama_ras';

        //validasi input
        return $request->validate([
            'nama_ras' => [
                'required', 
                'string', 
                'max:255', 
                'min:3', 
                $uniqueRule
            ],
            'jenis_hewan_id' => [
                'required',
                'exists:jenis_hewan,idjenis_hewan'
            ]
        ], [
            'nama_ras.required' => 'Nama Ras Hewan wajib diisi.',
            'nama_ras.string' => 'Nama Ras Hewan harus berupa teks.',
            'nama_ras.max' => 'Nama Ras Hewan maksimal 255 karakter.',
            'nama_ras.min' => 'Nama Ras Hewan minimal 3 karakter.',
            'nama_ras.unique' => 'Nama Ras Hewan sudah ada.',

            // jenishewan_id
            'jenis_hewan_id.required' => 'Jenis Hewan Klinis wajib dipilih.',
            'jenis_hewan_id.exists' => 'Jenis Hewan Klinis tidak valid.',
        ]);
    }

    //helper untuk membuat data baru
    protected function createRasHewan(array $data){
        try{
            return RasHewan::create([
                'nama_ras' => $this->formatNamaRasHewan($data['nama_ras']),   
            ]);
        } catch (\Exception $e){
            // Tangani kesalahan jika diperlukan    
            throw new \Exception('Gagal membuat Ras Hewan: ' . $e->getMessage());
        }
    }
}
