<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthContract;

class Usuario extends Model implements AuthContract
{
    use HasFactory, Authenticatable;
    
    protected $table = 'usuarios';

    protected $fillable = [
        'usuario',
        'senha',
    ];

    protected $hidden = [
        'senha',
    ];

    public function getAuthPassword() {
        return $this->senha;
    }
}
