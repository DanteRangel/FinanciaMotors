@extends('layouts.app')

@section('content') 

{!! Form::open(['url' => 'Prospeccion/primera_etapa']) !!}
    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
            {!!Form::label('cliente', 'Cliente', ['class' => '']);!!}
            <select name="cliente" id="cliente" class="form-control">
             
            </select>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
            {!!Form::label('', '&nbsp;', ['class' => '']);!!}
            <button class="btn btn-dark" style="margin-top:1.5em;" onclick="agregarCliente(event);">¿Deseas Agregar a un cliente mas?</button>
        </div>
    </div>
            <div class="row" style="margin-top:1.5em;">
    <div class="col-md-6 col-sm-6 col-lg-12 col-xs-12">
            <label>Credito:</label>
      Si
                         <div class="label_check" > 
                        <input type="radio" class="check credito_pivot" name="credito_pivot" id="si_credito" value="true"  ></div> &nbsp; No 
                          <div class="label_check" >
        
                        <input type="radio" class="check credito_pivot" name="credito_pivot" id="no_credito" value="false" checked="" > </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-12 col-xs-12">
    
    </div>
</div>

<br>
<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" id="formContado">
        
    </div>
    
</div>
<br>
<div class="row">
    <div class="col-md-6 col-sm-6 col-lg-12 col-xs-12">
            <label>¿Vehiculo a Cuenta?:</label>
      Si
                         <div class="label_check" > 
                        <input type="radio" class="check vehiculo_cuenta" name="vehiculo_cuenta" id="si_credito" value="true"  ></div> &nbsp; No 
                          <div class="label_check" >
        
                        <input type="radio" class="check vehiculo_cuenta" name="vehiculo_cuenta" id="no_credito" value="false" checked="" > </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-12 col-xs-12">
    
    </div>
</div>

{!! Form::close() !!}


    <div class="modal fade"  id="newClientForm" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Crear nuevo Usuario</h4>
      </div>
      <div class="modal-body">
      {!! Form::open(['url' => '/admin/Cliente/','id'=>'crear']) !!}
<div class="row">
    <div class="col-md-offset-1 col-md-10 col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-lg-offset-1 col-lg-10"> 
        <form id="crear" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/Cliente/') }}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="POST">

            {!! csrf_field() !!}

            <div class="row">
                <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                             <input type="text" class="form-control" id="nombre" name="nombre"  aria-describedby="usuario-addon" placeholder="Nombre Usuario">
 
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                    <div class="form-group">
                        <label for="apellidoPaterno">Apellido Paterno</label>
                             <input type="text" class="form-control" name="apellidoPaterno" id="apellidoPaterno"  aria-describedby="usuario-addon" placeholder="Apellido Paterno del Usuario">
                  </div>
                </div>

            </div>       
            <div class="row">
                <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                    <div class="form-group{">
                        <label for="apellidoMaterno">Apellido Materno</label>
                        <div class="">
                            <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" aria-describedby="usuario-addon" placeholder="Apellido Materno del Usuario">

                        </div>
                  
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                    <div class="form-group">
                        <label for="correo">Correo Electrónico</label>
                       
                            <input type="text" class="form-control" name="correo" id="correo" aria-describedby="usuario-addon" placeholder="Correo Electrónico del Usuario">

                        
                   
                    </div>
                </div>



            </div>
            <div class="row">
                <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                    <div class="form-group">
                        <label for="telefono_cel">Telefono Celular</label>
                        

                            <input type="text" class="form-control" id="telefono_cel" name="telefono_cel" aria-describedby="usuario-addon" placeholder="Telefono Celular del Usuario">
                        
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                <div class="form-group">
                <label for="telefono_otro">Otro Telefono</label>
                        
                        <input type="text" class="form-control" name="telefono_otro" id="telefono_otro"  aria-describedby="usuario-addon" placeholder="Otro Telefono">
  
                    </div>
                </div>


            </div>
   
     
 <div class="row" style="margin-top:1.5em;">
 <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
    
      Asociar Empresa 
                         <div class="label_check" > 
                        <input type="radio" class="empresa_radio" name="pivot_empresa" id="aEmpresa" value="true"  ></div> &nbsp; No Asociar Empresa
                          <div class="label_check" >
        
                        <input type="radio" class="empresa_radio" name="pivot_empresa" id="nEmpresa" value="false" checked="" > </div>
                     
</div> 
</div>
<div class="row" style="margin-top:1.5em;">
                <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12 text.center">
                            <div class="row-fluid" id="div_empresa">
                                
                            </div>
                </div>

            </div>
<br>


            <div class="row">
                     <br>
                    <button type="button"  onclick="crear()" class="btn btn-dark" ><span>Ingresar</span></button>
            </div>

{!! Form::close() !!}

    </div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection


@section('js')

<script>
   function agregarCliente(e){
        e.preventDefault();
            
        $('#newClientForm').modal('show');
        
    }

    function crear(){

    	$('.spans').remove();
    	$('input').each(function(){
    		$(this).parent('div').removeClass('has-error');



    	});

//console.log($('#crear').serializeArray());
//   $('#crear').submit();
$.ajax({
	data:$('#crear').serialize(),
	url:$('#crear').attr('action'),
	type:'POST',
	success:function(response){

		if(response.error_permisos=='1'){
			window.location="{{url('ErrorEnLosPermisos')}}";
		}
// console.log(response);
		if(response.success=='0'){
			$('#newClientForm').modal('hide');
			getOptionCliente();
			noitificacion(response.message,'dark');

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

$(document).ready(function(){
	getOptionCliente();
	    $('.empresa_radio').click(function(){
        



      $("input[type='radio']").click(toggleCheck_radio);

   $("input[type='radio']").each(toggleCheck_radio);  
        if($(this).val()=="true"){
 datos='_token={{csrf_token()}}&_method=POST';
 //alert(datos);
            $.ajax({
                url:"{{url('admin/Cliente/selectEmpresa')}}",
                type:'POST',
                data:datos,
                success:function(response){

                    $('#div_empresa').html(response);
                    


                }

            });


    }else{ 
          $('#div_empresa').html('');        
    }

    });

	});
 
 
 function getOptionCliente(){
 	 datos='_token={{csrf_token()}}&_method=GET';
 //alert(datos);
            $.ajax({
                url:"{{url('Prospeccion/getOptionCliente')}}",
                type:'GET',
                data:datos,
                success:function(response){
                    $('#cliente').html(response);
                    


                }

            });
 }
 function noitificacion(mensaje,tipo){

    
      new PNotify({
        title: "Transacción Exitosa",
        type: tipo,
        text: mensaje,
   nonblock: {
          nonblock: false
        },
        hide: true,
          before_close: function(PNotify) {
            PNotify.update({
              title: PNotify.options.title + " - Enjoy your Stay",
              before_close: null
            });

            PNotify.queueRemove();

            return true;
          }
      });

     
 }
</script>
@endsection


