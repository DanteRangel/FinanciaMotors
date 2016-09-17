@extends('layouts.app')

@section('content') 
<div class="row">
    <div class="col-md-offset-1 col-md-10 col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-lg-offset-1 col-lg-10"> 
        <form id="crear" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/Cliente/') }}" enctype="multipart/form-data">
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
   
        </form>
 <div class="row">
<div class="col-md-6 col-xs-12 col-lg-6 col-sm-6 text.center">
         
   <label>Empresa:</label><br>
                     
                       Asociar Empresa 
                         <div class="label_check" >
        
                        <input type="radio" class="empresa_radio" name="pivot_empresa" id="aEmpresa" value="true"  ></div> &nbsp; No Asociar Empresa
                          <div class="label_check" >
        
                        <input type="radio" class="empresa_radio" name="pivot_empresa" id="nEmpresa" value="false" > </div>
                      </p>

</div>
                <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6 text.center">
                            <div class="row-fluid" id="div_empresa">
                                
                            </div>
                </div>

            </div>
            <div class="row">
                     <br>
                    <button type="button"  onclick="crear()" class="btn btn-dark" ><span>Ingresar</span></button>
            </div>

       

    </div>
</div>
<div id="dialog_crear" title="Alta Usuario " style="display:none">
    <p>¿Estas seguro que deseas crear un nuevo Usuario? </p>
</div>
@endsection


@section('js')

<script>
$(document).ready(function(){
 

 
 
   $("input[type='radio']").each(toggleCheck_radio);  
 /* Esta funcion cambia la imagen a mostrar */
 /* (que se encuentra en el elemento padre */
 /* del check) ya sea si el checklist */
 /* está activo como si no lo está*/
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


