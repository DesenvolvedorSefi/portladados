<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogTentativa extends Model
{
    use HasFactory;

    protected $table = 'log_tentativa';
    protected $fillable = [
        'tentativa_facebook',
        'tentativa_whatsapp',
        'tentativa_sms',
        'tentativa_email',
        'tentativa_pessoal',
        'data_tentativa'
    ];
    public $timestamps = false;
}
