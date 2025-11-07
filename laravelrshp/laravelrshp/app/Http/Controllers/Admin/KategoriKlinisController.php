<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\KategoriKlinis;
use App\Http\Controllers\Controller;

class KategoriKlinisController extends Controller
{
    public function index(){
        $kategoriklinis = KategoriKlinis::all();
        return view('admin.kategori-klinis.index', compact('kategoriklinis'));
    }
}
