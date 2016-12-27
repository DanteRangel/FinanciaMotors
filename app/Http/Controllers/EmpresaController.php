<?php

namespace FinanciaSystem\Http\Controllers;

use Illuminate\Http\Request;

use FinanciaSystem\Http\Requests;
use FinanciaSystem\Empresa;
class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Empresa.index',['empresas'=>Empresa::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre'=>'required|unique:Empresa,nombre',
            'rfc'=>'required',
            'razon_social'=>'required'
            ]);


        $empresa=Empresa::create([
            'nombre'=>$request->nombre,
            'rfc'=>$request->rfc,
            'razon_social'=>$request->razon_social
            ]);

         $request->session()->flash('crear','Se ha creado una nueva empresacon exito llamada '.$empresa->nombre);

         return redirect('admin/Empresa/');
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
        return view('Empresa.update',['empresa'=>Empresa::find($id)]);
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
                $this->validate($request,[
            'nombre'=>'required|unique:Empresa,nombre,'.$id,
            'rfc'=>'required',
            'razon_social'=>'required'
            ]);


        $empresa=Empresa::find($id);
            $empresa->nombre=$request->nombre;
            $empresa->rfc=$request->rfc;
            $empresa->razon_social=$request->razon_social;
            $empresa->save();

         $request->session()->flash('actualizar','Se ha creado una nueva empresa con exito llamada '.$empresa->nombre);

         return redirect('admin/Empresa/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $empresa=Empresa::find($id);

        $request->session()->flash('eliminar','Se ha Eliminado la Empresa con exito llamada '.$empresa->nombre);
        $empresa->delete();
        return redirect('admin/Empresa');

    }

}
