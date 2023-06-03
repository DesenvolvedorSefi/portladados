<?php

namespace App\Http\Controllers;

use App\Models\INSS;
use Illuminate\Http\Request;

class INSSController extends Controller
{
    public function index(Request $request)
    {
        // Obter os filtros de UF e Município do request
        $ufFilter = $request->input('uf');
        $municipioFilter = $request->input('municipio');

        // Consultar os registros do INSS com base nos filtros
        $query = INSS::query();

        // Aplicar o filtro de UF, se fornecido
        if ($ufFilter) {
            $query->where('uf', $ufFilter);
        }

        // Aplicar o filtro de Município, se fornecido
        if ($municipioFilter) {
            $query->where('municipio', $municipioFilter);
        }

        // Obter os registros paginados do INSS
        $inss = $query->paginate(25);

        // Obter os UF disponíveis para o filtro
        $ufs = INSS::distinct('uf')->pluck('uf');

        // Obter os municípios disponíveis para o filtro, de acordo com o UF selecionado
        $municipios = [];
        if ($ufFilter) {
            $municipios = INSS::where('uf', $ufFilter)->distinct('municipio')->pluck('municipio');
        } else {
            foreach ($ufs as $uf) {
                $municipios[$uf] = INSS::where('uf', $uf)->distinct('municipio')->pluck('municipio');
            }
        }
        // dd($ufs);

        // Retornar a view com os resultados paginados e os filtros
        return view('inss.index', compact('inss', 'ufFilter', 'municipioFilter', 'ufs', 'municipios'));
    }
}


