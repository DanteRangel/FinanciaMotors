@extends('layouts.app')
@section('css') 

@endsection
@section('content') 
<style>
    
.boton-circular{
    border-radius: 90%;
    padding: .8em;
    color:#BAB8B8 ;
    border-color: none;
    background-color: #394D5F;
    border:none;
    
    /*display:scroll;
    position:fixed; */

}
</style>
    <div class="row-fluid" style="height:100%">
        <div class="col-md-offset-1 col-md-10 col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-lg-offset-1 col-lg-10"> 
            
                <div class="row-fluid">  
                   <div class="x_panel" style="width:100%">
                                         
                      <div class="x_content">
                    
                    <table id="tabla-vehiculo" class="table table-striped table-bordered" cellspacing="0" >

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
              </div></div>
                </div>
                <div class="row">
                    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="row">
                        <div class="tile-stats">
                          <div class="icon"><br><br><i class="fa fa-truck"></i>
                          </div>
                          <div class="count"><i class="fa fa-dollar"></i>{{" ".number_format($vehiculo->costo,2)}}</div>
<br><br>
                          <h3>Costo del Vehiculo</h3>
                          <p>Expresados en Moneda Nacional</p>
                        </div>
                        </div>
                               <div class="row">
                        <div class="tile-stats">
                          <div class="icon"><br><br><i class="fa fa-cog fa-spin"></i>
                          </div>
                          <div class="count" style="color:#EF5350 ;"><i class="fa fa-dollar"></i>
<?php 
                            $costo_servicios=0;
                            foreach($vehiculo->servicios_vehiculo as $servicio){
                                    $costo_servicios+=$servicio->costo;
                            }
                            echo ' '.number_format($costo_servicios,2);
                            ?>
                          </div>
<br><br>
                          <h3>Servicios del Vehiculo</h3>
                          <p>Expresados en Moneda Nacional</p>
                        </div>
                        </div>
                      </div>
                       <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-12">
<div class="row-fluid">
                       <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
   
                                <button type="button" style="width:100% !important;" onclick="mostrarServicios()" class="btn btn-dark" ><span>Agreagar un Servicio al Vehiculo</span></button>
                                </div>
                                </div>               
                <div class="row-fluid">
                                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                       @if(count($vehiculo->servicios_vehiculo))              
                  <div class="x_panel" style="width:100%">
                                         
                      <div class="x_content">
               
                        <br>
                              <table id="servicios" class="table table-striped table-bordered" cellspacing="0">

                          <thead>
                            <tr> 
                                <td align="left">Servicio</td>
                                <td align="left">Costo</td>


                                <td align="left">Fecha</td>
 
                                <td align="center">Eliminar</td>
                             



                            </tr>
                          </thead>
                          <tbody>
                            @foreach($vehiculo->servicios_vehiculo as $servicio)
                            <tr>
                                <td>{{$servicio->servicios->nombre}}</td>

                                <td>$ {{number_format($servicio->costo,2)}}</td>
                                <td>{{$servicio->fecha}}</td>
                            
                                <td align="center"><button class="btn btn-danger" onclick='getOptionEliminar("{{url('admin/Servicios_for_Vehiculo/'.$servicio->id)}}");'>Eliminar</button></td>
                            </tr>


                            @endforeach
                             
                          </tbody>
                        </table>

                      </div>
                    </div> 
                    @else
                                    <h1 align="center">El Vehiculo no tiene servicios </h1>

                    @endif
                                       </div> 
                                </div>
</div>

                </div>
       <div class="row-fluid">
                               <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                        <div class="tile-stats">
                          <div class="icon"><br><br><i class="fa fa-car"></i>
                          </div>
                          <div class="count" style="color:#81C784"><i class="fa fa-dollar"></i>{{" ".number_format($vehiculo->costo+$costo_servicios,2)}}</div>
