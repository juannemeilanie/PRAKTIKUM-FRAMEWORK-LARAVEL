<?php

namespace App\Http\Controllers\Admin;

use App\Models\JenisHewan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JenisHewanController extends Controller
{
    public function index(){

        $jenisHewan = JenisHewan::all();
        return view('admin.jenis-hewan.index', compact('jenisHewan'));
    }
}
