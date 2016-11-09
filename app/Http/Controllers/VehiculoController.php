<?php

namespace FinanciaSystem\Http\Controllers;

use Illuminate\Http\Request;
use FinanciaSystem\Vehiculo;
use FinanciaSystem\Marca;
use FinanciaSystem\tipoVehiculo;

use FinanciaSystem\Http\Requests;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $vehiculos=Vehiculo::all();


        return view('Vehiculo.index',['vehiculos'=>$vehiculos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas=Marca::all();
        $tipoVehiculos=tipoVehiculo::all();
        return view('Vehiculo.create',['tipoVehiculos'=>$tipoVehiculos,'marcas'=>$marcas]);
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
            'nombre'=>'required|max:255',
            'anio'=>'required|numeric',
            'modelo'=>'required|max:255',
            'descripcion'=>'required',
            'color'=>'required|string',
            'costo'=>'required|numeric',
            'serie'=>'required|unique:Vehiculo,serie',
            'kilometraje'=>'required|numeric',
            'transmision'=>'required',
            'tipoVehiculo'=>'required',
            'marca'=>'required',
            'status'=>'required',
             'factura'=>'required',
             'precio'=>'required',

            ]);


        $vehiculo=Vehiculo::create([
            'nombre'=>$request->nombre,
            'anio'=>$request->anio,
            'modelo'=>$request->modelo,
            'descripcion'=>$request->descripcion,
            'color'=>$request->color,
            'costo'=>$request->costo,
            'serie'=>$request->serie,
            'factura'=>$request->factura,
            'kilometraje'=>$request->kilometraje,
            'transmision'=>$request->transmision,
            'id_tipoVehiculo'=>$request->tipoVehiculo,
            'id_marca'=>$request->marca,
            'status'=>$request->status,
            'precio'=>$request->precio
            ]);
                $request->session()->flash('crear','Se ha creado un  Vehiculo con exito. Serie : '.$vehiculo->serie);
        return redirect('admin/Vehiculo');
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

        $marcas=Marca::all();
        $tipoVehiculos=tipoVehiculo::all();
        $vehiculo=Vehiculo::find($id);
        return view('Vehiculo.update',['vehiculo'=>$vehiculo,'tipoVehiculos'=>$tipoVehiculos,'marcas'=>$marcas]);
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
        $vehiculo=Vehiculo::find($id);
 $this->validate($request,[
            'nombre'=>'required|max:255',
            'anio'=>'required|numeric',
            'modelo'=>'required|max:255',
            'descripcion'=>'required',
            'color'=>'required|string',
            'costo'=>'required|numeric',
            'serie'=>'required|unique:mysql.Vehiculo,serie,'.$id,
            'kilometraje'=>'required|numeric',
            'transmision'=>'required',
            'tipoVehiculo'=>'required',
            'marca'=>'required',
            'status'=>'required',
             'factura'=>'required',
             'precio'=>'required'

            ]);

            $vehiculo->nombre=$request->nombre;
            $vehiculo->anio=$request->anio;
            $vehiculo->modelo=$request->modelo;
            $vehiculo->descripcion=$request->descripcion;
            $vehiculo->color=$request->color;
            $vehiculo->costo=$request->costo;
            $vehiculo->serie=$request->serie;
            $vehiculo->factura=$request->factura;
            $vehiculo->kilometraje=$request->kilometraje;
            $vehiculo->transmision=$request->transmision;
            $vehiculo->id_tipoVehiculo=$request->tipoVehiculo;
            $vehiculo->id_marca=$request->marca;
            $vehiculo->status=$request->status;
            $vehiculo->precio=$request->precio;
            $vehiculo->save();
            

    $request->session()->flash('actualizar','Se ha modiificado el  Vehiculo con exito. Serie : '.$vehiculo->serie);
        return redirect('admin/Vehiculo');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
                $vehiculo=Vehiculo::find($id);
         
        $request->session()->flash('eliminar','Se ha Eliminado el Vehiculo con exito. Serie : '.$vehiculo->serie);
        $vehiculo->delete();
        return redirect('admin/Vehiculo');
    }
}
