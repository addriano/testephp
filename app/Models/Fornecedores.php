<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fornecedores extends Model
{
    protected $fillable = [
        'id_empresa',
        'nome',
        'documento',
    ];

    public function telefones()
    {
        return $this->hasMany('App\Models\Telefone', 'id_fornecedor');
    }
    public function empresa()
    {
        return $this->belongsTo('App\Models\Empresa', 'id_empresa', 'id');
    }
}
