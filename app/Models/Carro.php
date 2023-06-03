<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Carro extends Model
{
    protected $table = 'carro_olx';
    protected $primaryKey = 'indice';
    public $timestamps = false;
    protected $fillable = [
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
        'status'
    ];

    public static function testarLinks()
    {
        $carros = self::all();

        $contador = 0;

        foreach ($carros as $carro) {
            $ch = curl_init($carro->Link);
            curl_setopt($ch, CURLOPT_NOBODY, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_exec($ch);
            $response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($response_code == 200) {
                $carro->status = true;
                $carro->save();
                $contador++;
            } else {
                $carro->status = false;
                $carro->save();
            }
        }

        return $contador;
    }
}