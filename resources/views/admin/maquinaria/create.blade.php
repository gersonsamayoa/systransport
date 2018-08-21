@extends('admin.template.main')

@section('title','Ingresar Maquinaria')

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

	{!! Form::open(['route'=>'admin.maquinaria.store', 'method'=>'POST', 'files' =>true]) !!}

	<div class="form-group">
	{!!Form::label('placa', 'No. Placa')!!}
	{!!Form::text('placa',null,['class'=>'form-control','placeholder'=> 'Placa', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('costoPorDia', 'Costo de alquiler por Día')!!}
	Q{!!Form::number('costoPorDia',null,['class'=>'form-control', 'step'=>'0.05','placeholder'=> 'Costo', ''])!!}
	</div>

	<div class="form-group">
	{!!Form::label('precio', 'Precio para la venta')!!}
	Q{!!Form::number('precio',null,['class'=>'form-control', 'step'=>'0.05','placeholder'=> 'Precio', ''])!!}
	</div>

	<div class="form-group">
	{!!Form::hidden('region_id', $usuario->region_id, ['class'=>'form-control'])!!}
	</div>

	<div class="form-group">
	{!!Form::hidden('user_id', $usuario->id, ['class'=>'form-control'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('estadoEquipo','Estado de Maquinaria')!!}
		{!!Form::select('estadoEquipo_id',$estadoEquipo, null, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('tipoMaquinaria','Tipo de Maquinaria')!!}
		{!!Form::select('tipoMaquinaria_id',$tipoMaquinaria, null, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('imagen','Imagen')!!}
		{!!Form::file('imagen') !!}
	</div>


	<div class="form-group">
	{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
	<a class="btn btn-danger" href="{{route('admin.maquinaria.index')}}" role="button">Cancelar</a>
	</div>

	{!!Form::close()!!}

	@endsection