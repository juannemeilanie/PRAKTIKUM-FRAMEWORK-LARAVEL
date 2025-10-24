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
}
