<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RasHewanController extends Controller
{
    public function index(){
        $rasHewan = DB::table('ras_hewan')
            ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            ->select('ras_hewan.*', 'jenis_hewan.nama_jenis_hewan')
            ->get();

        return view('admin.ras-hewan.index', compact('rasHewan'));
    }

    public function create(){
        $jenisHewan = DB::table('jenis_hewan')->get();
        return view('admin.ras-hewan.tambah', compact('jenisHewan'));
    }

    public function store(Request $request){
        $validatedData = $this->validateRasHewan($request);

        DB::table('ras_hewan')->insert([
            'nama_ras' => $this->formatNamaRasHewan($validatedData['nama_ras']),
            'idjenis_hewan' => $validatedData['idjenis_hewan'],
        ]);

        return redirect()->route('admin.ras-hewan.index')
                        ->with('success', 'Ras Hewan berhasil ditambahkan.');
    }

    protected function validateRasHewan(Request $request, $id = null){
        $uniqueRule = $id
            ? 'unique:ras_hewan,nama_ras,' . $id . ',idras_hewan'
            : 'unique:ras_hewan,nama_ras';

        return $request->validate([
            'nama_ras' => [
                'required',
                'string',
                'max:255',
                'min:3',
                $uniqueRule
            ],
            'idjenis_hewan' => [
                'required',
                'exists:jenis_hewan,idjenis_hewan'
            ]
        ]);
    }

    public function edit($id){
        $ras = DB::table('ras_hewan')->where('idras_hewan', $id)->first();
        $jenisHewan = DB::table('jenis_hewan')->get();

        return view('admin.ras-hewan.edit', compact('ras', 'jenisHewan'));
    }

    public function update(Request $request, $id){
        $validatedData = $this->validateRasHewan($request, $id);

        DB::table('ras_hewan')->where('idras_hewan', $id)->update([
            'nama_ras' => $this->formatNamaRasHewan($validatedData['nama_ras']),
            'idjenis_hewan' => $validatedData['idjenis_hewan'],
        ]);

        return redirect()->route('admin.ras-hewan.index')
                        ->with('success', 'Ras Hewan berhasil diperbarui.');
    }

    public function destroy($id){
        DB::table('ras_hewan')->where('idras_hewan', $id)->delete();

        return redirect()->route('admin.ras-hewan.index')
                        ->with('success', 'Ras Hewan berhasil dihapus.');
    }

    protected function formatNamaRasHewan($nama){
        return trim(ucwords(strtolower($nama)));
    }
}
