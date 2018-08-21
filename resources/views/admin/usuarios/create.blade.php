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
		@if(Auth::user()->gerentegeneral())
		<div class="form-group">
		{!!Form::label('Tipo','Tipo')!!}
		{!!Form::select('tipoUsuario_id', ['gerentegeneral'=>'Gerente General','gerentemineria'=>'Gerente Mineria','gerenteproductos'=>'Gerente Productos','gerentemaquinaria'=>'Gerente Maquinaria','gerenteservicios'=>'Gerente Servicios'], null, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
		</div>
		@endif
		@if(Auth::user()->gerentemaquinaria() OR Auth::user()->gerenteproductos() OR Auth::user()->gerentemineria() OR Auth::user()->gerenteservicios())
		<div class="form-group">
		{!!Form::label('Tipo','Tipo')!!}
		{!!Form::select('tipoUsuario_id', ['empleadomineria'=>'Empleado Mineria', 'empleadoproductos'=>'Empleado Productos', 'empleadomaquinaria'=>'Empleado Maquinaria','empleadoservicios'=>'Empleado Servicios'], null, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
		</div>
		@endif
		@if(Auth::user()->empleadomaquinaria() OR Auth::user()->empleadoproductos() OR Auth::user()->empleadomineria() OR Auth::user()->empleadoservicios())
		<div class="form-group">
		{!!Form::label('Tipo','Tipo')!!}
		{!!Form::select('tipoUsuario_id', ['usuariomineria'=>'Usuario Mineria','usuarioproductos'=>'Usuario Productos','usuariomaquinaria'=>'Usuario Maquinaria','usuarioservicios'=>'Usuario Servicios'], null, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
		</div>
		@endif

		@if(!Auth::user())
		{!!Form::label('Tipo','Tipo')!!}
		{!!Form::select('tipoUsuario_id', ['usuariomineria'=>'Usuario Mineria','usuarioproductos'=>'Usuario Productos','usuariomaquinaria'=>'Usuario Maquinaria'], null, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
		</div>
		@endif

		@if(!(Auth::user()->gerentegeneral()))
		<div class="invisible">
		<div class="form-group">
		{!!Form::label('Region','Region')!!}
		{!!Form::text('region_id', Auth::user()->obtenerregion(), ['class'=>'form-control', 'placeholder'=>'example@correo.com', 'readonly'])!!}
		</div>
		</div>
		@else
		<div class="form-group">
		{!!Form::label('Region','Region')!!}
		{!!Form::select('region_id', $regiones, Auth::user()->obtenerregion(), ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
		</div>
		@endif

		
		<div class="form-group">
			{!!Form::submit('Registrar', ['class'=>'btn btn-primary'])!!}
			@if(Auth::user())
			<a href="{{route('admin.usuarios.index')}}" class="btn btn-info">
			Regresar</a><hr>
			@else
			<a href="{{route('admin.auth.login')}}" class="btn btn-info">
			Regresar</a><hr>
			@endif
		</div>

	{!! Form::close() !!}
@endsection