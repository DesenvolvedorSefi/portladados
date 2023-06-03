<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FGTS extends Model
{
    protected $table = 'fgts';
  
    use HasFactory;

    protected $fillable = [
        'bairro',
        'cbo',
        'cep',
        'cidade',
        'cnae',
        'cnpj',
        'complemento',
        'CPF2',
        'email1',
        'endereco',
        'fixo1',
        'fixo2',
        'fixo3',
        'movel1',
        'movel2',
        'movel3',
        'nasc',
        'nome',
        'nome_mae',
        'numero',
        'pis',
        'saldo',
        'sexo',
        'uf'
    ];
}
