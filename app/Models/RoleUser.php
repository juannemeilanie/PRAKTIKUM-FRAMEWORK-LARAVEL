<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoleUser extends Pivot
{
    protected $table = 'role_user';
    protected $primaryKey = 'idrole_user';
    
    protected $fillable = ['iduser', 'idrole'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'iduser', 'iduser');
    }
    public function role() : BelongsTo {
        return $this->belongsTo(Role::class, 'idrole', 'idrole');
    }
}