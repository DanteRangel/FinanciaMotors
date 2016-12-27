<?php

namespace FinanciaSystem\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use FinanciaSystem\Http\Requests;
use FinanciaSystem\Vehiculo;
use FinanciaSystem\Servicios_Vehiculos;
use FinanciaSystem\Servicios;
class Servicios_VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos=Vehiculo::all();

        return view('Servicios_Vehiculo.index',['vehiculos'=>$vehiculos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $validator=Validator::make($request->all(),[
                'vehiculo'=>'required',
                'servicio'=>'required',
                'fecha'=>'required',
                'costo'=>'required'
                ]);

if($validator->fails()){ 

                return ['success'=>'1','errors'=>$validator->errors()];

}else{
                    $servicio_vehiculos=Servicios_Vehiculos::create([
                        'id_servicio'=>$request->servicio,
                        'id_vehiculo'=>$request->vehiculo,
                        'costo'=>$request->costo,
                        'fecha'=>$request->fecha
                        ]);
   $request->session()->flash('crear','Se ha creado con exito el servicio');
                    
                     return ['success'=>'0','url'=>url('admin/Servicios_for_Vehiculo/'.$request->vehiculo.'/setServicios')];
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
    public function destroy(Request $request,$id)
    { 
        $servicio_vehiculos=Servicios_Vehiculos::find($id);
        $servicio_vehiculos->delete();
        $request->session()->flash('eliminar','Se ha eliminado con exito el servicio');
        return redirect(url('admin/Servicios_for_Vehiculo/'.$request->vehiculo.'/setServicios'));
    }

    public function setServicios(Request $request,$id){
        $servicios=Servicios::all();
        $vehiculo=Vehiculo::find($id); 
        return view('Vehiculo.setServicios',['vehiculo'=>$vehiculo,'servicios'=>$servicios]);
    }
}
