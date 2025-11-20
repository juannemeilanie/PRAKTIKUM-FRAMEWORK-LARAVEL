<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        $users = DB::table('user')->get();
        return view('admin.user.index', compact('users'));
    }

    public function create(){
        return view('admin.user.tambah');
    }

    public function store(Request $request){
        $validatedData = $this->validateUser($request);

        $this->createUser($validatedData);

        return redirect()->route('admin.user.index')
                        ->with('success', 'User berhasil ditambahkan.');
    }

    protected function validateUser(Request $request, $id = null)
    {
        $uniqueRule = $id
            ? 'unique:user,nama,' . $id . ',iduser'
            : 'unique:user,nama';

        return $request->validate([
            'nama' => ['required', 'string', $uniqueRule],
            'email' => ['required', 'email'],
            'password' => $id ? [] : ['required'],
        ], [
            'nama.required' => 'Nama User wajib diisi.',
            'nama.string' => 'Nama User harus berupa teks.',
            'nama.unique' => 'Nama User sudah ada.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password harus diisi saat tambah user.',
        ]);
    }

    protected function createUser(array $data){
        try{
            return DB::table('user')->insert([
                'nama'      => $this->formatNamaUser($data['nama']),
                'email'     => $data['email'],
                'password'  => bcrypt($data['password']),
            ]);
        } catch (\Exception $e){
            throw new \Exception('Gagal menyimpan User: ' . $e->getMessage());
        }
    }

    protected function formatNamaUser($nama){
        return ucwords(strtolower(trim($nama)));
    }

    public function edit($id){
        $users = DB::table('user')->where('iduser', $id)->first();
        return view('admin.user.edit', compact('users'));
    }

    public function update(Request $request, $id){
        $validatedData = $this->validateUser($request, $id);

        $updateData = [
            'nama'  => $this->formatNamaUser($validatedData['nama']),
            'email' => $validatedData['email'],
        ];

        if (!empty($validatedData['password'])) {
            $updateData['password'] = bcrypt($validatedData['password']);
        }

        DB::table('user')->where('iduser', $id)->update($updateData);

        return redirect()->route('admin.user.index')
                        ->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id){
        DB::table('user')->where('iduser', $id)->delete();

        return redirect()->route('admin.user.index')
                        ->with('success', 'User berhasil dihapus.');
    }
}
