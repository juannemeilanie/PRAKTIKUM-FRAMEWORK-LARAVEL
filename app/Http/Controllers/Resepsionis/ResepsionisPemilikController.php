<?php

namespace App\Http\Controllers\Resepsionis;

use App\Models\User;
use App\Models\Pemilik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ResepsionisPemilikController extends Controller
{
    public function index(){
        $pemilik = DB::table('pemilik')
            ->join('user', 'user.iduser', '=', 'pemilik.iduser')
            ->select('pemilik.*', 'user.nama', 'user.email')
            ->get();

        return view('resepsionis.pemilik.index', compact('pemilik'));
    }

    public function create(){
        $users = DB::table('user')->get();

        $pemilik = DB::table('pemilik')
        ->join('user', 'user.iduser', '=', 'pemilik.iduser')
        ->select('pemilik.*', 'user.nama', 'user.email')
        ->get();

        return view('resepsionis.pemilik.registrasi_pemilik', compact('users', 'pemilik'));
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:4',
            'no_wa' => 'required|string|min:10|max:12',
            'alamat' => 'required|string',
        ]);

        // 1. SIMPAN USER BARU
        $iduser = DB::table('user')->insertGetId([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // 2. SIMPAN KE TABEL PEMILIK
        DB::table('pemilik')->insert([
            'iduser' => $iduser,
            'no_wa' => $request->no_wa,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('resepsionis.pemilik.index')
            ->with('success', 'Pemilik berhasil ditambahkan.');
    }

    public function edit($id){
        $pemilik = DB::table('pemilik')
            ->join('user', 'user.iduser', '=', 'pemilik.iduser')
            ->select('pemilik.*', 'user.nama', 'user.email')
            ->where('idpemilik', $id)
            ->first();

        return view('resepsionis.pemilik.edit', compact('pemilik'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_wa' => 'required|string|min:10|max:12',
            'alamat' => 'required|string',
            'email' => 'required|email',
            'password' => 'nullable|min:4',
        ]);
        DB::table('pemilik')
            ->where('idpemilik', $id)
            ->update([
                'no_wa' => $request->no_wa,
                'alamat' => $request->alamat,
            ]);
            
        $userUpdate = [
            'nama' => $request->nama,
            'email' => $request->email,
            ];

            if ($request->password) {
                $userUpdate['password'] = bcrypt($request->password);
            }

            DB::table('user')
                ->where('iduser', $request->iduser)
                ->update($userUpdate);
            

        return redirect()->route('resepsionis.pemilik.index')
            ->with('success', 'Pemilik berhasil diperbarui.');
    }

    public function destroy($id){
        DB::table('pemilik')->where('idpemilik', $id)->delete();

        return redirect()->route('resepsionis.pemilik.index')
            ->with('success', 'Pemilik berhasil dihapus.');
    }
}
