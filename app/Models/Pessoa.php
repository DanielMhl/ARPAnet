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

<<<<<<< HEAD
=======
    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'idPessoa');
    }
>>>>>>> 12e8f08b438c59654a4494737688bccc040bc125
}
