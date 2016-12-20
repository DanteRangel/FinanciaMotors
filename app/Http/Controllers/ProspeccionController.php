<?php

namespace FinanciaSystem\Http\Controllers;

use Illuminate\Http\Request;

use FinanciaSystem\Http\Requests;

class ProspeccionController extends Controller
{
    public function primera_etapa(){
    	return view('Prospeccion.primera_etapa');
    }
}
