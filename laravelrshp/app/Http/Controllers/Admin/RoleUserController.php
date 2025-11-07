<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleUserController extends Controller
{
    public function index(){
        $roleUser = User::with('role')->get();
        // dd($roleUser);
        return view('admin.user-role.index', compact('roleUser'));
    }

    public function create(){
        return view('admin.user-role.tambah');
    }

    public function store(Request $request){
        $validatedData = $this->validateUser($request);

        $roles = $this->createRole($validatedData);

        return redirect()->route('admin.user-role.index')
                        ->with('success', 'Role berhasil ditambahkan.');
    }

    protected function validateUser(Request $request, $id = null){

        //data bersifat unik
        $uniqueRule = $id ?
            'unique:role,nama_role,' . $id . ',idrole' :
            'unique:role,nama_role';

        //validasi input
        return $request->validate([
            'nama_role' => [
                'required', 
                'string', 
                'max:255', 
                'min:5', 
                $uniqueRule
            ],
        ], [
            'nama_role.required' => 'Nama Role wajib diisi.',
            'nama_role.string' => 'Nama Role harus berupa teks.',
            'nama_role.max' => 'Nama Role maksimal 255 karakter.',
            'nama_role.min' => 'Nama Role minimal 5 karakter.',
            'nama_role.unique' => 'Nama Role sudah ada.',
        ]);
    }

    protected function createRole(array $data){
        try{
            return User::create([
                'nama_role' => $this->formatNamaRole($data['nama_role']),   
            ]);
        } catch (\Exception $e){
            throw new \Exception('Gagal membuat Role: ' . $e->getMessage());
        }
    }

    protected function formatNamaRole($nama_role){
        return ucwords(strtolower($nama_role));
    }
}
