<?php

namespace FinanciaSystem\Http\Controllers;

use Illuminate\Http\Request;
use FinanciaSystem\Servicios;
use FinanciaSystem\Http\Requests;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicioss=Servicios::all();
        
        return view('Servicios.index',['servicios'=>$servicioss]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Servicios.create');
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
            'nombre'=>'required|max:255|unique:Servicios,nombre'
            ]);

        $servicios=Servicios::create([
            'nombre'=>$request->nombre
            ]);

         $request->session()->flash('crear','Se ha creado un nuevo Serivicio con exito llamada '.$servicios->nombre);

         return redirect('admin/Servicios/');
       
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
        
        $servicios=Servicios::find($id);
        return view('Servicios.update',['servicios'=>$servicios]);
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
            'nombre'=>'required|max:255|unique:Servicios,nombre,'.$id
            ]);
        $servicios=Servicios::find($id);
        $servicios->nombre=$request->nombre;
        $request->session()->flash('actualizar','Se ha modificado el Servicio  con exito llamada '.$servicios->nombre);
        $servicios->save();


      
        return redirect('admin/Servicios/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        
        $servicios=Servicios::find($id);
         
        $request->session()->flash('eliminar','Se ha Eliminado el Servicio con exito llamado '.$servicios->nombre);
        $servicios->delete();
        return redirect('admin/Servicios');
    }
}
