<?php

namespace FinanciaSystem\Http\Controllers;

use Illuminate\Http\Request;
use FinanciaSystem\Marca;
use FinanciaSystem\Http\Requests;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas=Marca::all();
        
        return view('Marca.index',['marcas'=>$marcas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Marca.create');
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
            'nombre'=>'required|max:255|unique:Marca,nombre'
            ]);

        $marca=Marca::create([
            'nombre'=>$request->nombre
            ]);

         $request->session()->flash('crear','Se ha creado una nueva marca con exito llamada '.$marca->nombre);

         return redirect('admin/Marca/');
       
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
        
        $marca=Marca::find($id);
        return view('Marca.update',['marca'=>$marca]);
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
            'nombre'=>'required|max:255|unique:Marca,nombre,'.$id
            ]);
        $marca=Marca::find($id);
        $marca->nombre=$request->nombre;
        $request->session()->flash('actualizar','Se ha modificado Marca  con exito llamada '.$marca->nombre);
        $marca->save();


      
        return redirect('admin/Marca/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        
        $marca=Marca::find($id);
         
        $request->session()->flash('eliminar','Se ha Eliminado la Marca con exito llamada '.$marca->nombre);
        $marca->delete();
        return redirect('admin/Marca');
    }
}
