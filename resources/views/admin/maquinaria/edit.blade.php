@extends('admin.template.main')

@section('title','Editar Maquinaria '. $maquinaria->placa)

@section('content')
	{!! Form::open(['route' =>['admin.maquinaria.update', $maquinaria->id], 'method'=>'PUT', 'files' =>true]) !!}

	<div class="form-group">
	{!!Form::label('placa', 'No. Placa')!!}
	{!!Form::text('placa',$maquinaria->placa,['class'=>'form-control','readonly', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('costoPorDia', 'Costo de alquiler por Día')!!}
	Q{!!Form::number('costoPorDia',$maquinaria->costoPorDia,['class'=>'form-control', 'step'=>'0.05','placeholder'=> '####.##', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('precio', 'Precio para la venta')!!}
	Q{!!Form::number('precio',$maquinaria->precio,['class'=>'form-control', 'step'=>'0.05','placeholder'=> '####.##', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::hidden('user_id', $usuario, ['class'=>'form-control'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('estadoEquipo','Estado de Maquinaria')!!}
		{!!Form::select('estadoEquipo_id',$estadoEquipo, $maquinaria->estadoEquipo_id, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('tipoMaquinaria','Tipo de Maquinaria')!!}
		{!!Form::select('tipoMaquinaria_id',$tipoMaquinaria, $maquinaria->tipoMaquinaria_id, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('imagen','Imagen')!!}
		{!!Form::file('imagen') !!}
	</div>


	<div class="form-group">
	{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
	<a class="btn btn-danger" href="{{route('admin.maquinaria.index')}}" role="button">Cancelar</a>
	</div>

	{!! Form::close() !!}
@endsection