@extends('layouts.app')

@section('content') 

{!! Form::open(['url' => 'Prospeccion/primera_etapa','id'=>'alta_prospeccion']) !!}
<div class="row">
	<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
		<div class="form-group">
			{!!Form::label('cliente', 'Cliente', ['class' => '']);!!}
			<select name="generales[cliente]" id="generales_cliente" class="form-control"></select>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
		<div class="form-group">
			{!!Form::label('', '&nbsp;', ['class' => '']);!!}
			<button class="btn btn-dark" style="margin-top:1.5em;" onclick="agregarCliente(event);">¿Deseas Agregar a un cliente mas?</button>
		</div>
	</div>
</div>
<div class="row" style="margin-top:1.5em;">
	<div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
		<div class="form-group">
			<label for="">Vehiculo de interes:</label>
			{!!Form::text('generales[vehiculo_interes]','',['class'=>'form-control','id'=>'generales_vehiculo_interes'])!!}
		</div>
	</div>
	<div class="col-md-2 col-sm-2 col-lg-2 col-xs-12">
		<div class="form-group">
			<label for="">Precio Ofrecio:</label>
			{!!Form::number('generales[precio_ofrecido]','',['class'=>'form-control','id'=>'generales_precio_ofrecido','step'=>'any'])!!}
		</div>
	</div>
	<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
		<div class="form-group">
			<label for="">¿Por que Medio se entero de nosotros?</label>	
			{!!Form::select('generales[medio_por_enterado]',array('0'=>'Mercado Libre','1'=>'Facebook','2'=>'Seminuevos.com','3'=>'Piso', '4'=>'Cambaceo','5' =>'Recomendado','6'=>'Pagina WEB','7'=>'Otro'),null,['class'=>'form-control','id'=>'generales_medio_por_enterado'])!!}
		</div>
	</div>
	<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
		<div class="form-group">
			<label for="">Toma de Desición</label>	
			{!!Form::select('generales[tomador_desicion]',array('0'=>'Tomador de Desición ','1'=>'Sub-tomador de Desición ','2'=>'Desición Compartida'),null,['class'=>'form-control','id'=>'generales_tomador_desicion'])!!}
			</div>
	</div>
</div>

<div class="row" style="margin-top:1.5em;">
	<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
		<label>Credito:</label>
		<div class="label_check" > 
			<input type="radio" class="check credito_pivot" name="credito[credito_pivot]" id="si_credito" value="true"  ></div> &nbsp;  <label>Contado:</label>
		<div class="label_check" >
			<input type="radio" class="check credito_pivot" name="credito[credito_pivot]" id="no_credito" value="false" checked="" > 
			
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-lg-12 col-xs-12">

	</div>
</div>

<br>
<div  id="perfilCrediticio" style="display:none;">
	<div class="row" >
		<div class="col-md-1 col-xs-3 col-sm-1 col-lg-1">
			<div class="form-group">
				<label for="">Plazo:</label>
				{!!Form::select('credito[plazo]',array('12'=>'12','24'=>'24','36'=>'36','48'=>'48','60'=>'60'),null,['class'=>'form-control','id'=>'credito_plazo'])!!}
			</div>
		</div>
		<div class="col-md-3 col-xs-9 col-sm-3 col-lg-3">
			<div class="form-group">
				<label for="">Credito:</label>
				{!!Form::select('credito[credito]',array('0'=>'Credito Casa','1'=>'Credito Fondeadora'),null,['class'=>'form-control','id'=>'credito_tipo_credito'])!!}
			</div>
		</div>

		<div class="col-md-3 col-xs-12 col-sm-3 col-lg-3" id="input_fondeadora" style="display:none;">
			<div class="form-group">
				<label for="">Fondeadora:</label>
				{!!Form::text('credito[fondeadora]','',['class'=>'form-control','id'=>'credito_fondeadora'])!!}
			</div>
		</div>
		<div class="col-md-1 col-sm-1 col-lg-1 col-xs-12">
			<div class="form-group">
				<label for="">Edad:</label>
				{!!Form::number('credito[edad_cliente]','18',['class'=>'form-control','id'=>'credito_edad_cliente'])!!}
			</div>
		</div>
		<div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
			<div class="form-group">
				<label for="">Estado Buro de Credito:</label>
				{!!Form::select('credito[estado_buro]',array('Mal Buro','Buen Buro','No tiene Historial de Credito','Buro Regular'),null,['class'=>'form-control'])!!}
			</div>
		</div>
	 

	</div>
	<div class="row">

		<div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
			<div class="form-group">
				<label for="">Observaciones Buro de Credito:</label>
				{!!Form::textarea('credito[observaciones_buro]',null,['class'=>'form-control','size'=>'2x3','id'=>'credito_observaciones_buro'])!!}
			</div>
		</div>
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-12">
			<div class="form-group">
				<label for="">Ingreso Mensual:</label>
				{!!Form::number('credito[ingreso_mensual]',null,['class'=>'form-control','id'=>'credito_ingreso_mensual','step'=>'any'])!!}
			</div>
		</div>
		<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
			<div class="form-group">
				<label for="">Comprobante de Ingresos:</label>
				{!!Form::select('credito[comprobante_ingresos]',['Declaraciones','Recibos de Nomina','Estados de Cuenta'],null,['class'=>'form-control','id'=>'credito_comprobante_ingresos'])!!}
			</div>
		</div>
		<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12" id="numero_seguro_social" style="display:none;">
			<div class="form-group">
				<label for="">Numero Seguro Social:</label>
				{!!Form::number('credito[seguro_social]','00000000000',['class'=>'form-control','id'=>'credito_seguro_social'])!!}
			</div>
		</div>
		<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12" id="depositos_mensuales" style="display:none;">
			<div class="form-group">
				<label for="">Depositos Edo. de Cuenta:</label>
				{!!Form::number('credito[depositos_estados_cuenta]','',['class'=>'form-control','id'=>'credito_depositos_estados_cuenta'])!!}
			</div>
		</div>
