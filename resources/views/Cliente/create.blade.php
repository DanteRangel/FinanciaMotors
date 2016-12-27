@extends('layouts.app')

@section('content') 
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
   
     
 <div class="row">
 <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
    <label>Empresa:</label>
      Asociar Empresa 
                         <div class="label_check" > 
                        <input type="radio" class="empresa_radio" name="pivot_empresa" id="aEmpresa" value="true"  ></div> &nbsp; No Asociar Empresa
                          <div class="label_check" >
        
                        <input type="radio" class="empresa_radio" name="pivot_empresa" id="nEmpresa" value="false" checked="" > </div>
                     
</div> 
                <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6 text.center">
                            <div class="row-fluid" id="div_empresa">
                                
                            </div>
                </div>

            </div>
<br>


            <div class="row">
                     <br>
                    <button type="button"  onclick="crear()" class="btn btn-dark" ><span>Ingresar</span></button>
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
$(document).ready(function(){
 

            if($(this).val()==true){
alert($(this).val());
 datos='_token={{csrf_token()}}&_method=POST';
 //alert(datos);
            $.ajax({
                url:"{{url('admin/Cliente/formContado')}}",
                type:'POST',
                data:datos,
                success:function(response){
                    $('#formContado').html(response);
                    


                }

            });


    
            }
  
 
   $("input[type='radio']").each(toggleCheck_radio);  
 /* Esta funcion cambia la imagen a mostrar */
 /* (que se encuentra en el elemento padre */
 /* del check) ya sea si el checklist */
 /* está activo como si no lo está*/
 $('.check').click(function(){

      $("input[type='radio']").click(toggleCheck_radio);
      $("input[type='radio']").each(toggleCheck_radio);  
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

    function crear(){
        $("#dialog_crear").dialog({
            buttons: [
            {
                text: "Si",
                click: function() {
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
 
 
 function toggleCheck_radio() {
   if ($(this).is(":checked")){

       $(this).parent().removeClass('clase_radio_verde disable');
       $(this).parent().addClass('clase_radio_verde checked'); 
   }else {
        $(this).parent().removeClass('clase_radio_verde checked'); 
       $(this).parent().addClass('clase_radio_verde disable');       
   }

 } 
 
</script>
@endsection


