<?php

namespace FinanciaSystem\Http\Controllers;

use Illuminate\Http\Request;
use FinanciaSystem\Cliente;
use FinanciaSystem\prospeccionFecha;
use FinanciaSystem\Persona;
use FinanciaSystem\Prospeccion;
use FinanciaSystem\Http\Requests;
use Validator;
use Storage;
use File;
use Auth;

class ProspeccionController extends Controller
{
	public function create(){
		$clientes=Cliente::all();
		return view('Prospeccion.primera_etapa',['clientes'=>$clientes]);
	}
	public function primera_etapa_guardar(Request $request){
		//return $request->all();
		//return $request->credito['credito_pivot'];
		//return $request->credito;
		$errors=0;

		$validator_errors=array(null,null,null,null,null,null,null);



		/*-----------VALIDACION DE DATOS GENERALES----------*/
		$validator=Validator::make($request->all(),[
			'generales.vehiculo_interes'=>'required|string',
			'generales.precio_ofrecido'=>'required|numeric',
			'generales.medio_por_enterado'=>'required|numeric',
			'generales.tomador_desicion'=>'required|numeric',
			//'credito.*'=>'required'
			]);
		if($validator->fails()){
			$errors++;
			$validator_errors[0]=$validator->errors();
		}/*TERMINA VALIDACION GENERALES*/
		
		/*----------Validacion para el credito---------------*/
		//return $request->credito;
		if($request->credito['credito_pivot']=="true"){

			$validator=Validator::make($request->all(),[
				'credito.plazo'=>'required|numeric',
				'credito.credito'=>'required|numeric',
				'credito.edad_cliente'=>'required|numeric',
				'credito.estado_buro'=>'required|numeric',
				'credito.observaciones_buro'=>'string',
				'credito.ingreso_mensual'=>'required|numeric',
				'credito.comprobante_ingresos'=>'required|numeric'
			]);
			if($validator->fails()){
				$validator_errors[1]=$validator->errors();
				$errors++;	
			} 

			if($request->credito['credito']=="1"){
				$validator=Validator::make($request->all(),[
					'credito.fondeadora'=>'required|string'
				]);
				if($validator->fails()){
					$validator_errors[2]=$validator->errors();
					$errors++;
				} 
			} 
			if($request->credito['comprobante_ingresos']=="1" || $request->credito['comprobante_ingresos']=="2"){
				$numero=(int)$request->credito['comprobante_ingresos'];
				$comprobante_ingresos=['','seguro_social','depositos_estados_cuenta'];
				$validator=Validator::make($request->all(),[
					'credito.'.$comprobante_ingresos[$numero]=>'numeric',
				]);
				if($validator->fails()){
					$validator_errors[3]=$validator->errors();
					$errors++;
				} 
			} 
			
		}
		if($request->check_vehiculo_cuenta=="true"){
			$validator=Validator::make($request->all(),[
				'vehiculo_cuenta.vehiculo_cuenta'=>'required|string',
				'vehiculo_cuenta.version_vehiculo'=>'required|string',
				'vehiculo_cuenta.anio_vehiculo'=>'required|numeric',
				'vehiculo_cuenta.tenencia_vehiculo'=>'required|string',
				'vehiculo_cuenta.verificacion_vehiculo'=>'required|string',
				'vehiculo_cuenta.caracteristicas_vehiculo'=>'required|string',
				'vehiculo_cuenta.kilometraje'=>'required|numeric',
				'vehiculo_cuenta.vehiculo_duenios'=>'required|numeric',
				'vehiculo_cuenta.color_vehiculo'=>'required|string',
				'vehiculo_cuenta.papeles'=>'required|string',
				'vehiculo_cuenta.vehiculo_precio_cuenta'=>'required|numeric',
				'vehiculo_cuenta.guia_autometrica_toma'=>'numeric',
				'vehiculo_cuenta.guia_autometrica_venta'=>'numeric'
				
				
			]);
			if($validator->fails()){
				$errors++;
				$validator_errors[4]=$validator->errors();
			}
		}
		$validator=Validator::make($request->all(),[
			'seguimiento'=>'required|date',
			'accion'=>'required'

		]);

		if($validator->fails()){
			$errors++;
			$validator_errors[5]=$validator->errors();
		}
		if($request->generales['cliente']=="null"){
			$validator_errors[6]=(object)array('generales.cliente'=>array('No has elegido a ningun usuario'));
			$errors++;
		}

		if($errors>0){
		return ['success'=>'1','errors'=>$validator_errors];
		}else{

			$json=array();
			$json['vehiculo_cuenta']=$request->vehiculo_cuenta;
			$json['vehiculo_cuenta']['check_vehiculo_cuenta']=$request->check_vehiculo_cuenta;
			$json['credito']=$request->credito;
			$json['seguimiento']=$request->seguimiento;
			$json['generales']=$request->generales;
			$cliente=$request->generales['cliente'];
			$id_prospeccion=md5(Auth::user()->id.'_'.$cliente.'_'.date("Ymd")).'.json';
			$new_prospeccion=Prospeccion::create([
				'id_cliente'=>$cliente,
				'id_vendedor'=>Auth::user()->id,
				'token_json'=>$id_prospeccion
				]);
			prospeccionFecha::create([
				'id_prospeccion'=>$new_prospeccion->id,
				'fecha'=>$request->seguimiento,
				'accion'=>$request->accion
				]);

			Storage::disk('public')->makeDirectory('/assets/prospeccion');
      		  $url =  '/assets/prospeccion/'.$id_prospeccion;
          	Storage::disk('public')->put($url , json_encode($json,true));
          	  $request->session()->flash('crear','Se ha creado el seguimiento del prospecto');
			return ['success'=>'0','message'=>'Se ha creado el seguimiento del prospecto'];
		}


	}
	public function getOptionCliente(){
		$clientes=Cliente::all();
		$html ='<option value="null">Elige a un cliente para la prospección</option>';
		foreach($clientes as $cliente){
			$html.='<option value="'.$cliente->id.'">'.$cliente->persona->nombre.' '.$cliente->persona->apellidoPaterno.' '.$cliente->persona->apellidoMaterno	.'</option>';
		}
		return $html;
	}
	public function getProspeccion($id){
		$prospeccion=Prospeccion::find($id);

		$json=Storage::disk('public')->get('/assets/prospeccion/'.$prospeccion->token_json);
//return json_decode($json,true);
		return view('Prospeccion.prospeccion_get',['prospeccion'=>(json_decode($json,true)),'database_prospeccion'=>$prospeccion]);
		
	}
	public function dashboard(){
		$prospecciones=Prospeccion::all();
		$calendario=prospeccionFecha::all();
		return view('Prospeccion.dashboard',['prospecciones'=>$prospecciones,'calendario'=>$calendario]);
	}
	public function update(Request $request){
		
		//return $request->all();
		//return $request->credito['credito_pivot'];
		//return $request->credito;
		$errors=0;

		$validator_errors=array(null,null,null,null,null,null,null);



		/*-----------VALIDACION DE DATOS GENERALES----------*/
		$validator=Validator::make($request->all(),[
			'generales.vehiculo_interes'=>'required|string',
			'generales.precio_ofrecido'=>'required|numeric',
			'generales.medio_por_enterado'=>'required|numeric',
			'generales.tomador_desicion'=>'required|numeric',
			//'credito.*'=>'required'
			]);
		if($validator->fails()){
			$errors++;
			$validator_errors[0]=$validator->errors();
		}/*TERMINA VALIDACION GENERALES*/
		
		/*----------Validacion para el credito---------------*/
		//return $request->credito;
		if($request->credito['credito_pivot']=="true"){

			$validator=Validator::make($request->all(),[
				'credito.plazo'=>'required|numeric',
				'credito.credito'=>'required|numeric',
				'credito.edad_cliente'=>'required|numeric',
				'credito.estado_buro'=>'required|numeric',
				'credito.observaciones_buro'=>'string',
				'credito.ingreso_mensual'=>'required|numeric',
				'credito.comprobante_ingresos'=>'required|numeric'
			]);
			if($validator->fails()){
				$validator_errors[1]=$validator->errors();
				$errors++;	
			} 

			if($request->credito['credito']=="1"){
				$validator=Validator::make($request->all(),[
					'credito.fondeadora'=>'required|string'
				]);
				if($validator->fails()){
					$validator_errors[2]=$validator->errors();
					$errors++;
				} 
			} 
			if($request->credito['comprobante_ingresos']=="1" || $request->credito['comprobante_ingresos']=="2"){
				$numero=(int)$request->credito['comprobante_ingresos'];
				$comprobante_ingresos=['','seguro_social','depositos_estados_cuenta'];
				$validator=Validator::make($request->all(),[
					'credito.'.$comprobante_ingresos[$numero]=>'required|numeric',
				]);
				if($validator->fails()){
					$validator_errors[3]=$validator->errors();
					$errors++;
				} 
			} 
			
		}
		if($request->check_vehiculo_cuenta=="true"){
			$validator=Validator::make($request->all(),[
				'vehiculo_cuenta.vehiculo_cuenta'=>'required|string',
				'vehiculo_cuenta.version_vehiculo'=>'required|string',
				'vehiculo_cuenta.anio_vehiculo'=>'required|numeric',
				'vehiculo_cuenta.tenencia_vehiculo'=>'required|string',
				'vehiculo_cuenta.verificacion_vehiculo'=>'required|string',
				'vehiculo_cuenta.caracteristicas_vehiculo'=>'required|string',
				'vehiculo_cuenta.kilometraje'=>'required|numeric',
				'vehiculo_cuenta.vehiculo_duenios'=>'required|numeric',
				'vehiculo_cuenta.color_vehiculo'=>'required|string',
				'vehiculo_cuenta.papeles'=>'required|string',
				'vehiculo_cuenta.vehiculo_precio_cuenta'=>'required|numeric',
				
				
			]);
			if($validator->fails()){
				$errors++;
				$validator_errors[4]=$validator->errors();
			}
		}
		$validator=Validator::make($request->all(),[
			'seguimiento'=>'date',
			'accion'=>'required'

		]);

		if($validator->fails()){
			$errors++;
			$validator_errors[5]=$validator->errors();
		}
		if($request->generales['cliente']=="null"){
			$validator_errors[6]=(object)array('generales.cliente'=>array('No has elegido a ningun usuario'));
			$errors++;
		}

		if($errors>0){
		return ['success'=>'1','errors'=>$validator_errors];
		}else{

			$json=array();
			$json['vehiculo_cuenta']=$request->vehiculo_cuenta;
			$json['vehiculo_cuenta']['check_vehiculo_cuenta']=$request->check_vehiculo_cuenta;
			$json['credito']=$request->credito;
			$json['seguimiento']=$request->seguimiento;
			$json['generales']=$request->generales;
			$cliente=$request->generales['cliente'];
			$id_prospeccion=$request->archivo_prospeccion;
			 
			prospeccionFecha::create([
				'id_prospeccion'=>$request->id_prospeccion,
				'fecha'=>$request->seguimiento,
				'accion'=>$request->accion
				]);
			
			Storage::disk('public')->makeDirectory('/assets/prospeccion');
      		  $url =  '/assets/prospeccion/'.$id_prospeccion;
          	Storage::disk('public')->put($url , json_encode($json,true));
          	  $request->session()->flash('crear','Se ha actualizado el seguimiento del prospecto');
			return ['success'=>'0','message'=>'Se ha actualizado el seguimiento del prospecto'];
		}


	
	}
}
