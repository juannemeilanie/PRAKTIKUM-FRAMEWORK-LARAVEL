<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pemilik;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PemilikController extends Controller
{
    public function index(){
        $pemilik = Pemilik::with('user')->get();
        return view('admin.pemilik.index', compact('pemilik'));
    }

    public function create(){
        return view('admin.pemilik.tambah');
    }

    public function store(Request $request){
        $validatedData = $this->validatePemilik($request);

        $pemilik = $this->createPemilik($validatedData);

        return redirect()->route('admin.pemilik.index')
                        ->with('success', 'Pemilik berhasil ditambahkan.');
    }

    protected function validatePemilik(Request $request){

        //validasi input
        return $request->validate([
            'nama_pemilik' => [
                'required', 
                'string', 
                'max:255', 
                'min:3'
            ],
            'no_wa' => [
                'required', 
                'string', 
                'max:15', 
                'min:10'
            ],
            'alamat' => [
                'required', 
                'string', 
                'max:500', 
                'min:10'
            ],
        ], [
            'nama_pemilik.required' => 'Nama Pemilik wajib diisi.',
            'nama_pemilik.string' => 'Nama Pemilik harus berupa teks.',
            'nama_pemilik.max' => 'Nama Pemilik maksimal 255 karakter.',
            'nama_pemilik.min' => 'Nama Pemilik minimal 3 karakter.',

            // no_wa
            'no_wa.required' => 'No WA wajib diisi.',
            'no_wa.string' => 'No WA harus berupa teks.',
            'no_wa.max' => 'No WA maksimal 15 karakter.',
            'no_wa.min' => 'No WA minimal 10 karakter.',
            // alamat
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',
            'alamat.max' => 'Alamat maksimal 500 karakter.',
            'alamat.min' => 'Alamat minimal 10 karakter.',
        ]);
    }

    protected function createPemilik(array $data){
        try{
            return Pemilik::create([
                'nama_pemilik' => $data['nama_pemilik'],
                'no_wa' => $data['no_wa'],
                'alamat' => $data['alamat'],
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan data pemilik:' . $e->getMessage());
        }
    }

    protected function formatNamaPemilik($nama){
        return trim(ucwords(strtolower($nama)));
    }
}
