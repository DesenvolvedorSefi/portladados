<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Relacionamento extends Model
{
    use HasFactory;
    protected $table = 'relacionamento';
    protected $fillable = [
        'cliente',
        'facebook',
        'whatsapp',
        'sms',
        'email',
        'pessoal',
        'tentativa_facebook',
        'tentativa_whatsapp',
        'tentativa_sms',
        'tentativa_email',
        'tentativa_pessoal',
        'data_tentativa'
    ];
    public $timestamps = false; 
}
