@extends('layouts.app')

@section('content')
<style>
#login .form-control{
    box-shadow: none;
    font-size: 140%;
    border-left:0;
    border-right:0;
    border-top:0;
    background:transparent;
}

#login .custom-addon{
    border-left:0 solid transparent;
    border-right:0 solid transparent;
    border-top:0 solid transparent;
    background:transparent;
}

#boton{
    font-size: 120%;
    background-color: #73879C;
    color: #fff;
    padding-left: 5%;
    padding-right: 5%;
    border: none;
}

</style>
      <div class="container text-center page-wrap" style="margin-top:10%;" >
            <div align="center" class="row"> 
          <h1 class="text-azul" id="slogan"> FinanciaMotors</h1>
          <h2 class="text-amarillo" id="advertising">FinanciaSystem</h2>
        </div>

        <div class="row" >
          <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">

                <form id="login" class="form-horizontal" role="form" method="POST"  id="login" action="{{ url('/login') }}">
          
              <div class="form-group{{ $errors->has('clave_vendedor') ? ' has-error' : '' }}">
                <div class="input-group">
                  <input type="text" class="form-control" name="clave_vendedor" value="{{ old('clave_vendedor') }}" aria-describedby="usuario-addon" placeholder="Usuario">
                  <span class="input-group-addon custom-addon" id="usuario-addon">
                    <span class="glyphicon glyphicon-user white-icon"></span>
                  </span>
                
                </div>
                      @if ($errors->has('clave_vendedor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('clave_vendedor') }}</strong>
                                    </span>
                                @endif
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="input-group">
                  <input name="password" type="password" class="form-control" placeholder="Contraseña" aria-describedby="password-addon">
                  <span class="input-group-addon custom-addon" id="password">
                    <span class="glyphicon glyphicon-lock white-icon"></span>
                  </span>
                      
                
                </div>
                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

              </div>

              {!! csrf_field() !!}
              <button class="btn btn-default pull-right" id="boton">Iniciar</button>
            </form>
          </div>
        </div>
        </div>

@endsection
