@extends('admin.template.main')

@section('title','Validar Compra o Alquiler Maquinaria')

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

	{!! Form::open(['route' =>['admin.transaccion.update', $transaccion->id], 'method'=>'PUT']) !!}

	<div class="form-group">
	{!!Form::label('fecha', 'Fecha')!!}
	{!!Form::date('fecha',$transaccion->fecha,['class'=>'form-control','', 'readonly'])!!}
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
	{!!Form::label('tipoTransaccion', 'Tipo Transaccion')!!}
	{!!Form::text('tipoTransaccion', $transaccion->tipoTransaccion->descripcion, ['class'=>'form-control', 'readonly'])!!}
	</div>

	@if($transaccion->tipoTransaccion->descripcion=="Alquiler")
		<div class="form-group">
		{!!Form::label('costoporDia', 'CostoPordia')!!}
		{!!Form::text('costoporDia', $maquinaria->costoPorDia, ['class'=>'form-control', 'readonly'])!!}
		</div>

		<div class="form-group">
		{!!Form::label('cantidadDias', 'Cantidad de Dias')!!}
		{!!Form::text('cantidadDias', $transaccion->cantidadDias, ['class'=>'form-control', 'readonly'])!!}
		</div>
	@endif


	<div class="form-group">
	{!!Form::label('total', 'Total Q.')!!}
	{!!Form::text('precio',$transaccion->total,['class'=>'form-control','', 'readonly'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('estadoTransaccion', 'Estado Transaccion')!!}
	{!!Form::select('estadoTransaccion',$estadoTransaccion, null, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
	</div>


	<div class="form-group">
	{!!Form::hidden('maquinaria_id', $maquinaria->id, ['class'=>'form-control'])!!}
	</div>

	

	<div class="form-group">
	{!!Form::hidden('tipoTransaccion_id', $transaccion->tipoTransaccion_id, ['class'=>'form-control'])!!}
	</div>


	<div class="form-group">
	{!!Form::submit('Aceptar',['class'=>'btn btn-primary'])!!}
	<a class="btn btn-danger" href="{{route('admin.transaccion.index')}}" role="button">Cancelar</a>
	</div>

	{!!Form::close()!!}

	@endsection