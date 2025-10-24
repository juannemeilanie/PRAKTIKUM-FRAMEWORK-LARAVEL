<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function index(){
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }
}
