<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'nome_fantasia',
        'cnpj',
        'id_estado'
    ];
}
