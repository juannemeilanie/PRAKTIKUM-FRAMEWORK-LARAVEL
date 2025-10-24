<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KodeTindakan extends Model
{
    protected $table = 'kode_tindakan_terapi';
    protected $primaryKey = 'idkode_tindakan_terapi';
    public $timestamps = false;
    protected $fillable = [
        'kode', 
        'deskripsi_tindakan_terapi',
        'idkategori',
        'idkategori_klinis'];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'idkategori', 'idkategori');
    }

    public function kategoriKlinis(){
        return $this->belongsTo(KategoriKlinis::class, 'idkategori_klinis', 'idkategori_klinis');
    }
}