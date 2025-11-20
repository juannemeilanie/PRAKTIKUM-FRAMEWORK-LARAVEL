<?php

namespace App\Http\Controllers\Admin;

use App\Models\JenisHewan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class JenisHewanController extends Controller
{
    public function index(){

        // $jenisHewan = JenisHewan::all();

        $jenisHewan = DB::table('jenis_hewan')
        ->select('idjenis_hewan', 'nama_jenis_hewan')
        ->get();
        return view('admin.jenis-hewan.index', compact('jenisHewan'));
    }

    public function create(){
        return view('admin.jenis-hewan.tambah');
    }

    public function store(Request $request){
        $validatedData = $this->validateJenisHewan($request);

        $jenisHewan = $this->createJenisHewan($validatedData);

        return redirect()->route('admin.jenis-hewan.index')
                        ->with('success', 'Jenis Hewan berhasil ditambahkan.');
    }

    protected function validateJenisHewan(Request $request, $id = null){

        //data bersifat unik
        $uniqueRule = $id ?
            'unique:jenis_hewan,nama_jenis_hewan,' . $id . ',idjenis_hewan' :
            'unique:jenis_hewan,nama_jenis_hewan';

        //validasi input
        return $request->validate([
            'nama_jenis_hewan' => [
                'required', 
                'string', 
                'max:255', 
                'min:3', 
                $uniqueRule
            ],
        ], [
            'nama_jenis_hewan.required' => 'Nama Jenis Hewan wajib diisi.',
            'nama_jenis_hewan.string' => 'Nama Jenis Hewan harus berupa teks.',
            'nama_jenis_hewan.max' => 'Nama Jenis Hewan maksimal 255 karakter.',
            'nama_jenis_hewan.min' => 'Nama Jenis Hewan minimal 3 karakter.',
            'nama_jenis_hewan.unique' => 'Nama Jenis Hewan sudah ada.',
        ]);
    }


    //helper untuk membuat data baru
    protected function createJenisHewan(array $data){
        try{
            // return JenisHewan::create([
            //     'nama_jenis_hewan' => $this->formatNamaJenisHewan($data['nama_jenis_hewan']),   
            // ]);

            $jenisHewan = DB::table('jenis_hewan')->insert([
                'nama_jenis_hewan' => $this->formatNamaJenisHewan($data['nama_jenis_hewan']),
            ]);
            return $jenisHewan;
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan data jenis hewan:' . $e->getMessage());
        }
    }

    //helper untuk format nama jenis hewan
    protected function formatNamaJenisHewan($nama){
        return trim(ucwords(strtolower($nama)));
    }

    public function edit($id){

        $jenisHewan = DB::table('jenis_hewan')
            ->where('idjenis_hewan', $id)
            ->first();

        if (!$jenisHewan) {
            return redirect()->route('admin.jenis-hewan.index')
                ->with('error', 'Data Jenis Hewan tidak ditemukan.');
        }

        return view('admin.jenis-hewan.edit', compact('jenisHewan'));
    }

    public function update(Request $request, $id){
    
        $validatedData = $this->validateJenisHewan($request, $id);

        try {

            DB::table('jenis_hewan')
                ->where('idjenis_hewan', $id)
                ->update([
                    'nama_jenis_hewan' => $this->formatNamaJenisHewan($validatedData['nama_jenis_hewan']),
                ]);

            return redirect()->route('admin.jenis-hewan.index')
                ->with('success', 'Jenis Hewan berhasil diupdate.');

        } catch (\Exception $e) {
            return redirect()->route('admin.jenis-hewan.index')
                ->with('error', 'Gagal mengupdate data: ' . $e->getMessage());
        }
    }

    public function destroy($id){
        try {

            DB::table('jenis_hewan')
                ->where('idjenis_hewan', $id)
                ->delete();

            return redirect()->route('admin.jenis-hewan.index')
                ->with('success', 'Jenis Hewan berhasil dihapus.');

        } catch (\Exception $e) {
            return redirect()->route('admin.jenis-hewan.index')
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    
}
