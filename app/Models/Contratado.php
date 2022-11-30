<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pessoa;

class Contratado extends Model
{
    use HasFactory;

   protected $fillable = [
        'idContratdo', 'dtContratacaoContratado', 'dtDesligamentoContratado', 'idPessoa'
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'idPessoa');
    }
}
