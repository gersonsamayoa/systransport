@extends('admin.template.main')

@section('title','Nueva Transaccion')

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

	{!! Form::open(['route'=>'admin.transaccion.store', 'method'=>'POST']) !!}

	<div class="form-group">
	{!!Form::label('tipoTransaccion_id', 'Tipo de Transaccion')!!}
	{!!Form::select('tipoTransaccion_id',$tipoTransacciones, null, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('maquinaria_id', 'Maquinaria')!!}
	{!!Form::select('maquinaria_id',$maquinarias, null, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
	</div>

	

	<div class="form-group">
	{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
	<a class="btn btn-danger" href="{{route('admin.transaccion.index')}}" role="button">Cancelar</a>
	</div>

	{!!Form::close()!!}

	@endsection