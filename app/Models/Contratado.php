<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pessoa;

class Contratado extends Model
{
    use HasFactory;

    protected $primaryKey = 'idContratado';

   protected $fillable = [
        'descricaoServico', 'dtContratacaoContratado', 'dtDesligamentoContratado', 'idPessoa'
    ];

}
