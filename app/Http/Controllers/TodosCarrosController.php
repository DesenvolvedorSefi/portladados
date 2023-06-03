<?php

namespace App\Http\Controllers;
use App\Models\todoscarros;
use Illuminate\Http\Request;
use App\Models\Carro;

class TodosCarrosController extends Controller
{public function index(Request $request)
    {
        // Buscar todos os vendedores de Carro que correspondem aos filtros
        $carrosQuery = Carro::query();
        
        // Filtrar por telefone ou telefone_descricao se o parâmetro "telefone" for verdadeiro
        if ($request->has('telefone') && $request->telefone == 'true') {
            $carrosQuery->where(function ($subquery) {
                $subquery->where('Telefone', '<>', 'nan')
                    ->where('Telefone', '<>', '')
                    ->orWhere(function ($subquery2) {
                        $subquery2->where('Telefone_Descricao', '<>', 'nan')
                            ->where('Telefone_Descricao', '<>', '');
                    });
            });
        }
    
        // Filtrar por origem FB
        if ($request->has('origem') && $request->origem != '') {
            $carrosQuery->where('Origem', $request->origem);
        }
    
        $carros = $carrosQuery->get();
        
        // Obter vendedores únicos de todoscarros correspondentes aos vendedores de Carro
        $vendedoresCarro = $carros->pluck('Vendedor')->toArray();
        $vendedoresTodosCarros = todoscarros::distinct()->whereIn('vendedor', $vendedoresCarro)->pluck('vendedor')->toArray();
        $vendedores = array_unique(array_merge($vendedoresCarro, $vendedoresTodosCarros));
    
        // Buscar todos os carros de todoscarros correspondentes aos vendedores únicos
        $todosCarros = todoscarros::whereIn('vendedor', $vendedores)->latest('data_contratacao')->paginate(10);
    
        return view('todoscarros', ['carros' => $todosCarros]);
    }
    
    
    
    
    
    
    
//Com essa alteração, a função index irá buscar todos os vendedores de Carro e de todoscarros, unir em um único array e buscar os carros correspondentes aos vendedores com base nos critérios de filtro. Note que a ordenação por data_contratacao não é mais aplicável, já que Carro não possui esse atributo.






  
}
