<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FGTS;

class UserFGTSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($nome)
    {
        $fgt = FGTS::where('nome', $nome)->first();

        return view('user-fgts', compact('fgt'));
    }

}
