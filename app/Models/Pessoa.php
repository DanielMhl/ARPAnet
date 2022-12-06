<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomePessoa',
        'tipoPessoa',
        'cpfPessoa',
        'cnpjPessoa',
        'telefonePessoa',
    ];

    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'idPessoa');
    }
}
