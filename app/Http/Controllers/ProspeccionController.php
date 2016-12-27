<?php

namespace FinanciaSystem\Http\Controllers;

use Illuminate\Http\Request;
use FinanciaSystem\Cliente;
use FinanciaSystem\Persona;
use FinanciaSystem\Http\Requests;

class ProspeccionController extends Controller
{
    public function primera_etapa(){
    	$clientes=Cliente::all();
    	return view('Prospeccion.primera_etapa',['clientes'=>$clientes]);
    }
    public function getOptionCliente(){
		$clientes=Cliente::all();
    	$html ='<option value="null">Elige a un cliente para la prospección</option>';
                foreach($clientes as $cliente){
                    $html.='<option value="'.$cliente->id.'">'.$cliente->persona->nombre.' '.$cliente->persona->apellidoPaterno.' '.$cliente->persona->apellidoMaterno	.'</option>';
                }
        return $html;
    }
}