</div>
</div>
<br>
<div class="row" style="margin-top:1.5em;">
	<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
		
		<label>¿Vehiculo a Cuenta?:</label>
		Si
		<div class="label_check" > 
			<input type="radio" class="check check_vehiculo_cuenta" name="check_vehiculo_cuenta" id="si_credito" value="true"  >
		</div> &nbsp; No 
		<div class="label_check" >
			<input type="radio" class="check check_vehiculo_cuenta" name="check_vehiculo_cuenta" id="no_credito" value="false" checked="" > 
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 center-block text-center">
			
	</div>
</div>
<div  id="vehiculo_a_cuenta" style="display:none; margin-top:1.5em;">
<div class="row">
	<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
		<div class="form-group">
			<label for="">Tipo de vehiculo a cuenta:</label>
			{!!Form::text('vehiculo_cuenta[vehiculo_cuenta]','',['class'=>'form-control','id'=>'vehiculo_cuenta_vehiculo_cuenta'])!!}
		</div>
	</div>
	<div class="col-md-2 col-sm-2 col-lg-2 col-xs-12">
		<div class="form-group">
			<label for="">Versión:</label>
			{!!Form::text('vehiculo_cuenta[version_vehiculo]','',['class'=>'form-control','id'=>'vehiculo_cuenta_version_vehiculo'])!!}
		</div>
	</div>
	<div class="col-md-2 col-sm-2 col-lg-2 col-xs-12">
		<div class="form-group">
			<label for="">Año:</label>
			{!!Form::number('vehiculo_cuenta[anio_vehiculo]',null,['class'=>'form-control','id'=>'vehiculo_cuenta_anio_vehiculo'])!!}
		</div>
	</div>
	<div class="col-md-2 col-sm-2 col-lg-2 col-xs-12">
		<div class="form-group">
			<label for="">Tenencias:</label>
			{!!Form::text('vehiculo_cuenta[tenencia_vehiculo]','',['class'=>'form-control','id'=>'vehiculo_cuenta_tenencia_vehiculo'])!!}
		</div>
	</div>
	<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
		<div class="form-group">
			<label for="">Verificación:</label>
			{!!Form::text('vehiculo_cuenta[verificacion_vehiculo]','',['class'=>'form-control','id'=>'vehiculo_cuenta_verificacion_vehiculo'])!!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
		<div class="form-group">
			<label for="">Caracteristicas vehiculo:</label>
			{!!Form::text('vehiculo_cuenta[caracteristicas_vehiculo]','',['class'=>'form-control','id'=>'vehiculo_cuenta_caracteristicas_vehiculo'])!!}
		</div>
	</div>
	<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
		<div class="form-group">
			<label for="">Kilometraje:</label>
			{!!Form::number('vehiculo_cuenta[kilometraje]',null,['class'=>'form-control','id'=>'vehiculo_cuenta_kilometraje'])!!}
		</div>
	</div>
	<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
		<div class="form-group">
			<label for="">Dueños:</label>
			{!!Form::number('vehiculo_cuenta[vehiculo_duenios]',null,['class'=>'form-control','id'=>'vehiculo_cuenta_vehiculo_duenios'])!!}
			
		</div>
	</div>
	<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
		<div class="form-group">
			<label for="">Color:</label>
			{!!Form::text('vehiculo_cuenta[color_vehiculo]','',['class'=>'form-control','id'=>'vehiculo_cuenta_color_vehiculo'])!!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
		<div class="form-group">
			<label for="">Papeles:</label>
				{!!Form::select('vehiculo_cuenta[papeles]',['Factura de  Agencia','Arrendadora','Empresa','Lote','Asseguradora'],null,['class'=>'form-control','id'=>'vehiculo_cuenta_papeles'])!!}
		</div>	
	
	</div>
	<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
		<div class="form-group">
			<label for="">Pretende cantidad por el vehiculo:</label>
			{!!Form::text('vehiculo_cuenta[vehiculo_precio_cuenta]','',['class'=>'form-control','id'=>'vehiculo_cuenta_vehiculo_precio_cuenta'])!!}
		</div>
	</div>
</div>
</div>
<div class="row" style="margin-top:6em;">
 
	<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12  center-block text-center">
	
	<div class="form-group" >
			<label for="">Dia para el seguimiento:</label>
			<input type="text" name="seguimiento" id="seguimiento" class="datepicker form-control" placeholder="aaaa-mm-dd">
		</div>
	</div>
	
	
</div>
<div class="row" style="margin-top:6em;">
	<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12  center-block text-center">
		<button class="btn btn-dark" style="width:60%;" onclick="enviarFormulario(event);">Agregar Prospección</button>
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
										<input type="radio" class="empresa_radio" name="pivot_empresa" id="aEmpresa" value="true"  >
									</div> &nbsp; No Asociar Empresa
									<div class="label_check" >
											<input type="radio" class="empresa_radio" name="pivot_empresa" id="nEmpresa" value="false" checked="" > 
									</div>
	
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
<div id="dialog_crear" title="Alta Prospección " style="display:none">
    <p>¿Estas seguro que deseas dar de alta la Prospección? </p>
</div>
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
			$('#crear')[0].reset();


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
	$('.datepicker').datepicker({
    	dateFormat: 'yy-mm-dd',
    	
	});
	$('.check_vehiculo_cuenta').change(function(){
		if($(this).val()=='true'){
					$('#vehiculo_a_cuenta').show('slow');
				}else{

					$('#vehiculo_a_cuenta').hide('slow');
				}
	});
	$('#credito_comprobante_ingresos').change(function(){
		if($(this).val()=='1'){
			$('#numero_seguro_social').show('slow');
			$('#depositos_mensuales').hide('slow');
		}else if($(this).val()=='2'){
			$('#numero_seguro_social').hide('slow');
			$('#depositos_mensuales').show('slow');
		}else{
			$('#numero_seguro_social').hide('slow');
			$('#depositos_mensuales').hide('slow');
		}
	});
		$('#credito_tipo_credito').change(function(){
				if($(this).val()=='1'){
					$('#input_fondeadora').show('slow');
				}else{

					$('#input_fondeadora').hide('slow');
				}
		});
		$('.credito_pivot').click(function(){

			$("input[type='radio']").click(toggleCheck_radio);
			$("input[type='radio']").each(toggleCheck_radio);  
			//$('#pivote_credito').val($(this).val());
			if($(this).val()=="true"){
				
				$('#perfilCrediticio').show('slow');
			}else{
				$('#perfilCrediticio').hide('slow');
			}
		});
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
                    $('#generales_cliente').html(response);
                    


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
 function enviarFormulario(e){
 	e.preventDefault();

        $("#dialog_crear").dialog({
            buttons: [
            {
                text: "Si",
                click: function() {

                	$('.spans').remove();
                	$('input').each(function(){
                		$(this).parent('div').removeClass('has-error');



                	});
                	$('select').each(function(){
                		$(this).parent('div').removeClass('has-error');



                	});
                	

					//console.log($('#crear').serializeArray());
					//   $('#alta_prospeccion').submit();
					$.ajax({
						data:$('#alta_prospeccion').serialize(),
						url:$('#alta_prospeccion').attr('action'),
						type:'POST',
						success:function(response){
console.log(response);
							if(response.error_permisos=='1'){
								window.location="{{url('ErrorEnLosPermisos')}}";
							}
					// console.log(response);
					if(response.success=='0'){
						//window.location=response.url;
					}else{ 
						for(var i=0; i<response.errors.length; i++){
							if(response.errors[i]!=null){

								objeto_errores=response.errors[i];

								for(propiedad in objeto_errores){ 
								
		//console.log(propiedad.replace('.','_'));
									$('#'+propiedad.replace('.','_')).parent('div').addClass('has-error');
									$('#'+propiedad.replace('.','_')).parent('div').append('  <span  class="spans help-block"><strong>'+  objeto_errores[propiedad][0]+'</strong></span>');

								}

							}
						}

					}


					}
					});
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


