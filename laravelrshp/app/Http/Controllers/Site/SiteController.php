<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home(){
        return view('site.home');
    }

    public function struktur(){
        return view('struktur');
    }
    public function layanan(){
        return view('layanan');
    }
    public function visimisi(){
        return view('visimisi');
    }

    public function login(){
        return view('login');
    }
    
}