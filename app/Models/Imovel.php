<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    
    protected $table = 'imovel';

    protected $fillable = [
        'indice',
        'Origem',
        'Carro',
        'Vendedor',
        'Dia',
        'Hora',
        'Telefone',
        'Telefone_Descricao',
        'Preço',
        'Cidade',
        'CEP',
        'Descricao',
        'Link',
        'status',
        'cliente',
        'nomeiki',
    ];
    
    use HasFactory;
}
