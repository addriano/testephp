<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $fillable = [
        'numero',
        'id_fornecedor',
    ];
    
    public function fornededor()
    {
        return $this->belongsTo('App\Models\Fornecedores');
    }
}
