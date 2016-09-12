@extends('layouts.app')

@section('content') 
<div class="row">
    <div class="col-md-offset-1 col-md-10 col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-lg-offset-1 col-lg-10"> 
        <form id="modificar" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/Vendedor/'.$vendedor->id) }}" enctype="multipart/form-data"> 
            <input type="hidden" name="_method" value="PUT">

            {!! csrf_field() !!}
    <div class="row">
    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12 profile-left">
        <div class="profile_img">
                     <img class="img-responsive avatar-view" src="{{asset('assets/profile/'.$vendedor->id.'/'.$vendedor->img_src)}}" alt="Avatar" title="Change the avatar">
 
  
    </div>
    </div>
    <div class="col-md-9 col-sm-9 col-lg-9 col-xs-12">
            <div class="row">
                <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                    <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                        <label for="nombre">Nombre</label>
                        <div class="">
                            <input type="text" class="form-control" name="nombre" value="{{ $vendedor->persona->nombre }}" aria-describedby="usuario-addon" placeholder="Nombre Usuario">

                        </div>
                        @if ($errors->has('nombre'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                    <div class="form-group{{ $errors->has('apellidoPaterno') ? ' has-error' : '' }}">
                        <label for="apellidoPaterno">Apellido Paterno</label>
                        <div class="">
                            <input type="text" class="form-control" name="apellidoPaterno" value="{{ $vendedor->persona->apellidoPaterno }}" aria-describedby="usuario-addon" placeholder="Apellido Paterno del Usuario">

                        </div>
                        @if ($errors->has('apellidoPaterno'))
                        <span class="help-block">
                            <strong>{{ $errors->first('apellidoPaterno') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

            </div>       
            <div class="row">
                <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                    <div class="form-group{{ $errors->has('apellidoMaterno') ? ' has-error' : '' }}">
                        <label for="apellidoMaterno">Apellido Materno</label>
                        <div class="">
                            <input type="text" class="form-control" name="apellidoMaterno" value="{{ $vendedor->persona->apellidoMaterno }}" aria-describedby="usuario-addon" placeholder="Apellido Materno del Usuario">

                        </div>
                        @if ($errors->has('apellidoMaterno'))
                        <span class="help-block">
                            <strong>{{ $errors->first('apellidoMaterno') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                    <div class="form-group{{ $errors->has('correo') ? ' has-error' : '' }}">
                        <label for="correo">Correo Electrónico</label>
                        <div class="">
                            <input type="text" class="form-control" name="correo" id="correo" value="{{ $vendedor->persona->correo }}" aria-describedby="usuario-addon" placeholder="Correo Electrónico del Usuario">

                        </div>
                        @if ($errors->has('correo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('correo') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>



            </div>
            <div class="row">
                <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                    <div class="form-group{{ $errors->has('telefono_cel') ? ' has-error' : '' }}">
                        <label for="telefono_cel">Telefono Celular</label>
                        <div class="">
                            <input type="text" class="form-control" name="telefono_cel" value="{{ $vendedor->persona->telefono_cel }}" aria-describedby="usuario-addon" placeholder="Telefono Celular del Usuario">

                        </div>
                        @if ($errors->has('telefono_cel'))
                        <span class="help-block">
                            <strong>{{ $errors->first('telefono_cel') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                <div class="form-group{{ $errors->has('telefono_otro') ? ' has-error' : '' }}">
                <label for="telefono_otro">Otro Telefono</label>
                        
                        <input type="text" class="form-control" name="telefono_otro" value="{{ $vendedor->persona->telefono_otro }}" aria-describedby="usuario-addon" placeholder="Otro Telefono">
 
                        @if ($errors->has('telefono_otro'))
                        <span class="help-block">
                        <strong>{{ $errors->first('telefono_otro') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>


            </div>
            <div class="row" >
                                  <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                  <label for="imagen_user">Cambiar Imagen de Perfil</label>
                <div class="form-group {{ $errors->has('imagen_user') ? ' has-error' : '' }}">
                        <input  name="imagen_user" id="imagen_user"  type="file" class="form-control filestyle input-opcion banner-input " data-buttonText="Busca Imagen"> 
             @if ($errors->has('imagen_user'))
                        <span class="help-block">
                            <strong>{{ $errors->first('imagen_user') }}</strong>
                        </span>
                        @endif
                      </div>
                      </div>
                <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                    <label for="">Tipo de Vendedor</label>
                    <div class="form-group">
                        <select class="form-control" name="permiso" id="permiso">
                            @foreach($permisos as $permiso)
                            <option @if($permiso->id == $vendedor->id_permiso) selected @endif value="{{$permiso->id}}">{{$permiso->nombre}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                </div>
                </div>


            
</div>
 
               <div class="row">
                       <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                                <label for="">&nbsp;</label>
                                <button type="button" style="width:80% !important; margin-left:4% !important ;margin-right:4%!important;" onclick="modificar()" class="btn btn-dark" ><span>Modificar</span></button>
                            </div>
                                <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                                <button type="button" style="width:80% !important; margin-left:4% !important ;margin-right:4%!important;"  onclick="eliminar()" class="btn btn-danger" ><span>Eliminar</span></button>
                            </div>
                      
       
                    </div>

        </form>
                                <div class="row" id="contrasenia" style="display:none;">
            <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">


                    <label class="control-label">Contraseña</label>

                    <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}"  placeholder="Contraseña">


            
                       @if ($errors->has('password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                </div> 
            </div>
            <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">

                <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">


                    <label class="control-label">Confirmar Contraseña</label>

                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"  value="{{ old('password_confirmation') }}"placeholder="Confirma Contraseña">

       @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
    </div>
</div>


    <form  action="{{url('admin/Vendedor/'.$vendedor->id)}}" class="form-horizontal" role="form" method="POST" id="eliminar">

                        {!! csrf_field() !!}

                        <input type="hidden" name="_method" value="DELETE">
  
</form>
    <div id="dialog_actualizar" title="Actualizar  vendedor {{$vendedor->clave_vendedor}}" style="display:none">
             <p>¿Estas seguro que deseas Modificar al vendedor {{$vendedor->clave_vendedor}} ? </p>
</div>
   <div id="dialog_eliminar" title="Eliminar vendedor {{$vendedor->clave_vendedor}}" style="display:none">
                   <p>¿Estas seguro que deseas Eliminar al vendedor  {{$vendedor->clave_vendedor}} ? </p>
</div>
@endsection
@section('js')
    <script>
        function modificar(){                 
$("#dialog_actualizar").dialog({
  buttons: [
    {
      text: "Si",
      click: function() {

 
            $('#modificar').submit();

            $( this ).dialog( "close" );
    
      }
    },{
      text:"No",
      click:function(){
            $( this ).dialog( "close" );

      }


    }
  ]
});
        }
          function eliminar(){
                 $("#dialog_eliminar").dialog({
  buttons: [
    {
      text: "Si",
      click: function() {

 
            $('#eliminar').submit();

            $( this ).dialog( "close" );
    
      }
    },{
      text:"No",
      click:function(){
            $( this ).dialog( "close" );

      }


    }
  ]
});
        }
        </script>
    @endsection