@extends('admin.template.main')

@section('title','Crear Cuenta')

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
	
	{!! Form::open(['route' =>'admin.usuarios.store', 'method'=>'POST']) !!}

		<div class="form-group">
		{!!Form::label('name','Nombre')!!}
		{!!Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre Completo','required'])!!}
		</div>

		<div class="form-group">
		{!!Form::label('email','Correo Electrónico')!!}
		{!!Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'example@correo.com','required'])!!}
		</div>

		<div class="form-group">
		{!!Form::label('password','Contraseña')!!}
		{!!Form::password('password', ['class'=>'form-control', 'placeholder'=>'*******','required'])!!}
		</div>
		
		<div class="form-group">
		{!!Form::label('Tipo','Tipo')!!}
		{!!Form::select('tipoUsuario_id', ['usuariomineria'=>'Usuario Mineria','usuarioproductos'=>'Usuario Productos','usuariomaquinaria'=>'Usuario Maquinaria','usuarioservicios'=>'Usuario Servicios'], null, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
		</div>
	

		<div class="form-group">
		{!!Form::label('Region','Region')!!}
		{!!Form::select('region_id', $regiones, null, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
		</div>
		
		<div class="form-group">
			{!!Form::submit('Registrar', ['class'=>'btn btn-primary'])!!}
			<a href="{{route('admin.auth.login')}}" class="btn btn-info">Regresar</a><hr>
		</div>

	{!! Form::close() !!}
@endsection