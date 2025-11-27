<?php

namespace App\Http\Controllers\Resepsionis;

use App\Models\Pet;
use App\Models\Pemilik;
use App\Models\RasHewan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ResepsionisPetController extends Controller
{
    public function index(){
        $pets = DB::table('pet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->join('ras_hewan', 'pet.idras_hewan', '=', 'ras_hewan.idras_hewan')
            ->select(
                'pet.idpet',
                'pet.nama as nama_pet',
                'pet.tanggal_lahir',
                'pet.warna_tanda',
                'pet.jenis_kelamin',
                'user.nama as nama_pemilik',
                'ras_hewan.nama_ras'
            )
            ->get();
        return view('resepsionis.pet.index', compact('pets'));
    }

    public function create(){
        return view('resepsionis.pet.registrasi_pet', [
            'pemilik' => Pemilik::all(),
            'rashewan' => RasHewan::all(),
            'pets' => Pet::with(['pemilik','rasHewan'])->get(),
        ]);
    }

    public function store(Request $request){
        $validatedData = $this->validatePet($request);

        $pet = $this->createPet($validatedData);

        return redirect()->route('resepsionis.pet.index')
                        ->with('success', 'Pet berhasil ditambahkan.');
    }

    protected function validatePet(Request $request, $id = null){
        $uniqueRule = $id
            ? 'unique:pet,nama,' . $id . ',idpet'
            : 'unique:pet,nama';

        return $request->validate([
            'nama' =>[
                'required',
                'string',
                $uniqueRule
            ],
            'tanggal_lahir' =>[
                'required',
                'date'
            ],
            'warna_tanda' =>[
                'required',
                'string'
            ],
            'jenis_kelamin' =>[
                'required',
                'string'
            ],
            'idpemilik' => [
                'required', 
                'exists:pemilik,idpemilik'
            ],
            'idras_hewan' =>[
                'required',
                'exists:ras_hewan,idras_hewan'
            ],
        ]);
    }

    protected function createPet(array $data){
        try{
            return Pet::create([
                'nama' => $this->formatNamaPet($data['nama']),
                'tanggal_lahir' => $data['tanggal_lahir'],
                'warna_tanda' => $data['warna_tanda'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'idpemilik' => $data['idpemilik'],
                'idras_hewan' => $data['idras_hewan'],
            ]);
        } catch (\Exception $e){
            throw new \Exception('Gagal menyimpan data pet: ' . $e->getMessage());
        }
    }

    public function edit($id){
        $pet = Pet::findOrFail($id);

        return view('resepsionis.pet.edit', [
            'pet' => $pet,
            'pemilik' => Pemilik::all(),
            'rashewan' => RasHewan::all(),
        ]);
    }

    public function update(Request $request, $id){
        $pet = Pet::findOrFail($id);

        $validatedData = $this->validatePet($request, $id);

        $pet->update([
            'nama' => $this->formatNamaPet($validatedData['nama']),
            'tanggal_lahir' => $validatedData['tanggal_lahir'],
            'warna_tanda' => $validatedData['warna_tanda'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'idpemilik' => $validatedData['idpemilik'],
            'idras_hewan' => $validatedData['idras_hewan'],
        ]);

        return redirect()->route('resepsionis.pet.index')
                        ->with('success', 'Pet berhasil diupdate.');
    }

    public function destroy($id){
        $pet = Pet::findOrFail($id);
        $pet->delete();

        return redirect()->route('resepsionis.pet.index')
                        ->with('success', 'Pet berhasil dihapus.');
    }

    protected function formatNamaPet($nama){
        return trim(ucwords(strtolower($nama)));
    }
}
