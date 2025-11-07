<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function create(){
        return view('admin.user.tambah');
    }

    public function store(Request $request){
        $validatedData = $this->validateUser($request);

        $users = $this->createUser($validatedData);

        return redirect()->route('admin.user.index')
                        ->with('success', 'User berhasil ditambahkan.');
    }

    protected function validateUser(Request $request, $id = null){

        //data bersifat unik
        $uniqueRule = $id ?
            'unique:user,nama,' . $id . ',iduser' :
            'unique:user,nama';

        //validasi input
        return $request->validate([
            'nama' => [
                'required', 
                'string', 
                'max:255', 
                'min:5', 
                $uniqueRule
            ],
        ], [
            'nama.required' => 'Nama User wajib diisi.',
            'nama.string' => 'Nama Jenis Hewan harus berupa teks.',
            'nama.max' => 'Nama Jenis Hewan maksimal 255 karakter.',
            'nama.min' => 'Nama Jenis Hewan minimal 5 karakter.',
            'nama.unique' => 'Nama Jenis Hewan sudah ada.',
        ]);
    }

    protected function createUser(array $data){
        try{
            return User::create([
                'nama' => $this->formatNamaUser($data['nama']),   
            ]);
        } catch (\Exception $e){
            // Tangani kesalahan jika diperlukan
            throw new \Exception('Gagal menyimpan User: ' . $e->getMessage());
        }
    }

    protected function formatNamaUser($nama){
        return ucwords(strtolower(trim($nama)));
    }
    
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus.');
    }


}
