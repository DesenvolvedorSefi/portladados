<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Carro;

class TestarLinksCarroOlx extends Command
{
    protected $signature = 'testar-links:carro-olx';
    protected $description = 'Testa todos os links dos carros OLX e atualiza o status';

    public function handle()
    {
        $carros = Carro::all();

        foreach ($carros as $carro) {
            $status = $this->testarLink($carro->Link);
            $carro->status = $status;
            $carro->save();
        }

        $this->info('Links testados e status atualizado com sucesso!');
    }

    private function testarLink($link)
    {
        $ch = curl_init($link);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $httpCode >= 200 && $httpCode < 400;
    }
}
