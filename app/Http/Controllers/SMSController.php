<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SMSController extends Controller
{
    public function exibirFormulario(Request $request)
    {
        $numbers = $request->query('numbers'); // Obtém o valor do parâmetro 'numbers' da requisição GET
       
        $formattedNumbers = [];
    
        // Verifica se é uma string com vários números separados por espaço ou vírgula
        if (strpos($numbers, ' ') !== false || strpos($numbers, ',') !== false) {
            $numbers = preg_replace('/[^\d\s,]/', '', $numbers); // Remove caracteres não numéricos, exceto espaço e vírgula
            $numbersArray = preg_split('/[\s,]+/', $numbers); // Separa os números em um array
    
            foreach ($numbersArray as $number) {
                $formattedNumber = $this->formatNumber($number);
                if ($formattedNumber !== null) {
                    $formattedNumbers[] = $formattedNumber;
                }
            }
        } else {
            $formattedNumber = $this->formatNumber($numbers);
            if ($formattedNumber !== null) {
                $formattedNumbers[] = $formattedNumber;
            }
        }
        // dd($this->formatNumber($numbers));
        // dd($formattedNumbers);
        return view('enviar_sms')->with('formattedNumbers', $formattedNumbers);
    }
    
    public function formatNumber($number)
    {
        // Remove caracteres não numéricos
        $number = preg_replace('/[^\d]/', '', $number);
    
        // Verifica se o número possui o formato correto (DDD + Número)
        if (preg_match('/^(55)?(\d{2})(\d{9})$/', $number, $matches)) {
            // Formata o número no padrão 55{ddd}{numero}
            $formattedNumber = '55'.$matches[2] . $matches[3];
            return $formattedNumber;
        }
    
        return null;
    }
    
    public function enviarSMS(Request $request)
    {
        // Validação dos parâmetros obrigatórios
        $request->validate([
            'msisdn' => 'required',
            'sms_text' => 'required',
        ]);
        
        // Construção da URL de envio do SMS
        $url = 'http://sms.capitalmidia.com.br/post/index.php';
        
        // Montagem dos parâmetros da requisição
        $params = [
            'user' => 'agconsultoria.short ',
            'passwd' => '102030',
            'msisdn' => $request->input('msisdn'),
            'sms_text' => $request->input('sms_text'),
        ];
        
        // Envio da requisição HTTP GET
        $response = Http::get($url, $params);
        
        // Verificação da resposta
        if ($response->successful()) {
            return redirect()->back()->with('success', 'SMS enviado com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Erro ao enviar SMS: ' . $response->status() . ' ' . $response->body());
        }
    }
}
