<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DokterController extends Controller
{
    public function index(){
        $dokter = DB::table('dokter')
            ->join('user', 'dokter.iduser', '=', 'user.iduser')
            ->select('dokter.*', 'user.nama')
            ->get();
        return view('admin.dokter.index', compact('dokter'));
    }

    public function create(){
        $users = DB::table('user')
            ->join('role_user', 'user.iduser', '=', 'role_user.iduser')
            ->join('role', 'role_user.idrole', '=', 'role.idrole')
            ->where('role.nama_role', 'Dokter')
            ->select('user.*')
            ->get();
        return view('admin.dokter.tambah', compact('users'));
    }

    public function store(Request $request){
        $validatedData = $this->validateDokter($request);

        $dokter = $this->createDokter($validatedData);

        return redirect()->route('admin.dokter.index')
                        ->with('success', 'Dokter berhasil ditambahkan');
    }

    protected function validateDokter(Request $request, $id = null){
        return $request->validate([
            'iduser' => [
                'required',
                'unique:dokter,iduser'
            ],
            'alamat' => [
                'required',
                'string',
            ],
            'no_hp' => [
                'required',
                'string',
                'min:10',
                'max:15',
            ],
            'bidang_dokter' => [
                'required',
                'string',
            ],
            'jenis_kelamin' => [
                'required',
                'string',
            ],
        ]);
    }

    private function createDokter(array $data)
    {
        try {
            return DB::table('dokter')->insert([
                'iduser'         => $data['iduser'],
                'alamat'         => $this->formatNamaDokter($data['alamat']),
                'no_hp'          => $data['no_hp'],
                'bidang_dokter'  => $this->formatNamaDokter($data['bidang_dokter']),
                'jenis_kelamin'  => $data['jenis_kelamin'] == 'Laki-Laki' ? 'L' : 'P',
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan data dokter: ' . $e->getMessage());
        }
    }

    protected function formatNamaDokter($nama){
        return trim(ucwords(strtolower($nama)));
    }

    public function edit($id){
        $dokter = DB::table('dokter')->where('iddokter', $id)->first();

        return view('admin.dokter.edit', compact('dokter'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'alamat'        => 'required|string',
            'no_hp'         => 'required|string',
            'bidang_dokter' => 'required|string',
            'jenis_kelamin' => 'required|string',
        ]);

        DB::table('dokter')
            ->where('iddokter', $id)
            ->update([
                'alamat'        => $this->formatNamaDokter($request->alamat),
                'no_hp'         => $request->no_hp,
                'bidang_dokter' => $this->formatNamaDokter($request->bidang_dokter),
                'jenis_kelamin' => $request->jenis_kelamin == 'Laki-Laki' ? 'L' : 'P',
            ]);

        return redirect()->route('admin.dokter.index')
            ->with('success', 'Data dokter berhasil diperbarui.');
    }

    public function destroy($id){
        DB::table('dokter')->where('iddokter', $id)->delete();

        return redirect()->route('admin.dokter.index')
            ->with('success', 'Data dokter berhasil dihapus.');
    }

}
