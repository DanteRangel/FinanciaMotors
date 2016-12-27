@extends('layouts.app')

@section('content') 
<div class="row">
    <div class="col-md-offset-1 col-md-10 col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-lg-offset-1 col-lg-10"> 
        <form id="modificar" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/Cliente/'.$cliente->id) }}" enctype="multipart/form-data"> 
            <input type="hidden" name="_method" value="PUT">

            {!! csrf_field() !!}
    <div class="row">
 
    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
            <div class="row">
                <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                    <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                        <label for="nombre">Nombre</label>
                        <div class="">
                            <input type="text" class="form-control" name="nombre" value="{{ $cliente->persona->nombre }}" aria-describedby="usuario-addon" placeholder="Nombre Usuario">

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
                            <input type="text" class="form-control" name="apellidoPaterno" value="{{ $cliente->persona->apellidoPaterno }}" aria-describedby="usuario-addon" placeholder="Apellido Paterno del Usuario">

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
                            <input type="text" class="form-control" name="apellidoMaterno" value="{{ $cliente->persona->apellidoMaterno }}" aria-describedby="usuario-addon" placeholder="Apellido Materno del Usuario">

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
                            <input type="text" class="form-control" name="correo" id="correo" value="{{ $cliente->persona->correo }}" aria-describedby="usuario-addon" placeholder="Correo Electrónico del Usuario">

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
                            <input type="text" class="form-control" name="telefono_cel" value="{{ $cliente->persona->telefono_cel }}" aria-describedby="usuario-addon" placeholder="Telefono Celular del Usuario">

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
                        
                        <input type="text" class="form-control" name="telefono_otro" value="{{ $cliente->persona->telefono_otro }}" aria-describedby="usuario-addon" placeholder="Otro Telefono">
 
                        @if ($errors->has('telefono_otro'))
                        <span class="help-block">
                        <strong>{{ $errors->first('telefono_otro') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>


            </div>
 <div class="row">
<div class="col-md-6 col-xs-12 col-lg-6 col-sm-6 text.center">
    <label>Empresa:</label><br> 
      Asociar Empresa 
                         <div class="label_check" > 
                        <input type="radio" class="empresa_radio" name="pivot_empresa" id="aEmpresa" value="true" @if($cliente->id_empresa!=NULL) checked @endif  ></div> &nbsp; No Asociar Empresa
                          <div class="label_check" >
        
                        <input type="radio" class="empresa_radio" name="pivot_empresa" id="nEmpresa" value="false" @if($cliente->id_empresa==NULL) checked @endif > </div>
                      </p>

</div>
                <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6 text.center">
                            <div class="row-fluid" id="div_empresa">
                            @if($cliente->id_empresa!=NULL)
                            <div class="form-group"><label for="empresa">Empresa</label><select class="form-control" id="empresa" name="empresa" >
                                            @foreach($empresas as $empresa)
                            <option @if($cliente->id_empresa == $empresa->id) selected @endif value="{{$empresa->id}}">{{$empresa->nombre}}</option>

                                            @endforeach
</select></div>

                                    @endif
                            </div>
                </div>

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


    <form  action="{{url('admin/Cliente/'.$cliente->id)}}" class="form-horizontal" role="form" method="POST" id="eliminar">

                        {!! csrf_field() !!}

                        <input type="hidden" name="_method" value="DELETE">
  
</form>
    <div id="dialog_actualizar" title="Actualizar  vendedor {{$cliente->clave_vendedor}}" style="display:none">
             <p>¿Estas seguro que deseas Modificar al vendedor {{$cliente->clave_vendedor}} ? </p>
</div>
   <div id="dialog_eliminar" title="Eliminar vendedor {{$cliente->clave_vendedor}}" style="display:none">
                   <p>¿Estas seguro que deseas Eliminar al vendedor  {{$cliente->clave_vendedor}} ? </p>
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


                    //console.log($('#crear').serializeArray());
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