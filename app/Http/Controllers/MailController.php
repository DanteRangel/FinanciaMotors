<?php

namespace FinanciaSystem\Http\Controllers;

use Illuminate\Http\Request;

use FinanciaSystem\Http\Requests;
use Mail;
use FinanciaSystem\prospeccionFecha;

class MailController extends Controller
{
    

	public function send(Request $request){
 		$data = $request->all();
 		$prosepccion_hoy=prospeccionFecha::where('fecha',date('Y-m-d'))->get();
 		//return $hoy->prospeccion->vendedor->persona->correo;	

//return $prosepccion_hoy[0]->prospeccion;
 		foreach($prosepccion_hoy as $prospeccion){
 			//echo $prospeccion->prospeccion->cliente->persona->nombre.' '.$prospeccion->prospeccion->cliente->persona->apellidoPaterno.' '.$prospeccion->prospeccion->cliente->persona->apellidoMaterno.'<br>';
 			Mail::send('layouts.email_template', ['prospeccion'=>$prospeccion], function($message) use ($request,$prospeccion){
			//remitente
				$message->from(env('MAIL_USERNAME'), 'Sistema de Seguimiento a '.$prospeccion->prospeccion->cliente->persona->nombre.' '.$prospeccion->prospeccion->cliente->persona->apellidoPaterno.' '.$prospeccion->prospeccion->cliente->persona->apellidoMaterno);

			//asunto
				$message->subject('Seguimiento de prospeccion programada');

			//receptor
				$message->to($prospeccion->prospeccion->vendedor->persona->correo, $prospeccion->prospeccion->vendedor->persona->nombre.' '.$prospeccion->prospeccion->vendedor->persona->apellidoPaterno.' '.$prospeccion->prospeccion->vendedor->persona->apellidoMaterno);

			});

 		}	 
/*
		
		return 1;
	
*/
	}
}
