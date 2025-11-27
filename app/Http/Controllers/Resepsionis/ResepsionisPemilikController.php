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
        $users = User::all();

        $pemilik = DB::table('pemilik')
        ->join('user', 'user.iduser', '=', 'pemilik.iduser')
        ->select('pemilik.*', 'user.nama', 'user.email')
        ->get();

        return view('resepsionis.pemilik.registrasi_pemilik', compact('users', 'pemilik'));
    }

    public function store(Request $request){
        $request->validate([
            'iduser' => 'required',
            'no_wa' => 'required|string|min:10|max:15',
            'alamat' => 'required|string',
        ]);

        DB::table('pemilik')->insert([
            'iduser' => $request->iduser,
            'no_wa' => $request->no_wa,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('resepsionis.pemilik.index')
            ->with('success', 'Pemilik berhasil ditambahkan.');
    }

    public function edit($id){
        $pemilik = DB::table('pemilik')->where('idpemilik', $id)->first();
        $users = User::all();

        return view('resepsionis.pemilik.edit', compact('pemilik', 'users'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'iduser' => 'required',
            'no_wa' => 'required|string|min:10|max:15',
            'alamat' => 'required|string',
        ]);

        DB::table('pemilik')
            ->where('idpemilik', $id)
            ->update([
                'iduser' => $request->iduser,
                'no_wa' => $request->no_wa,
                'alamat' => $request->alamat,
            ]);

        return redirect()->route('resepsionis.pemilik.index')
            ->with('success', 'Pemilik berhasil diperbarui.');
    }

    public function destroy($id){
        DB::table('pemilik')->where('idpemilik', $id)->delete();

        return redirect()->route('resepsionis.pemilik.index')
            ->with('success', 'Pemilik berhasil dihapus.');
    }
}