<br><br>
                          <h3>Costo total de la inversion del Vehiculo</h3>
                          <p>Expresados en Moneda Nacional</p>
                        </div>
                        </div>
                
                      </div>
       </div>
       




        </div>
        </div>




    <form class="form-horizontal" role="form" method="POST" id="eliminar_servicio">

                        {!! csrf_field() !!}
                        <input type="hidden" name="vehiculo" value="{{$vehiculo->id}}">
                        <input type="hidden" name="_method" value="DELETE">
  
</form>
   <div id="modalServicios" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Servicios</h4>
      </div>
      <div class="modal-body"> 
<form action="{{url('admin/Servicios_for_Vehiculo/')}}" id="alta_Servicio" class="form-horizontal" role="form" method="POST">

                <input type="hidden" name="_method" value="POST">

                        {!! csrf_field() !!}
                <input type="hidden" name="vehiculo" id="vehiculo" value="{{$vehiculo->id}}">
            <div class="row">
                 <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                     <div class="form-group">
                                <label for="servicio">Servicio</label>
                                <select class="input_modal form-control" name="servicio" id="servicio" required>
 @foreach($servicios as $servicio)
                                    <option value="{{$servicio->id}}">{{$servicio->nombre}}</option>
                                    @endforeach
                                </select>
                     </div>
                 </div>
                <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                     <div class="form-group">
                                <label for="servicio">Costo</label>
                                <input class="input_modal form-control" step="any" name="costo" id="costo" type="number" placeholder="Costo" required>
                                 
                     </div>
                 </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
  <div class="form-group">
                                      <label for="fecha">Fecha de inicio :</label>
                                       <input  type="data" name="fecha" id="fecha" style="text-align:center" class="input_modal form-control" required />
                                    </div> 
                        </div>
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-dark" onclick="altaServicio();">Save changes</button>


      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    <div id="dialog_actualizar" title="Actualizar  Vehiculo {{$vehiculo->serie}}" style="display:none">
             <p>¿Estas seguro que deseas Modificar el Vehiculo {{$vehiculo->serie}} ? </p>
</div>
   <div id="dialog_eliminar" title="Eliminar Servicio" style="display:none">
                   <p>¿Estas seguro que deseas eliminar al servicio ? </p>
</div>
     @endsection
@section('js')

    <script>
 function altaServicio(){

        var formulario=$('#alta_Servicio').serialize();
         $('.spans').remove();
            $('input').each(function(){
                            $(this).parent('div').removeClass('has-error');
                     


                      });
        $.ajax({
            'url':"{{url('admin/Servicios_for_Vehiculo/')}}",
            'type':'POST',
            'data':formulario,
            success:function(response){
                console.log(response);
                    if(response.success=='0'){
                          window.location=response.url;
                   }else{ 
                     objeto_errores=response.errors;
                    for(propiedad in objeto_errores){ 

                      $('#'+propiedad).parent('div').addClass('has-error');
                      $('#'+propiedad).parent('div').append('  <span  class="spans help-block"><strong>'+  objeto_errores[propiedad][0]+'</strong></span>');
                        
                    }
            }
        }
        });
 }
    function mostrarServicios(){
        
        $('#modalServicios').modal();
    }


 
function getOptionEliminar(url){

            //alert(url);
            //
            //alert(form);

                 $("#dialog_eliminar").dialog({
  buttons: [
    {
      text: "Si",
      click: function() {

form=$('#eliminar_servicio');
            form.attr('action',url);
            form.submit();
 
            //$( this ).dialog( "close" );
    
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

        $(document).ready(function(){
 
               $( "#fecha" ).datepicker(
                    {
                        dateFormat: "yy-mm-dd",
                        dayNames: [ "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado" ],
                        dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
                        monthNames: ["Enero", "Febrero", "Marzo", "Abril", 
                                                "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                                "Octubre", "Noviembre", "Diciembre"],
                        monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", 
                                                            "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                        showAnim: "fold"
                    });

        });
        </script>

 


    @endsection
