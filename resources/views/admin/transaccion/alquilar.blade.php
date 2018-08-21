@extends('admin.template.main')

@section('title','Alquilar Maquinaria')

@section('content')

		@if(count($errors)>0)
	<div class="alert alert-danger" role="alert">
		<ul>
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
		</ul>
	</div>
	@endif
	<div class="row container">
	<div class="col-md-12">
		<div class="thumbnail panel panel-default">
		 <img src="/images/{{ $maquinaria->imagen }}"  >
		</div>
	</div>
	</div>
	 <br><br>

	{!! Form::open(['route'=>'admin.transaccion.store', 'method'=>'POST']) !!}
	<div class="form-group">
	{!!Form::label('fecha', 'Fecha')!!}
	{!!Form::date('fecha',null,['class'=>'form-control','', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('placa', 'Placa')!!}
	{!!Form::text('placa',$maquinaria->placa,['class'=>'form-control','', 'readonly'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('tipoMaquinaria', 'Tipo Maquinaria')!!}
	{!!Form::text('tipoMaquinaria',$maquinaria->tipoMaquinaria->descripcion,['class'=>'form-control','', 'readonly'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('costo', 'Costo por Dia Q.')!!}
	{!!Form::text('costoPorDia',$maquinaria->costoPorDia,['class'=>'form-control','', 'readonly'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('dias', 'Cantidad de Dias')!!}
	{!!Form::number('cantidadDias',null,['class'=>'form-control','', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::hidden('tipoTransaccion_id', $tipoTransaccion->id, ['class'=>'form-control'])!!}
	</div>

	<div class="form-group">
	{!!Form::hidden('maquinaria_id', $maquinaria->id, ['class'=>'form-control'])!!}
	</div>


	<div class="form-group">
	{!!Form::submit('Alquilar',['class'=>'btn btn-primary'])!!}
	<a class="btn btn-danger" href="{{route('admin.transaccion.index')}}" role="button">Cancelar</a>
	</div>

	{!!Form::close()!!}

	@endsection