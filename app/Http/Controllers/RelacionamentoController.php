<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Relacionamento;

class RelacionamentoController extends Controller
{
    public function index()
    {
        $relationships = Relacionamento::paginate(20);

        return view('relacionamento.index', compact('relationships'));
    }

    public function edit($id)
    {
        $relationship = Relacionamento::findOrFail($id);

        // Obter a lista de clientes
        $clientes = Relacionamento::select('cliente')->distinct()->get();
        $clientes_json = $clientes->pluck('cliente')->toJson();
        return view('relacionamento.edit', compact('relationship', 'clientes_json'));
    }
    public static function getClientes()
    {
        return Relacionamento::select('cliente')->distinct()->get();
    }

    public function update(Request $request, $id)
    {
        $relationship = Relacionamento::findOrFail($id);

        $relationship->cliente = $request->input('cliente');
        $relationship->facebook = $request->input('facebook', false);
        $relationship->whatsapp = $request->input('whatsapp', false);
        $relationship->sms = $request->input('sms', false);
        $relationship->email = $request->input('email', false);
        $relationship->pessoal = $request->input('pessoal', false);
        $relationship->data_tentativa = $request->input('data_tentativa');

        $relationship->save();

         // Inserir na tabela log_tentativa
        $log = new \App\Models\LogTentativa();
        $log->tentativa_facebook = $request->input('facebook', false);
        $log->tentativa_whatsapp = $request->input('whatsapp', false);
        $log->tentativa_sms = $request->input('sms', false);
        $log->tentativa_email = $request->input('email', false);
        $log->tentativa_pessoal = $request->input('pessoal', false);
        $log->data_tentativa = $request->input('data_tentativa');
        $log->save();

        return redirect()->route('relacionamento.index');
    }
}
