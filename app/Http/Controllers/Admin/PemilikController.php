<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;

class PemilikController extends Controller
{
    public function index(){
        $pemilik = DB::table('pemilik')
            ->join('user', 'user.iduser', '=', 'pemilik.iduser')
            ->select('pemilik.*', 'user.nama', 'user.email')
            ->get();

        return view('admin.pemilik.index', compact('pemilik'));
    }

    public function create(){
        $users = User::all();
        return view('admin.pemilik.tambah', compact('users'));
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

        return redirect()->route('admin.pemilik.index')
            ->with('success', 'Pemilik berhasil ditambahkan.');
    }

    public function edit($id){
        $pemilik = DB::table('pemilik')->where('idpemilik', $id)->first();
        $users = User::all();

        return view('admin.pemilik.edit', compact('pemilik', 'users'));
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

        return redirect()->route('admin.pemilik.index')
            ->with('success', 'Pemilik berhasil diperbarui.');
    }

    public function destroy($id){
        DB::table('pemilik')->where('idpemilik', $id)->delete();

        return redirect()->route('admin.pemilik.index')
            ->with('success', 'Pemilik berhasil dihapus.');
    }
}
