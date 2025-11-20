<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RoleUserController extends Controller
{
    public function index(){
        $roleUser = DB::table('role_user')
        ->join('user', 'role_user.iduser', '=', 'user.iduser')
        ->join('role', 'role_user.idrole', '=', 'role.idrole')
        ->select(
            'role_user.*',
            'user.nama',
            'role.nama_role'
        )
        ->get();
        return view('admin.user-role.index', compact('roleUser'));
    }

    public function create(){
        $users = User::all();
        $roles = Role::all();

        return view('admin.user-role.tambah', compact('users', 'roles'));
    }

    public function store(Request $request){
        $request->validate([
            'iduser' => 'required|exists:user,iduser',
            'idrole' => 'required|exists:role,idrole'
        ]);

        RoleUser::create([
            'iduser' => $request->iduser,
            'idrole' => $request->idrole,
            'status' => 1
        ]);

        return redirect()->route('admin.user-role.index')
                        ->with('success', 'Role berhasil diberikan ke user.');
    }

    public function edit($id){
        $roleUser = RoleUser::findOrFail($id);
        $users = User::all();
        $roles = Role::all();

        return view('admin.user-role.edit', compact('roleUser', 'users', 'roles'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'iduser' => 'required|exists:user,iduser',
            'idrole' => 'required|exists:role,idrole',
            'status' => 'required|in:0,1'
        ]);

        $roleUser = RoleUser::findOrFail($id);

        $roleUser->update([
            'iduser' => $request->iduser,
            'idrole' => $request->idrole,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.user-role.index')
                        ->with('success', 'Role user berhasil diperbarui');
    }

    public function destroy($id){
        RoleUser::destroy($id);

        return redirect()->route('admin.user-role.index')
                        ->with('success', 'Role user berhasil dihapus.');
    }
}
