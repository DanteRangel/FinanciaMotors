<?php

namespace FinanciaSystem\Http\Controllers;

use Illuminate\Http\Request;
use FinanciaSystem\Vendedor;

use FinanciaSystem\Persona;
use FinanciaSystem\Permiso;
use FinanciaSystem\Http\Requests;
use Storage;
use Mail;
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
            'id_permiso'=>$request->permiso,
            'status'=>1
            ]);
        Storage::disk('public')->makeDirectory('/assets/profile/'.$user->id);
        $url =  '/assets/profile/'.$user->id.'/'.$nombreImagen;
          Storage::disk('public')->put($url , file_get_contents($request->file('imagen_user')->getRealPath()));

 
        $user->clave_vendedor='V-'.$user->id;


  $request->session()->flash('crear','Se ha creado un nuevo usuario con su clave '.$user->clave_vendedor);
        $user->save();

        Mail::send('layouts.mail_user_create',['user'=>$user,'password'=>$request->password] , function($message) use ($request){
			//remitente
        	$message->from(env('MAIL_USERNAME'), 'Has sido dado de alta en FinanciaMotorsSystem '.$request->nombre.' '.$request->apellidoPaterno.' '.$request->apellidoMaterno);

//asunto
        	$message->subject('Tu usuario esta dado de alta.');

//receptor
        	$message->to($request->correo, $request->nombre.' '.$request->apellidoPaterno.' '.$request->apellidoMaterno);

        });




  


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

$vendedor=Vendedor::find($id);
         //    return $request->all();
        $this->validate($request,[
            'nombre'=>'required|string',
            'apellidoPaterno'=>'required|string',
            'apellidoMaterno'=>'required|string',
            'correo'=>'required|string|unique:Persona,correo,'.$vendedor->id_persona,
            'telefono_cel'=>'numeric',
            'telefono_otro'=>'numeric',
            'password' => 'min:6|confirmed',
            'permiso'=>'required|numeric',
            'imagen_user'=>'image',
            'status'=>'required'

            ]);


           
$persona=Persona::find($vendedor->id_persona);            
$persona->nombre=$request->nombre;
$persona->apellidoPaterno=$request->apellidoPaterno;
$persona->apellidoMaterno=$request->apellidoMaterno;
$persona->correo=$request->correo;
$persona->telefono_cel=$request->telefono_cel;
$persona->telefono_otro=$request->telefono_otro;
$persona->save();
if($request->password!=null){
    $vendedor->password=bcrypt($request->password);
}
if($request->imagen_user!=null){
    

                $nombreImagen= $request->file('imagen_user')->getClientOriginalName();
        if(Storage::disk('public')->exists('/assets/profile/'.$vendedor->id)){
            Storage::disk('public')->delete('/assets/profile/'.$vendedor->id.'/'.$vendedor->img_src);
        
        }else{
        Storage::disk('public')->makeDirectory('/assets/profile/'.$vendedor->id);
            
        }
        
        $url =  '/assets/profile/'.$vendedor->id.'/'.$nombreImagen;
          Storage::disk('public')->put($url , file_get_contents($request->file('imagen_user')->getRealPath()));
          $vendedor->img_src=$nombreImagen;

}


$vendedor->status=$request->status;
$vendedor->id_permiso=$request->permiso;

$request->session()->flash('actualizar','Se ha modificado el usuario con clave '.$vendedor->clave_vendedor);
$vendedor->save();

      
        return redirect('admin/Vendedor/');
        //if($request->password!=)
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $vendedor=Vendedor::find($id);
         
        $request->session()->flash('eliminar','Se ha dado de baja al Vendedor con exito. Clave '.$vendedor->clave_vendedor);

        $vendedor->status=-1;
        $vendedor->save();
        return redirect('admin/Vendedor');
    }
}
