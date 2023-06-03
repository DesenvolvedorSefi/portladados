<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\todoscarros;


class Anunciante extends Model
{
    protected $table = 'vendedor';
    use HasFactory;
    public function carros()
    {
        return $this->hasMany(todoscarros::class);
    }
}
