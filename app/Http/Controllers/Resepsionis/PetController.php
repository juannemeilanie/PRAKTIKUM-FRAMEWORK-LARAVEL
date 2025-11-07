<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index(){
        $pets = Pet::all();
        return view('resepsionis.registrasi_pet', compact('pets'));
    }

    public function create(){
        return view('resepsionis.registrasi_pet', [
            'pemilik' => Pemilik::all(),
            'rashewan' => RasHewan::all(),
        ]);
    }

    public function store(Requets $request){
        $validatedData = $this->validatePet($request);

        $pets = $this->createPet($validatedData);

        return redirect()->route('resepsionis.registrasi_pet')
                        ->with('success', 'Pet berhasil ditambahkan.');
    }
    
    protected function validatePet(Request $request, $id = null){
        $uniqueRule = $id ?
            'unique:pet,nama,' . $id . ',idpet':
            'unique:pet,nama';

        return $request->validate([
            'nama' =>[
                'required',
                'string',
                $uniqueRule
            ],
            'tanggal_lahir' =>[
                'required',
                'date'
            ],
            'warna_tanda' =>[
                'required',
                'string'
            ],
            'jenis_kelamin' =>[
                'required',
                'string'
            ],
            'pemilik_id' => [
                'required', 
                'exists:pemilik,idpemilik'
            ],
            'ras_hewan_id' =>[
                'required',
                'exists:ras_hewan,idras_hewan'
            ],
        ],[
            'nama.required' => 'Nama pet wajib diisi.',
            'nama.string' => 'Nama pet harus berupa teks.',

            //warna
            'warna_tanda.required' => 'Warna wajib diisi',
            'warna_tanda.string' => 'Warna  harus berupa teks.',  
            
            //jenis
            'jenis_kelamin.required' => 'Warna wajib diisi',
            'jenis_kelamin.string' => 'Warna  harus berupa teks.',
            
            // pemilik_id
            'pemilik_id.required' => 'Pemilik wajib dipilih.',
            'pemilik_id.exists' => 'Pemilik tidak valid.',

            // ras_hewan_id
            'ras_hewan_id.required' => 'Ras Hewan Klinis wajib dipilih.',
            'ras_hewan_id.exists' => 'Ras Hewan Klinis tidak valid.',
        ]);
    }

    protected function createPet(array $data){
        try{
            return Pet::create([
                'nama' => $this->formatNamaPet($data['nama']),
            ]);
        } catch (\Exception $e){
            throw new \Exception('Gagal menyimpan data pet: ' . $e->getMessage());
        }
    }

    protected function formatNamaPet($nama){
        return trim(ucwords(strtolower($nama)));
    }
}
