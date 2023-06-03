<?php

namespace App\Http\Controllers;
use App\Models\Carro;
use App\Models\FGTS;
use App\Models\Prefeitura;
use App\Models\INSS;
use Illuminate\Support\Facades\Log;


use Illuminate\Http\Request;

class UserDataController extends Controller
{
    private function isValidPhoneNumber($number)
    {
        // Verifica se o número tem comprimento adequado e consiste apenas em dígitos
        return (strlen($number) >= 10 && strlen($number) <= 11) && ctype_digit($number);
    }

    public function searchUserData($searchQuery)
    {
        $searchQuery = trim($searchQuery);
        $ddd = '';
        $telefone = '';
    
        $hasMoreThanNineCharacters = strlen($searchQuery) > 9;
    
        if ($hasMoreThanNineCharacters && is_numeric($searchQuery)) {
            $ddd = substr($searchQuery, 0, 2);
            $telefone = substr($searchQuery, 2);
        }
    
        $carros = Carro::where('Carro', 'LIKE', "%{$searchQuery}%")
        ->orWhere('Vendedor', 'LIKE', "%{$searchQuery}%")
        ->orWhere(function ($query) use ($searchQuery) {
            $query->whereRaw("Telefone REGEXP ?", ["([[:digit:]]{2})?{$searchQuery}"])
                  ->orWhere('Telefone_Descricao', 'LIKE', "%{$searchQuery}%");
        })
        ->get();
        $inss = INSS::where('FONE1', 'LIKE', "%{$searchQuery}%")
        ->orWhere('FONE2', 'LIKE', "%{$searchQuery}%")
        ->orWhere('FONE3', 'LIKE', "%{$searchQuery}%")
        ->orWhere('FONE4', 'LIKE', "%{$searchQuery}%")
        ->orWhere('nu_CPF', 'LIKE', "%{$searchQuery}%")
        ->orWhereRaw("UPPER(nome_segurado) LIKE ?", ["%".strtoupper($searchQuery)."%"])
        ->paginate(10);

    
        $fgts = Fgts::whereRaw("UPPER(nome) LIKE ?", ["%".strtoupper($searchQuery)."%"])
        ->orWhere('CPF2', 'LIKE', "%{$searchQuery}%")
        ->orWhere('movel1', 'LIKE', "%{$searchQuery}%")
        ->orWhere('movel2', 'LIKE', "%{$searchQuery}%")
        ->orWhere('movel3', 'LIKE', "%{$searchQuery}%")
        ->paginate(10);
        //->get();


    
            $prefeituras = Prefeitura::whereRaw("UPPER(NOME_A) LIKE ?", ["%".strtoupper($searchQuery)."%"])
            ->orWhere('CPF', 'LIKE', "%{$searchQuery}%")
            ->orWhere(function ($query) use ($ddd, $telefone, $searchQuery, $hasMoreThanNineCharacters) {
                if ($hasMoreThanNineCharacters && !empty($ddd) && !empty($telefone)) {
                    $query->where(function ($query) use ($ddd, $telefone) {
                        $query->where('DDD', 'LIKE', "%{$ddd}%")
                            ->where('TEL', 'LIKE', "%{$telefone}%");
                    })
                    ->orWhere(function ($query) use ($ddd, $telefone) {
                        $query->where('DDD2', 'LIKE', "%{$ddd}%")
                            ->where('TEL2', 'LIKE', "%{$telefone}%");
                    })
                    ->orWhere(function ($query) use ($ddd, $telefone) {
                        $query->where('ddd3', 'LIKE', "%{$ddd}%")
                            ->where('telefone3', 'LIKE', "%{$telefone}%");
                    })
                    ->orWhere(function ($query) use ($ddd, $telefone) {
                        $query->where('ddd4', 'LIKE', "%{$ddd}%")
                            ->where('telefone4', 'LIKE', "%{$telefone}%");
                    });
                } else {
                    $query->where(function ($query) use ($searchQuery) {
                        $query->where('TEL', 'LIKE', "%{$searchQuery}%")
                            ->orWhere('TEL2', 'LIKE', "%{$searchQuery}%");
                    });
                }
            })
            ->paginate(10); // limita a 10 resultados por página

    
        return view('user_data', ['carros' => $carros, 'fgts' => $fgts, 'prefeituras' => $prefeituras, 'searchQuery' => $searchQuery,'inss'=>$inss]);
    }
    

    
}
