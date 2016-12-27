<?php

namespace FinanciaSystem\Http\Controllers;

use Illuminate\Http\Request;
use FinanciaSystem\Persona;
use FinanciaSystem\Http\Requests;
use FinanciaSystem\Empresa;
use FinanciaSystem\Cliente;
use Validator;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('Cliente.index',['clientes'=>Cliente::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Cliente.create',['empresas'=>Empresa::all() ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //return $request->all();   //    return $request->all();
        $validator=Validator::make($request->all(),[
            'nombre'=>'required|string',
            'apellidoPaterno'=>'required|string',
            'apellidoMaterno'=>'required|string',
            'correo'=>'email|required|string|unique:Persona,correo',
            'telefono_cel'=>'numeric',
            'telefono_otro'=>'numeric' 

            ]);
        if($validator->fails()){
                        return ['success'=>'1','errors'=>$validator->errors()];

}else{
  
     $persona=Persona::create([
                'nombre'=>$request->nombre,
                'apellidoPaterno'=>$request->apellidoPaterno,
                'apellidoMaterno'=>$request->apellidoMaterno,
                'telefono_cel'=>$request->telefono_cel,
                'telefono_otro'=>$request->telefono_otro,
                'correo'=>$request->correo
                
            ]);
     $id_empresa=NULL;
     if($request->pivot_empresa=="true"){
            $id_empresa=$request->empresa;
     }else{
            $id_empresa=NULL;
     }
     $cliente=Cliente::create([
        'id_persona'=>$persona->id,
        'id_empresa'=>$id_empresa
        ]);
 
     $cliente->clave_cliente='CFM-'.$cliente->id;
     $request->session()->flash('crear','Se ha creado un nuevo cliente con su clave '.$cliente->clave_cliente);
    
     $cliente->save();


         //return redirect('admin/Cliente/');
        return ['success'=>'0','url'=>'admin/Cliente','message'=>'Se ha creado un nuevo cliente con su clave '.$cliente->clave_cliente];
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente=Cliente::find($id);
        $empresas=Empresa::all();
        return view('Cliente.update',['cliente'=>$cliente,'empresas'=>$empresas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente=Cliente::find($id);
                $this->validate($request,[
            'nombre'=>'required|string',
            'apellidoPaterno'=>'required|string',
            'apellidoMaterno'=>'required|string',
            'correo'=>'required|string|unique:Persona,correo,'.$cliente->id_persona,
            'telefono_cel'=>'numeric',
            'telefono_otro'=>'numeric' 

            ]);
        $persona=Persona::find($cliente->id_persona);            
$persona->nombre=$request->nombre;
$persona->apellidoPaterno=$request->apellidoPaterno;
$persona->apellidoMaterno=$request->apellidoMaterno;
$persona->correo=$request->correo;
$persona->telefono_cel=$request->telefono_cel;
$persona->telefono_otro=$request->telefono_otro;
$persona->save();
 $id_empresa=NULL;
     if($request->pivot_empresa=="true"){
            $id_empresa=$request->empresa;
     }else{
            $id_empresa=NULL;
     }
     $cliente->id_empresa=$id_empresa; 

$request->session()->flash('actualizar','Se ha modificado el Cliente con clave '.$cliente->clave_cliente);
$cliente->save();

      
        return redirect('admin/Cliente/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $cliente=Cliente::find($id);
        $request->session()->flash('eliminar','Se ha dado de baja al Cliente con exito. Clave '.$cliente->clave_cliente); 
        $cliente->delete();

         return redirect('admin/Cliente/');
    }
    public function selectEmpresa(){

        $empresas=Empresa::all();
        $html='<div class="form-group"><label for="empresa">Empresa</label><select class="form-control" id="empresa" name="empresa" >';
        foreach ($empresas as $key => $empresa) {
            $html.="<option value='".$empresa->id."'>".$empresa->nombre."</option>";
        }
        $html.="</select></div>";
        return $html;
    }

    public function formContado(){
         return response()->view('Cliente.form_contado')->header('Content-Type', 'text/html; charset=UTF-8');
    }
}
