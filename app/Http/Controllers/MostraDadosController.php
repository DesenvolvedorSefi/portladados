<?php

namespace App\Http\Controllers;
use App\Models\MostraDados;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use App\Models\Imovel;
use App\Models\Prefeitura;
use App\Models\FGTS;
use App\Models\INSS;
use Illuminate\Pagination\Paginator;

// //Load Composer's autoloader
// require 'vendor/autoload.php';

class MostraDadosController extends Controller
{
    public function moverDados()
{
    // Copiar dados da tabela carro_olx para a tabela imovel
    $carros = MostraDados::all();
    foreach ($carros as $carro) {
        $imovel = new Imovel;
        $imovel->Origem = $carro->Origem;
        $imovel->Imovel = $carro->Carro;
        $imovel->Vendedor = $carro->Vendedor;
        $imovel->Dia = $carro->Dia;
        $imovel->Hora = $carro->Hora;
        $imovel->Telefone = $carro->Telefone;
        $imovel->Telefone_Descricao = $carro->Telefone_Descricao;
        $imovel->Preço = $carro->Preço;
        $imovel->Cidade = $carro->Cidade;
        $imovel->CEP = $carro->CEP;
        $imovel->Descricao = $carro->Descricao;
        $imovel->Link = $carro->Link;
        $imovel->status = $carro->status;
        $imovel->cliente = $carro->cliente;
        $imovel->nomeiki = $carro->nomeiki;
        $imovel->save();
    }

    // Apagar dados da tabela carro_olx
    MostraDados::truncate();

    return redirect()->back();
}
public function index(Request $request)
{
    $vendedor = $request->query('nome');
    $resultado = MostraDados::where('Vendedor', $vendedor)->orderByDesc('Dia')->paginate(10);
    $vendedor = $resultado->isEmpty() ? '' : $resultado[0]->Vendedor;
    $origem = $resultado->isEmpty() ? '' : $resultado[0]->Origem;
    $telefone = $resultado->isEmpty() ? '' : $resultado[0]->Telefone;
    $cidade = $resultado->isEmpty() ? '' : $resultado[0]->Cidade;

    // Manipulação do número de telefone para remover pontos ou converter em string
    $telefone_edit = preg_replace('/\D/', '', $telefone);

    // Manipulação adicional se necessário
    if (strlen($telefone_edit) > 9) {
        $telefone_edit = substr($telefone_edit, -9);
    }
    $prefeituras = Prefeitura::where(function ($query) use ($telefone_edit) {
        if (!empty($telefone_edit) && $telefone_edit !== 'NaN') {
            $query->whereRaw("SUBSTRING(TEL, -9) LIKE '%{$telefone_edit}%'")
                ->orWhereRaw("SUBSTRING(TEL2, -9) LIKE '%{$telefone_edit}%'")
                ->orWhereRaw("SUBSTRING(telefone3, -9) LIKE '%{$telefone_edit}%'")
                ->orWhereRaw("SUBSTRING(telefone4, -9) LIKE '%{$telefone_edit}%'");
        } else {
            // Caso o telefone_edit seja vazio ou "NaN", retorna uma condição falsa para não retornar nenhum resultado
            $query->whereRaw("1 = 0");
        }
    });
    
    $prefeiturasResult = $prefeituras->get();
    
    $prefeiturasPaginadas = $prefeiturasResult->isEmpty() ? [] : $prefeituras->paginate(1);


    if (is_numeric($telefone)) {
        $fgts = FGTS::where(function ($query) use ($telefone) {
            $query->where('movel1', 'LIKE', "%{$telefone}%")
                ->orWhere('movel2', 'LIKE', "%{$telefone}%")
                ->orWhere('movel3', 'LIKE', "%{$telefone}%");
        })->paginate(1);
    } else {
        $fgts = FGTS::whereRaw('1 = 0')->paginate(1);
    }
    
    if (is_numeric($telefone)) {
        $inss = INSS::where(function ($query) use ($telefone) {
            $query->where('FONE2', 'LIKE', "%{$telefone}%")
                ->orWhere('FONE3', 'LIKE', "%{$telefone}%")
                ->orWhere('FONE4', 'LIKE', "%{$telefone}%");
        })->paginate(1);
    } else {
        $inss = INSS::whereRaw('1 = 0')->paginate(1);
    }

    return view('mostradados', [
        'resultado' => $resultado,
        'vendedor' => $vendedor,
        'origem' => $origem,
        'telefone' => $telefone,
        'cidade' => $cidade,
        'prefeituras' => $prefeituras,
        'fgts' => $fgts,
        'inss' => $inss
    ]);
}







    
   
}
