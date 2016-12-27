@extends('layouts.app')

@section('content')
<div class="container">
<div class="row-fluid">

<div class="col-md-offset-1 col-sm-offset-1 col-lg-offset-1 col-md-10 col-xs-12 col-sm-10 col-lg-10">    <button class="btn btn-dark" style="width:100% !important" onclick="window.location.href='{{url('admin/Ventas/create')}}';">Crear un nuevo Usuario</button>
</div>
</div>

    <div class="row-fluid">
        <div class="col-md-offset-1 col-sm-offset-1 col-lg-offset-1 col-md-10 col-xs-12 col-sm-10 col-lg-10">
                <div class="row">
                  <div class="x_panel">
                                         
                      <div class="x_content">
               
                        <br>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr> 

                                <td align="left">Cliente</td>
                                <td align="left">Vendedor</td> 
                                <td align="left">Fecha</td> 
                                <td align="left">Precio Venta</td>

                                <td align="left">Costro del Vehiculo</td> 
                                <td align="left">Costro de los Servicio</td> 
                                <td align="left">Vehiculo</td> 

                                                               
 
                                <td align="center">Modificar</td>
                                <td align="center">Eliminar</td>



                            </tr>
                          </thead>
                          <tbody>

                            @foreach($ventas as $venta)
                            <tr valign="center">

                                <td valign="center"><a href="">{{$venta->cliente->persona->nombre.' '.$venta->cliente->persona->apellidoPaterno.' '.$venta->cliente->persona->apellidoMaterno}}</a></td>
                                <td valign="center"><a href="">{{$venta->vendedor->persona->nombre.' '.$venta->vendedor->persona->apellidoPaterno.' '.$venta->vendedor->persona->apellidoMaterno}}</a></td>

                                <td valign="center">{{$venta->fecha_compra}}</td>
                                <td valign="center"><h5><a href="{{url('admin/Servicios_for_Vehiculo/'.$venta->id_vehiculo.'/setServicios')}}">${{number_format($venta->precio_venta,2)}}</a></h5></td>
                                <td valign="center"><h5><a href="{{url('admin/Servicios_for_Vehiculo/'.$venta->id_vehiculo.'/setServicios')}}">${{number_format($venta->vehiculo->costo,2)}}</a></h5></td>

                                <td valign="center"><h5><a href="{{url('admin/Servicios_for_Vehiculo/'.$venta->id_vehiculo.'/setServicios')}}">$<?php 
                            $costo_servicios=0;
                            foreach($venta->vehiculo->servicios_vehiculo as $servicio){
                                    $costo_servicios+=$servicio->costo;
                            }
                            echo ' '.number_format($costo_servicios,2);
                            ?></a></h5></td>
                              
                                <td valign="center">{{$venta->vehiculo->nombre.' '.$venta->vehiculo->marca->nombre}}</td>
                              
                                <td valign="center" align="center"><button class="btn btn-success" onclick="window.location.href='{{url('admin/Ventas/'.$venta->id.'/edit')}}';" >Modificar</button></td>

                                <td valign="center" align="center"><button class="btn btn-danger" onclick='getOptionEliminar("{{url('admin/Ventas/'.$venta->id)}}");'>Eliminar</button></td>
                            </tr>


                            @endforeach
                             
                          </tbody>
                        </table>

                      </div>
                    </div>
</div>
        </div>
      
    </div>
</div>
                    <div id="dialog_eliminar" title="Eliminar Tipo de Ventas" style="display:none">
                   <p>¿Estas seguro que deseas Eliminar el Ventas? </p>
</div>
<form method="POST" id="form">
  
                        {!! csrf_field() !!}

                        <input type="hidden" name="_method" value="DELETE">
</form>


@endsection

@section('js')
        <script>
 

           var handleDataTableButtons = function() {
              "use strict";
              0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
                dom: "Bfrtip",
                buttons: [ {
                  extend: "csv",
                  className: "btn-sm"
                }, {
                  extend: "excel",
                  className: "btn-sm"
                }, {
                  extend: "pdf",
                  className: "btn-sm"
                }  ],
                responsive: !0
              })
            },
            TableManageButtons = function() {
              "use strict";
              return {
                init: function() {
                  handleDataTableButtons()
                }
              }
            }();
        </script>
        <script type="text/javascript">
          $(document).ready(function() {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({
              keys: true
            });
            $('#datatable-responsive').DataTable();
            
            var table = $('#datatable-fixed-header').DataTable({
              fixedHeader: true
            });
          });
          TableManageButtons.init();




          function getOptionEliminar(url){
 

  $("#dialog_eliminar").dialog({
  buttons: [
    {
      text: "Si",
      click: function() {
 
            $('#form').attr('action',url);
            $('#form').submit();
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

 


    
};
        </script>
@endsection