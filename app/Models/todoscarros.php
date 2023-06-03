<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vendedor;

class todoscarros extends Model
{
    protected $table = 'vendedores';

    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class, 'vendedor');
    }

    public function orderByQtdCarros()
    {
        return $this->orderByDesc('qtd_carros');
    }
 
}
