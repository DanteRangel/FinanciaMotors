@extends('layouts.app')

@section('content') 
    <div class="row-fluid">
        <div class="col-md-offset-1 col-md-10 col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-lg-offset-1 col-lg-10"> 
            <form id="modificar" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/Vehiculo/'.$vehiculo->id) }}">
                <input type="hidden" name="_method" value="PUT">
                
              {!! csrf_field() !!}
                <div class="row">
                    <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre">Nombre</label>
                            <div class="">
                            <input type="text" class="form-control" name="nombre" value="{{ $vehiculo->nombre }}" aria-describedby="usuario-addon" placeholder="Nombre de la Unidad">

                            </div>
                            @if ($errors->has('nombre'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">

                        <div class="form-group{{ $errors->has('anio') ? ' has-error' : '' }}">
                            <label for="anio">Año</label>
                            <div class="">
                                <input type="text" class="form-control" name="anio" value="{{ $vehiculo->anio }}" aria-describedby="usuario-addon" placeholder="Ejemplo : 1990">


                            </div>
                            @if ($errors->has('anio'))
                            <span class="help-block">
                                <strong>{{ $errors->first('anio') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    
                </div>
                <div class="row">
                   <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">

                        <div class="form-group{{ $errors->has('modelo') ? ' has-error' : '' }}">
                            <label for="modelo">Modelo</label>
                            <div class="">
                                <input type="text" class="form-control" name="modelo" value="{{ $vehiculo->modelo }}" aria-describedby="usuario-addon" placeholder="Ejemplo : JETTA
">


                            </div>
                            @if ($errors->has('modelo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('modelo') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                   <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">

                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <label for="descripcion">Descripción</label>
                            <div class="">
                                <input type="text" class="form-control" name="descripcion" value="{{ $vehiculo->descripcion }}" aria-describedby="usuario-addon" placeholder="Ejemplo : AUTENTIQUE , 4 CILINDROS, AUTOMATICO, VIDRIOS ELECTRICOS DEL, ESTEREO, CD 
">


                            </div>
                            @if ($errors->has('descripcion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('descripcion') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
              </div>
              <div class="row">
                   <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">

                        <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                            <label for="color">Color</label>
                            <div class="">
                                <input type="text" class="form-control" name="color" value="{{ $vehiculo->color }}" aria-describedby="usuario-addon" placeholder="Ejemplo : Blanco
">


                            </div>
                            @if ($errors->has('color'))
                            <span class="help-block">
                                <strong>{{ $errors->first('color') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                   <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">

                        <div class="form-group{{ $errors->has('costo') ? ' has-error' : '' }}">
                            <label for="costo">Costo</label>
                            <div class="">
                                <input type="number" class="form-control" name="costo" value="{{$vehiculo->costo }}" aria-describedby="usuario-addon" placeholder="123312.00">


                            </div>
                            @if ($errors->has('costo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('costo') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
              </div>

                    <div class="row">

                   <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">

                        <div class="form-group{{ $errors->has('serie') ? ' has-error' : '' }}">
                            <label for="serie">Serie</label>
                            <div class="">
                                <input type="text" class="form-control" name="serie" value="{{ $vehiculo->serie }}" aria-describedby="usuario-addon" placeholder="Ejemplo : 3FALP65L0WM105681
">


                            </div>
                            @if ($errors->has('serie'))
                            <span class="help-block">
                                <strong>{{ $errors->first('serie') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                                           <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">

                        <div class="form-group{{ $errors->has('kilometraje') ? ' has-error' : '' }}">
                            <label for="kilometraje">Kilometraje</label>
                            <div class="">
                                <input type="number" class="form-control" name="kilometraje" value="{{ $vehiculo->kilometraje }}" aria-describedby="usuario-addon" placeholder="120000">


                            </div>
                            @if ($errors->has('kilometraje'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kilometraje') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                        </div> 
                    <div class="row">
                        <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                        <label for="">Estatus</label>
                            <div class="form-group">
                                    <select class="form-control" name="status" id="status">
                                       
                                        <option @if( $vehiculo->status==0) selected @endif value="0">Piso</option>
                                        <option @if( $vehiculo->status==1) selected @endif value="1">Transito</option>
                                        
                                    </select>
                             
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                        <label for="">Trasnimisión</label>
                            <div class="form-group">
                                    <select class="form-control" name="transmision" id="transmision">
                                       
                                        <option value="0">Estandar</option>
                                        <option value="1">Automático</option>
                                        
                                    </select>
                             
                            </div>
                        </div>
                        </div>             
                    <div class="row">
                        <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                        <label for="">Tipo de Vehiculo</label>
                            <div class="form-group">
                                    <select class="form-control" name="tipoVehiculo" id="tipoVehiculo">
                                        @foreach($tipoVehiculos as $tipoV)
                                        <option @if($vehiculo->id_tipoVehiculo == $tipoV->id) selected @endif value="{{$tipoV->id}}">{{$tipoV->tipo}}</option>
                                        @endforeach
                                    </select>
                             
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                           <label for="">Marca</label>
                            <div class="form-group">
                                    <select class="form-control" name="marca" id="marca">
                                        @foreach($marcas as $marca)
                                        <option @if($vehiculo->id_marca == $marca->id) selected @endif value="{{$marca->id}}">{{$marca->nombre}}</option>
                                        @endforeach
                                    </select>
                             
                            </div>
                        </div>
                        </div>
                    <div class="row">
                                            <div class="col-offset-md-6 col-md-6 col-xs-12 col-lg-6 col-sm-6">
                        <label for="">Factura</label>
                            <div class="form-group">
                                    <select class="form-control" name="factura" id="factura">
                                       
                                        <option @if($vehiculo->factura == 0) selected @endif value="0">Sin Factura</option>
                                        <option @if($vehiculo->factura == 1) selected @endif value="1">Facturado Original</option>
                                        <option @if($vehiculo->factura == 2) selected @endif value="2">Facturamos a nombre del Cliente</option>
                                        
                                    </select>
                             
                            </div>
                        </div> 
                        <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                            <div>
                                        &nbsp;
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

        </div>
        </div>



    <form  action="{{url('admin/Vehiculo/'.$vehiculo->id)}}" class="form-horizontal" role="form" method="POST" id="eliminar">

                        {!! csrf_field() !!}

                        <input type="hidden" name="_method" value="DELETE">
  
</form>
    <div id="dialog_actualizar" title="Actualizar  Vehiculo {{$vehiculo->serie}}" style="display:none">
             <p>¿Estas seguro que deseas Modificar el Vehiculo {{$vehiculo->serie}} ? </p>
</div>
   <div id="dialog_eliminar" title="Eliminar Vehiculo {{$vehiculo->serie}}" style="display:none">
                   <p>¿Estas seguro que deseas Eliminar al Vehiculo  {{$vehiculo->serie}} ? </p>
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
