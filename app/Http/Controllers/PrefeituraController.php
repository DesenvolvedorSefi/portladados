<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prefeitura;

class PrefeituraController extends Controller
{
    public function index(Request $request)
    {
        $uf = $request->input('uf');
        $cidade = $request->input('cidade');

        $query = Prefeitura::query();

        if ($uf) {
            $query->where('UF', $uf);
        }

        if ($cidade) {
            $query->where('CIDADE', $cidade);
        }

        // Adicione a cláusula orderBy para ordenar os resultados pelo nome do prefeito
        $prefeituras = $query->orderBy('NOME_A')->paginate(25);

        $ufs = Prefeitura::select('UF')
            ->where('UF', '<>', 'UF')
            ->distinct()
            ->orderBy('UF')
            ->get();

        $cidades = [];

        if ($uf) {
            $cidades = Prefeitura::select('CIDADE')
                ->where('UF', $uf)
                ->where('CIDADE', '<>', 'CIDADE')
                ->distinct()
                ->orderBy('CIDADE')
                ->get()
                ->pluck('CIDADE', 'CIDADE');
        } else {
            $cidadesByUf = Prefeitura::select('UF', 'CIDADE')
                ->where('CIDADE', '<>', 'CIDADE')
                ->distinct()
                ->orderBy('UF')
                ->orderBy('CIDADE')
                ->get()
                ->groupBy('UF');

            foreach ($cidadesByUf as $ufKey => $cidadeCollection) {
                $cidades[$ufKey] = $cidadeCollection->pluck('CIDADE', 'CIDADE')->toArray();
            }
        }

        return view('prefeituras', compact('prefeituras', 'ufs', 'cidades', 'uf', 'cidade'));
    }
}



    
    

    
    

    

