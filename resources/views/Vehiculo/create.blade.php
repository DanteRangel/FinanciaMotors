@extends('layouts.app')

@section('content') 
    <div class="row-fluid">
        <div class="col-md-offset-1 col-md-10 col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-lg-offset-1 col-lg-10"> 
            <form id="crear" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/Vehiculo/') }}">
                <input type="hidden" name="_method" value="POST">
                
              {!! csrf_field() !!}
                <div class="row-fluid">
                    <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre">Nombre</label>
                            <div class="">
                            <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" aria-describedby="usuario-addon" placeholder="Nombre de la Unidad">

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
                                <input type="text" class="form-control" name="anio" value="{{ old('anio') }}" aria-describedby="usuario-addon" placeholder="Ejemplo : 1990">


                            </div>
                            @if ($errors->has('anio'))
                            <span class="help-block">
                                <strong>{{ $errors->first('anio') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    
                </div>
                <div class="row-fluid">
                   <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">

                        <div class="form-group{{ $errors->has('modelo') ? ' has-error' : '' }}">
                            <label for="modelo">Modelo</label>
                            <div class="">
                                <input type="text" class="form-control" name="modelo" value="{{ old('modelo') }}" aria-describedby="usuario-addon" placeholder="Ejemplo : JETTA
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
                                <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" aria-describedby="usuario-addon" placeholder="Ejemplo : AUTENTIQUE , 4 CILINDROS, AUTOMATICO, VIDRIOS ELECTRICOS DEL, ESTEREO, CD 
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
              <div class="row-fluid">
                   <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">

                        <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                            <label for="color">Color</label>
                            <div class="">
                                <input type="text" class="form-control" name="color" value="{{ old('color') }}" aria-describedby="usuario-addon" placeholder="Ejemplo : Blanco
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
                                <input type="number" class="form-control" name="costo" value="{{ old('costo') }}" aria-describedby="usuario-addon" placeholder="123312.00">


                            </div>
                            @if ($errors->has('costo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('costo') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
              </div>

                    <div class="row-fluid">

                   <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">

                        <div class="form-group{{ $errors->has('serie') ? ' has-error' : '' }}">
                            <label for="serie">Serie</label>
                            <div class="">
                                <input type="text" class="form-control" name="serie" value="{{ old('serie') }}" aria-describedby="usuario-addon" placeholder="Ejemplo : 3FALP65L0WM105681
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
                                <input type="number" class="form-control" name="kilometraje" value="{{ old('kilometraje') }}" aria-describedby="usuario-addon" placeholder="120000">


                            </div>
                            @if ($errors->has('kilometraje'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kilometraje') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                        </div> 
                    <div class="row-fluid">
                        <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                        <label for="">Estatus</label>
                            <div class="form-group">
                                    <select class="form-control" name="status" id="status">
                                       
                                        <option value="0">Piso</option>
                                        <option value="1">Transito</option>
                                        
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
                    <div class="row-fluid">
                        <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                        <label for="">Tipo de Vehiculo</label>
                            <div class="form-group">
                                    <select class="form-control" name="tipoVehiculo" id="tipoVehiculo">
                                        @foreach($tipoVehiculos as $tipoV)
                                        <option value="{{$tipoV->id}}">{{$tipoV->tipo}}</option>
                                        @endforeach
                                    </select>
                             
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                           <label for="">Marca</label>
                            <div class="form-group">
                                    <select class="form-control" name="marca" id="marca">
                                        @foreach($marcas as $marca)
                                        <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                                        @endforeach
                                    </select>
                             
                            </div>
                        </div>
                        </div>
                    <div class="row-fluid">
                                            <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                        <label for="">Factura</label>
                            <div class="form-group">
                                    <select class="form-control" name="factura" id="factura">
                                       
                                        <option value="0">Sin Factura</option>
                                        <option value="1">Facturado Original</option>
                                        <option value="2">Facturamos a nombre del Cliente</option>
                                        
                                    </select>
                             
                            </div>
                        </div> 
          
                        <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6 text.center">
                             <br>
                                <button type="button"  onclick="crear()" class="btn btn-dark" ><span>Ingresar</span></button>
                        </div>
                    
                    </div>

            </form>

        </div>
        </div>
                <div id="dialog_crear" title="Alta Vehiculo " style="display:none">
             <p>¿Estas seguro que deseas crear un nuevo Vehiculo? </p>
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


