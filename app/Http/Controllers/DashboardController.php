<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use App\Models\Carro;
use DateTime;
use Carbon\Carbon;
class DashboardController extends Controller
{    
    public function testarLinksCarroOlx()
    {
        $carros = Carro::all();
    
        foreach ($carros as $carro) {
            $status = $this->testarLink($carro->Link);
    
            $carro->status = $status;
            $carro->save();
        }
    

    }
    
    private function testarLink($link)
    {
        $ch = curl_init($link);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
        curl_close($ch);
    
        if ($httpCode >= 200 && $httpCode < 300) {
            return true;
        } else {
            return false;
        }
    }
    public function quantidadeLinksOnline() {
       
        $quantidade_links_online = Carro::where('status', true)->count();
        
        return $quantidade_links_online;
    }
    public function index()
{
    // Test all links for online status
    // $this->testarLinksCarroOlx();

    // Retrieve data for the chart
    $carros_por_dia = Carro::selectRaw('Dia, COUNT(*) as total')
                            ->groupBy('Dia')
                            ->orderBy('Dia', 'desc')
                            ->take(30)
                            ->get();

    $carros_por_semana = Carro::selectRaw('YEARWEEK(Dia) as data, COUNT(*) as total')
                                ->groupBy('data')
                                ->orderBy('data', 'desc')
                                ->take(12)
                                ->get();

    $carros_por_mes = Carro::selectRaw('YEAR(Dia) as ano, MONTH(Dia) as mes, COUNT(*) as total')
                                ->groupBy('ano', 'mes')
                                ->orderBy('ano', 'desc')
                                ->orderBy('mes', 'desc')
                                ->take(12)
                                ->get();

    // Count the number of online links
    $quantidadeLinksOnline = Carro::where('status', true)->count();

    // Pass the data to the view
    return view('dashboard', compact('carros_por_dia', 'carros_por_semana', 'carros_por_mes', 'quantidadeLinksOnline'));
}
    
    
}
