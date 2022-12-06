<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'ufEndereco',
        'logradouroEndereco',
        'cidadeEndereco',
        'bairroEndereco',
        'numeroEndereco',
        'cepEndereco',
        'complementoEndereco',
        'idPessoa',
    ];

    // public function pessoa()
    // {
    //     return $this->belongsTo(Pessoa::class, 'idPessoa');
    // }
}
