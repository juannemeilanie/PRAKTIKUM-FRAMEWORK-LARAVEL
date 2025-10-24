<?php

namespace App\Http\Controllers\Admin;

use App\Models\KodeTindakan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KodeTindakanController extends Controller
{
    public function index(){
        $kodetindakan = KodeTindakan::all();
        return view('admin.kode-tindakan.index', compact('kodetindakan'));
    }
}
