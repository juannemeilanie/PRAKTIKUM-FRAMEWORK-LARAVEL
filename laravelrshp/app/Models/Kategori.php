<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'idkategori';
    public $timestamps = false;
    protected $fillable = ['nama_kategori'];

    public function kodeTindakan(){
        return $this->belongsTo(KodeTindakan::class, 'idkategori', 'idkategori');
    }


}