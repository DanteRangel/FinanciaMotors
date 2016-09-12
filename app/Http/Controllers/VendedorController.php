<?php

namespace FinanciaSystem\Http\Controllers;

use Illuminate\Http\Request;
use FinanciaSystem\Vendedor;

use FinanciaSystem\Persona;
use FinanciaSystem\Permiso;
use FinanciaSystem\Http\Requests;
use Storage;
class VendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendedores=Vendedor::all();
        return view('Vendedor.index',['vendedores'=>$vendedores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permisos=Permiso::all();
        return view('Vendedor.create',['permisos'=>$permisos]);
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
            'telefono_otro'=>'numeric',
            'password' => 'required|min:6|confirmed',
            'permiso'=>'required|numeric',
            'imagen_user'=>'required|image'

            ]);


        $persona=Persona::create([
                'nombre'=>$request->nombre,
                'apellidoPaterno'=>$request->apellidoPaterno,
                'apellidoMaterno'=>$request->apellidoMaterno,
                'telefono_cel'=>$request->telefono_cel,
                'telefono_otro'=>$request->telefono_otro,
                'correo'=>$request->correo
                
            ]);

          $nombreImagen= $request->file('imagen_user')->getClientOriginalName();
           
        $user=Vendedor::create([
            'id_persona'=>$persona->id,
            'password'=>bcrypt($request->password),
            'img_src'=>$nombreImagen,
            'id_permiso'=>$request->permiso
            ]);
        Storage::disk('public')->makeDirectory('/assets/profile/'.$user->id);
        $url =  '/assets/profile/'.$user->id.'/'.$nombreImagen;
          Storage::disk('public')->put($url , file_get_contents($request->file('imagen_user')->getRealPath()));


        $Vendedor=Vendedor::find($user->id);
        $Vendedor->clave_vendedor='V-'.$user->id;

  $request->session()->flash('crear','Se ha creado un nuevo usuario con su clave '.$Vendedor->clave_vendedor);
        $Vendedor->save();





  


         return redirect('admin/Vendedor/');
       

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
        $vendedor=Vendedor::find($id);
        $permisos=Permiso::all();
        return view('Vendedor.update',['permisos'=>$permisos,'vendedor'=>$vendedor]);
    
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
}
