<?php

namespace FinanciaSystem\Http\Controllers;

use Illuminate\Http\Request;

use FinanciaSystem\Http\Requests;
use FinanciaSystem\Empresa;
use FinanciaSystem\Cliente;
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
            //    return $request->all();
        $this->validate($request,[
            'nombre'=>'required|string',
            'apellidoPaterno'=>'required|string',
            'apellidoMaterno'=>'required|string',
            'correo'=>'required|string|unique:Persona,correo',
            'telefono_cel'=>'numeric',
            'telefono_otro'=>'numeric' 

            ]);

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function selectEmpresa(){

        $empresas=Empresa::all();
        $html='<div class="form-group"><label for="empresa">Empresa</label><select class="form-control id="empresa" name="empresa" >';
        foreach ($empresas as $key => $empresa) {
            $html.="<option value='".$empresa->id."'>".$empresa->nombre."</option>";
        }
        $html.="</select></div>";
        return $html;
    }
}
