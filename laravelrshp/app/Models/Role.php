<?php
namespace App\Models;

use App\Models\RoleUser;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'idrole';
    protected $fillable = ['nama_role'];

    public function user(){
        return $this->belongsToMany(User::class, 'role_user', 'idrole', 'iduser')
                    ->using(RoleUser::class);
    }

    // public function user(){
    //     return $this->hasMany(User::class, 'iduser', 'iduser');
    // }
}
