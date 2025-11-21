<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PerawatController extends Controller
{
    public function index(){
        $perawat = DB::table('perawat')
            ->join('user', 'perawat.iduser', '=', 'user.iduser')
            ->select('perawat.*', 'user.nama')
            ->get();
        
        return view('admin.perawat.index', compact('perawat'));
    }

    public function create(){
        $users = DB::table('user')
            ->join('role_user', 'user.iduser', '=', 'role_user.iduser')
            ->join('role', 'role_user.idrole', '=', 'role.idrole')
            ->where('role.nama_role', 'Perawat')
            ->select('user.*')
            ->get();
        return view('admin.perawat.tambah', compact('users'));
    }

    public function store(Request $request){
        $validatedData = $this->validatePerawat($request);

        $perawat = $this->createPerawat($validatedData);

        return redirect()->route('admin.perawat.index')
                        ->with('success', 'Perawat berhasil ditambahkan');
    }

    protected function validatePerawat(Request $request, $id = null){
        return $request->validate([
            'iduser' => [
                'required',
                'unique:perawat,iduser'
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
            'jenis_kelamin' => [
                'required',
                'string',
            ],
            'pendidikan' => [
                'required',
                'string',
            ],
        ]);
    }

    private function createPerawat(array $data)
    {
        try {
            return DB::table('perawat')->insert([
                'iduser'        => $data['iduser'],
                'alamat'        => $this->formatNamaPerawat($data['alamat']),
                'no_hp'         => $data['no_hp'],
                'jenis_kelamin' => $data['jenis_kelamin'] == 'Laki-Laki' ? 'L' : 'P',
                'pendidikan'    => $this->formatNamaPerawat($data['pendidikan']),
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan data perawat: ' . $e->getMessage());
        }
    }


    protected function formatNamaPerawat($nama){
        return trim(ucwords(strtolower($nama)));
    }

    public function edit($id){
        $perawat = DB::table('perawat')->where('idperawat', $id)->first();

        return view('admin.perawat.edit', compact('perawat'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'alamat'        => 'required|string',
            'no_hp'         => 'required|string',
            'jenis_kelamin' => 'required|string',
            'pendidikan' => 'required|string',
        ]);

        DB::table('perawat')
            ->where('idperawat', $id)
            ->update([
                'alamat'        => $this->formatNamaPerawat($request->alamat),
                'no_hp'         => $request->no_hp,
                'jenis_kelamin' => $request->jenis_kelamin == 'Laki-Laki' ? 'L' : 'P',
                'pendidikan'    => $request->pendidikan,
            ]);

        return redirect()->route('admin.perawat.index')
            ->with('success', 'Data perawat berhasil diperbarui.');
    }

    public function destroy($id){
        DB::table('perawat')->where('idperawat', $id)->delete();

        return redirect()->route('admin.perawat.index')
            ->with('success', 'Data perawat berhasil dihapus.');
    }

}
