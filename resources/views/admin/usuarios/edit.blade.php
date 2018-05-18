@extends('admin.template.main')

@section('title','Editar Usuario '. $user->name)

@section('content')
	
	{!! Form::open(['route' =>['admin.usuarios.update', $user], 'method'=>'PUT']) !!}

		<div class="form-group">
		{!!Form::label('name','Nombre')!!}
		{!!Form::text('name', $user->name, ['class'=>'form-control', 'placeholder'=>'Nombre Completo','required'])!!}
		</div>

		<div class="form-group">
		{!!Form::label('email','Correo Electrónico')!!}
		{!!Form::text('email', $user->email, ['class'=>'form-control', 'placeholder'=>'example@correo.com','required'])!!}
		</div>

		<div class="form-group">
		{!!Form::label('password','Contraseña')!!}
		{!!Form::password('password', ['class'=>'form-control', 'placeholder'=>'*******',''])!!}
		</div>
		
		
		@if(Auth::user()->gerentegeneral())
		<div class="form-group">
		{!!Form::label('type','Tipo')!!}
		{!!Form::select('type', ['usuariomineria'=>'Usuario Mineria','usuarioproductos'=>'Usuario Productos','usuarioconstruccion'=>'Usuario Construccion','gerentemineria'=>'Gerente Mineria','gerenteproductos'=>'Gerente Productos','gerenteconstruccion'=>'Gerente Construccion','gerentegeneral'=>'Gerente General'], $user->type, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
		</div>
		@else
		<div class="form-group">
		{!!Form::label('type','Tipo')!!}
		{!!Form::select('type', ['usuariomineria'=>'Usuario Mineria','usuarioproductos'=>'Usuario Productos','usuarioconstruccion'=>'Usuario Construccion'], $user->type, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
		</div>
		@endif
		
		<div class="form-group">
		{!!Form::label('region','Region')!!}
		{!!Form::select('region', ['coban'=>'Cobán','progreso'=>'Progreso','quetzaltenango'=>'Quetzaltenango','peten'=>'Petén','zacapa'=>'Zacapa','huehuetenango'=>'Huehuetenango'], $user->region, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
		</div>

		<div class="form-group">
			{!!Form::submit('Editar', ['class'=>'btn btn-primary'])!!}
			<a href="{{route('admin.usuarios.index')}}" class="btn btn-info">Regresar</a><hr>
		</div>

	{!! Form::close() !!}
@endsection