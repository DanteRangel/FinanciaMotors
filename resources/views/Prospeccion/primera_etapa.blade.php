@extends('layouts.app')

@section('content') 

{!! Form::open(['url' => 'Prospeccion/primera_etapa']) !!}
    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
            {!!Form::label('primera_pregunta', 'Primera Pregunta', ['class' => 'hola']);!!}
            {!!Form::text('primera_pregunta', '',['class'=>'form-control','placeholder'=>'example@gmail.com']);!!}
        </div>
    </div>
{!! Form::close() !!}
@endsection


@section('js')
@endsection


