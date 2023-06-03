<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prefeitura;

class UserPrefeituraController extends Controller
{
    public function show($nome)
    {
        $prefeitura = Prefeitura::where('NOME_A', $nome)->first();

        return view('user-prefeitura', compact('prefeitura'));
    }
}
