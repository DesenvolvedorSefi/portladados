<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\INSS;

class UserINSSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($nome)

    {
        $users = INSS::where('nome_segurado', $nome)->first();
        return view('user-inss', compact('users'));
    }

  
}
