<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pemilik;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PemilikController extends Controller
{
    public function index(){
        $pemilik = Pemilik::with('user')->get();
        return view('admin.pemilik.index', compact('pemilik'));
    }
}
