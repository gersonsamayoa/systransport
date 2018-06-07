@extends('admin.template.main')

@section('title','Comprar Maquinaria')

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
	 <img src="/images/{{ $maquinaria->imagen }}" >
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
	{!!Form::label('precio', 'Precio Q.')!!}
	{!!Form::text('precio',$maquinaria->precio,['class'=>'form-control','', 'readonly'])!!}
	</div>

	<div class="form-group">
	{!!Form::hidden('tipoTransaccion_id', $tipoTransaccion->id, ['class'=>'form-control'])!!}
	</div>

	<div class="form-group">
	{!!Form::hidden('maquinaria_id', $maquinaria->id, ['class'=>'form-control'])!!}
	</div>

	<div class="form-group">
	{!!Form::hidden('estadoTransaccion', 0, ['class'=>'form-control'])!!}
	</div>


	<div class="form-group">
	{!!Form::submit('Comprar',['class'=>'btn btn-primary'])!!}
	<a class="btn btn-danger" href="{{route('admin.transaccion.index')}}" role="button">Cancelar</a>
	</div>

	{!!Form::close()!!}

	@endsection