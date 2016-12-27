@extends('layouts.app')

@section('content') 
    <div class="row-fluid">
        <div class="col-md-offset-1 col-md-10 col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-lg-offset-1 col-lg-10"> 
            <form id="crear" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/Servicios') }}">
                <input type="hidden" name="_method" value="POST">
                <div class="row-fluid">
                    <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="anio">Nombre del Servicio</label>
                            <div class="">
                            <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" aria-describedby="usuario-addon" placeholder="Nombre del Servicio">

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
                        <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6 text.center">
                             
                                <button type="button"  onclick="crear()" class="btn btn-dark" ><span>Ingresar</span></button>
                        </div>
                    </div>

            </form>

        </div>
    </div>
        <div id="dialog_crear" title="Alta nueva Servicios " style="display:none">
             <p>¿Estas seguro que deseas crear una nueva Servicios? </p>
</div>
    @endsection
    @section('js')
    <script>

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
        </script>
    @endsection

