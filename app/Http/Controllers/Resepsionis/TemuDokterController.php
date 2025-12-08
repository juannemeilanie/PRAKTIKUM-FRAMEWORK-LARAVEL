<?php

namespace App\Http\Controllers\Resepsionis;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TemuDokterController extends Controller
{
    public function index()
    {
        $temuDokter = DB::table('temu_dokter')
            ->join('pet', 'temu_dokter.idpet', '=', 'pet.idpet')
            ->join('role_user', 'temu_dokter.idrole_user', '=', 'role_user.idrole_user')
            ->join('user', 'role_user.iduser', '=', 'user.iduser')
            ->select(
                'temu_dokter.idreservasi_dokter',
                'temu_dokter.no_urut',
                'temu_dokter.waktu_daftar',
                'temu_dokter.status',  
                'pet.nama as nama_pet', 
                'user.nama as nama_dokter'
            )
            ->where('role_user.idrole', '2')
            ->get();

        return view('resepsionis.jadwal.temu_dokter', compact('temuDokter'));
    }

    public function create(){
        $pet = DB::table('pet')->get();
        $dokter = DB::table('role_user')
            ->join('user', 'role_user.iduser', '=', 'user.iduser')
            ->where('role_user.idrole', '2')
            ->select('role_user.idrole_user', 'user.nama', 'user.iduser')
            ->get();

        return view('resepsionis.jadwal.tambah', compact('pet', 'dokter'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateTemuDokter($request);

        $noUrut = DB::table('temu_dokter')->max('no_urut') + 1;

        DB::table('temu_dokter')->insert([
            'no_urut'       => $noUrut,
            'waktu_daftar'  => $validated['waktu_daftar'],
            'status'        => 1,
            'idpet'         => $validated['idpet'],
            'idrole_user'   => $validated['idrole_user'],
        ]);

        return redirect()->route('resepsionis.temu-dokter.index')
            ->with('success', 'Jadwal Temu Dokter berhasil ditambahkan.');
    }

    protected function validateTemuDokter(Request $request)
    {
        return $request->validate([
            'idpet' => ['required', 'integer'],
            'idrole_user' => ['required', 'integer'],
            'waktu_daftar' => ['required', 'date'],
        ], [
            'idpet.required' => 'Pet wajib dipilih.',
            'idrole_user.required' => 'Dokter wajib dipilih.',
            'waktu_daftar.required' => 'Waktu daftar wajib diisi.',
        ]);
    }

    public function edit($id)
    {
        $temuDokter = DB::table('temu_dokter')
            ->where('idreservasi_dokter', $id)
            ->first();

        $pet = DB::table('pet')->get();
        $dokter = DB::table('role_user')
            ->join('user', 'role_user.iduser', '=', 'user.iduser')
            ->where('role_user.idrole', '2')
            ->select('role_user.idrole_user', 'user.nama', 'user.iduser')
            ->get();
        return view('resepsionis.jadwal.edit', compact('temuDokter', 'pet', 'dokter'));
    }

    public function update(Request $request, $id)
    {
        $validated = $this->validateTemuDokter($request);

        DB::table('temu_dokter')
            ->where('idreservasi_dokter', $id)
            ->update([
                'idpet'         => $validated['idpet'],
                'idrole_user'   => $validated['idrole_user'],
                'waktu_daftar' => $validated['waktu_daftar'],
            ]);

        return redirect()->route('resepsionis.temu-dokter.index')
            ->with('success', 'Jadwal Temu Dokter berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('temu_dokter')
            ->where('idreservasi_dokter', $id)
            ->delete();

        return redirect()->route('resepsionis.temu-dokter.index')
            ->with('success', 'Jadwal Temu Dokter berhasil dihapus.');
    }
}
