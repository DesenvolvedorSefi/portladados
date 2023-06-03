<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $table = 'vendedores';
    protected $primaryKey = 'indice';
    protected $fillable = [
        'vendedor',
        'qtd_carros',
        'data_contratacao'
    ];

}
