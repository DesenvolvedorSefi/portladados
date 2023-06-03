<?php

namespace App\Http\Controllers;
use App\Models\Inicial;
use Illuminate\Http\Request;

class InicialController extends Controller
{
    public function index(){
        $carros=Inicial::all();
        return view('welcome',['carros'=>$carros,'tipo'=>gettype($carros)]);
    }
}
