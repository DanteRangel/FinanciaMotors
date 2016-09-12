@extends('layouts.app')

@section('content') 
<div class="row">
    <div class="col-md-offset-1 col-md-10 col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-lg-offset-1 col-lg-10"> 
        <form id="crear" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/Vendedor/') }}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="POST">

            {!! csrf_field() !!}

            <div class="row">
                <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                    <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                        <label for="nombre">Nombre</label>
                        <div class="">
                            <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" aria-describedby="usuario-addon" placeholder="Nombre Usuario">

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
                            <input type="text" class="form-control" name="apellidoPaterno" value="{{ old('apellidoPaterno') }}" aria-describedby="usuario-addon" placeholder="Apellido Paterno del Usuario">

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
                            <input type="text" class="form-control" name="apellidoMaterno" value="{{ old('apellidoMaterno') }}" aria-describedby="usuario-addon" placeholder="Apellido Materno del Usuario">

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
                            <input type="text" class="form-control" name="correo" id="correo" value="{{ old('correo') }}" aria-describedby="usuario-addon" placeholder="Correo Electrónico del Usuario">

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
                            <input type="text" class="form-control" name="telefono_cel" value="{{ old('telefono_cel') }}" aria-describedby="usuario-addon" placeholder="Telefono Celular del Usuario">

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
                        
                        <input type="text" class="form-control" name="telefono_otro" value="{{ old('telefono_otro') }}" aria-describedby="usuario-addon" placeholder="Otro Telefono">
 
                        @if ($errors->has('telefono_otro'))
                        <span class="help-block">
                        <strong>{{ $errors->first('telefono_otro') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>


            </div>
                    <div class="row">
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
 
            <div class="row">
                                  <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                  <label for="imagen_user">Imagen Perfil</label>
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
                            <option value="{{$permiso->id}}">{{$permiso->nombre}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                </div>
 <div class="row">
           
                <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6 text.center">
                    <br>
                    <button type="button"  onclick="crear()" class="btn btn-dark" ><span>Ingresar</span></button>
                </div>

            </div>

        </form>

    </div>
</div>
<div id="dialog_crear" title="Alta Usuario " style="display:none">
    <p>¿Estas seguro que deseas crear un nuevo Usuario? </p>
</div>
@endsection


@section('js')

<script>

    function crear(){
        $("#dialog_crear").dialog({
            buttons: [
            {
                text: "Si",
                click: function() {


                    $('#crear').submit();

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


