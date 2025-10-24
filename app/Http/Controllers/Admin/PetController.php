<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PetController extends Controller
{
    public function index(){
        $pets = Pet::all();
        return view('admin.pet.index', compact('pets'));
    }
}
