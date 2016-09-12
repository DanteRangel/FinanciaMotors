<?php

namespace FinanciaSystem\Http\Controllers;

use Illuminate\Http\Request;

use FinanciaSystem\Http\Requests;
use FinanciaSystem\tipoVehiculo;
class TipoVehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos=tipoVehiculo::all();
        return view('tipoVehiculo.index',['tipos'=>$tipos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoVehiculo.create');
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
            'tipo'=>'required|string|max:255|unique:tipoVehiculo'
            ]);

        $newTipo=tipoVehiculo::create([
            'tipo'=>$request->tipo
            ]);

        $request->session()->flash('crear','Se ha creado un nuevo tipo de Vehiculo con exito llamado '.$newTipo->tipo);
        return redirect('admin/tipoVehiculo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

     
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo=tipoVehiculo::find($id);
        return view('tipoVehiculo.update',['tipo'=>$tipo]);
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
             $tipoUpdate=tipoVehiculo::find($id);
        $this->validate($request,[
           'tipo'=>'required|string|max:255|unique:tipoVehiculo,tipo,'.$id
        ]);
   

        $tipoUpdate->tipo=$request->tipo;
            $request->session()->flash('actualizar','Se ha modificado el tipo de Vehiculo con exito llamado '.$tipoUpdate->tipo);
        $tipoUpdate->save();
    
        return redirect('admin/tipoVehiculo');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
       

        $tipo=tipoVehiculo::find($id);
         
        $request->session()->flash('eliminar','Se ha Eliminado un  tipo de Vehiculo con exito llamado '.$tipo->tipo);
        $tipo->delete();
        return redirect('admin/tipoVehiculo');
    }
}
