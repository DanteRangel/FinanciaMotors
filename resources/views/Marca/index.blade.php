@extends('layouts.app')

@section('content')
<div class="container">
<div class="row-fluid">

<div class="col-md-offset-1 col-sm-offset-1 col-lg-offset-1 col-md-10 col-xs-12 col-sm-10 col-lg-10">    <button class="btn btn-dark" style="width:100% !important" onclick="window.location.href='{{url('admin/Marca/create')}}';">Crear una nueva Marca</button>
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
                                <td align="left">Marca</td>
                                <td align="center">Modificar</td>
                                <td align="center">Eliminar</td>



                            </tr>
                          </thead>
                          <tbody>
                            @foreach($marcas as $marca)
                            <tr>
                                <td>{{$marca->nombre}}</td>
                                <td align="center"><button class="btn btn-success" onclick="window.location.href='{{url('admin/Marca/'.$marca->id.'/edit')}}';" >Modificar</button></td>

                                <td align="center"><button class="btn btn-danger" onclick='getOptionEliminar("{{url('admin/Marca/'.$marca->id)}}");'>Eliminar</button></td>
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
                    <div id="dialog_eliminar" title="Eliminar Tipo de Vehiculo" style="display:none">
                   <p>¿Estas seguro que deseas Eliminar el Tipo de Automovil? </p>
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