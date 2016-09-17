@extends('layouts.app')

@section('content') 
    <div class="row-fluid">
        <div class="col-md-offset-1 col-md-10 col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-lg-offset-1 col-lg-10"> 
            <form id="crear" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/Empresa') }}">
                <input type="hidden" name="_method" value="POST">
                <div class="row">
                    <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="anio">Nombre de la Empresa</label>
                            <div class="">
                            <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" aria-describedby="usuario-addon" placeholder="Nombre de la Empresa">

                            </div>
                            @if ($errors->has('nombre'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                           <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                        <div class="form-group{{ $errors->has('rfc') ? ' has-error' : '' }}">
                            <label for="anio">RFC</label>
                            <div class="">
                            <input type="text" class="form-control" name="rfc" value="{{ old('rfc') }}" aria-describedby="usuario-addon" placeholder="RFC">

                            </div>
                            @if ($errors->has('rfc'))
                            <span class="help-block">
                                <strong>{{ $errors->first('rfc') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
 

                    
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                        <div class="form-group{{ $errors->has('razon_social') ? ' has-error' : '' }}">
                            <label for="anio">Razón Social de la empresa</label>
                            <div class="">
                            <input type="text" class="form-control" name="razon_social" value="{{ old('razon_social') }}" aria-describedby="usuario-addon" placeholder="Razón social de la empresa">

                            </div>
                            @if ($errors->has('razon_social'))
                            <span class="help-block">
                                <strong>{{ $errors->first('razon_social') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
            <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6 text.center">
                             <br>
                                <button type="button"  onclick="crear()" class="btn btn-dark" ><span>Ingresar</span></button>
                        </div>
 

                    
                </div>
 
              {!! csrf_field() !!}
                    <div class="row-fluid">
                      
                    </div>

            </form>

        </div>
    </div>
        <div id="dialog_crear" title="Alta nueva Empresa " style="display:none">
             <p>¿Estas seguro que deseas crear una nueva Empresa? </p>
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

