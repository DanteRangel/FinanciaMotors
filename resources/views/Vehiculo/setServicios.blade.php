@extends('layouts.app')

@section('content') 
    <div class="row-fluid">
        <div class="col-md-offset-1 col-md-10 col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-lg-offset-1 col-lg-10"> 
            <form id="modificar" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/Vehiculo/'.$vehiculo->id) }}">
                <input type="hidden" name="_method" value="PUT">
                
              {!! csrf_field() !!}
                <div class="row-fluid">
                    <div class="table-responsive">
                        <table class="table table-hover" width="100%">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Año</th>
                          <th>Modelo</th> 
                          <th>Color</th>
                          <th>Tipo Vehiculo</th>
                          <th>Marca</th>
                          <th>Serie</th>

                          <th>Descripción</th>
                          <th>Kilomentraje</th>
                          <th>Status</th>
                          <th>Factura </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>{{ $vehiculo->nombre }}</td>
                          <td>{{ $vehiculo->anio }}</td>
                          <td>{{ $vehiculo->modelo }}</td>

                          <td>{{ $vehiculo->color }}</td>

                          <td>{{$vehiculo->tipoVehiculo->tipo}}</td>
                          <td>{{$vehiculo->marca->nombre}}</td>
                          <td>{{ $vehiculo->serie }}</td>

                          <td>{{ $vehiculo->descripcion }}</td>
                          <td>{{ $vehiculo->kilometraje }} km</td>
                          <td> @if( $vehiculo->status==0) Piso @elseif($vehiculo->status==1) Trasnisto @endif</td>
                          <td>
                                    @if($vehiculo->factura == 0) Sin Factura @elseif($vehiculo->factura == 1) Facturado Original  @elseif($vehiculo->factura == 2)Facturamos a nombre del Cliente @endif  
                          </td>
                    
                        </tr>
                        
                      </tbody>
                    </table>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><br><br><i class="fa fa-car"></i>
                          </div>
                          <div class="count"><i class="fa fa-dollar"></i>{{number_format($vehiculo->costo,2)}}</div>
<br><br>
                          <h3>Costo del Vehiculo</h3>
                          <p>Lorem ipsum psdea itgum rixt.</p>
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
