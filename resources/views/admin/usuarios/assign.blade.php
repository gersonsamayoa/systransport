@extends('admin.template.main')

@section('title','Editar Usuario '. $user->name)

@section('content')
	
	{!! Form::open(['route' =>['admin.usuarios.updateassing', $user->id], 'method'=>'PUT']) !!}

		<div class="form-group">
		{!!Form::label('name','Nombre')!!}
		{!!Form::text('name', $user->name, ['class'=>'form-control', 'placeholder'=>'Nombre Completo','readonly'])!!}
		</div>

		<div class="form-group">
		{!!Form::label('email','Correo Electrónico')!!}
		{!!Form::text('email', $user->email, ['class'=>'form-control', 'placeholder'=>'example@correo.com','readonly'])!!}
		</div>

		@if(Auth::user()->gerentegeneral())
		<div class="form-group">
		{!!Form::label('Tipo','Tipo')!!}
		{!!Form::text('tipoUsuario_id', $user->tipoUsuario->descripcion, ['class'=>'form-control', 'placeholder'=>'Nombre Completo','readonly'])!!}
		</div>
		@endif
		@if(Auth::user()->gerentemaquinaria() OR Auth::user()->gerenteproductos() OR Auth::user()->gerentemineria() OR Auth::user()->gerenteservicios())
		<div class="form-group">
		{!!Form::label('Tipo','Tipo')!!}
		{!!Form::text('tipoUsuario_id', $user->tipoUsuario->descripcion, ['class'=>'form-control', 'placeholder'=>'Nombre Completo','readonly'])!!}
		</div>
		@endif
		@if(Auth::user()->empleadomaquinaria() OR Auth::user()->empleadoproductos() OR Auth::user()->empleadomineria() OR Auth::user()->empleadoservicios())
		<div class="form-group">
		{!!Form::label('Tipo','Tipo')!!}
		{!!Form::text('tipoUsuario_id', $user->tipoUsuario->descripcion, ['class'=>'form-control', 'placeholder'=>'Nombre Completo','readonly'])!!}
		</div>
		@endif
		
		<div class="form-group">
		{!!Form::label('Region','Region')!!}
		{!!Form::text('region_id', $user->region->descripcion, ['class'=>'form-control', 'placeholder'=>'Nombre Completo','readonly'])!!}
		</div>

		<div class="form-group">
		{!!Form::label('empleado','Empleado')!!}
		{!!Form::select('empleado_id', $empleados, null, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
		</div>

		<div class="form-group">
			{!!Form::submit('Asignar', ['class'=>'btn btn-primary'])!!}
			<a href="{{route('admin.usuarios.index')}}" class="btn btn-info">Regresar</a><hr>
		</div>

	{!! Form::close() !!}
@endsection