<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Associado extends Model
{
    use HasFactory;

    protected $primaryKey = 'idAssociado';

    protected $fillable = [
        'dtAssociacaoAssociado', 'dtDesligamentoAssociado', 'idPessoa'
    ];
}
