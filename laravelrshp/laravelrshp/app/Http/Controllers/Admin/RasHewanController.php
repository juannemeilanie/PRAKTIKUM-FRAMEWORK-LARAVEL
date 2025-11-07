<?php

namespace App\Http\Controllers\Admin;

use App\Models\RasHewan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RasHewanController extends Controller
{
    public function index(){
        $rashewan = RasHewan::all();
        return view('admin.ras-hewan.index', compact('rashewan'));
    }
}
