@extends('layouts.app')

@section('content') 
    <div class="row-fluid">
        <div class="col-md-offset-1 col-md-10 col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-lg-offset-1 col-lg-10"> 
            <form id="modificar" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/Marca/'.$marca->id) }}">
                <input type="hidden" name="_method" value="PUT">
                <div class="row-fluid">
                    <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="anio">Nombre de la Marca</label>
                            <div class="">
                            <input type="text" class="form-control" name="nombre" aria-describedby="usuario-addon" placeholder="Nombre de la Marca" value="{{$marca->nombre}}">

                            </div>
                            @if ($errors->has('nombre'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
 

                    
                </div>
 
              {!! csrf_field() !!}
                    <div class="row-fluid">
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
        
        

    <form  action="{{url('admin/Marca/'.$marca->id)}}" class="form-horizontal" role="form" method="POST" id="eliminar">

                        {!! csrf_field() !!}

                        <input type="hidden" name="_method" value="DELETE">
  
</form>
    <div id="dialog_actualizar" title="Actualizar marca de Vehiculo {{$marca->nombre}}" style="display:none">
             <p>¿Estas seguro que deseas Modificar la Marca {{$marca->nombre}} ? </p>
</div>
   <div id="dialog_eliminar" title="Eliminar Operadora {{$marca->nombre}}" style="display:none">
                   <p>¿Estas seguro que deseas Eliminar la Marca  {{$marca->nombre}} ? </p>
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
