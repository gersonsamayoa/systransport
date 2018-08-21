@extends('admin.template.main')

@section('title','Editar Usuario '. $user->name)

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

	{!! Form::open(['route' =>['admin.usuarios.update', $user->id], 'method'=>'PUT']) !!}

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
		{!!Form::label('Tipo','Tipo')!!}
		{!!Form::select('tipoUsuario_id', ['gerentegeneral'=>'Gerente General','gerentemineria'=>'Gerente Mineria','gerenteproductos'=>'Gerente Productos','gerentemaquinaria'=>'Gerente Maquinaria','gerenteservicios'=>'Gerente Servicios'], $user->tipoUsuario->descripcion, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
		</div>
		@endif
		@if(Auth::user()->gerentemaquinaria() OR Auth::user()->gerenteproductos() OR Auth::user()->gerentemineria() OR Auth::user()->gerenteservicios())
		<div class="form-group">
		{!!Form::label('Tipo','Tipo')!!}
		{!!Form::select('tipoUsuario_id', ['usuariomineria'=>'Usuario Mineria','usuarioproductos'=>'Usuario Productos','usuariomaquinaria'=>'Usuario Maquinaria','usuarioservicios'=>'Usuario Servicios', 'empleadomineria'=>'Empleado Mineria', 'empleadoproductos'=>'Empleado Productos', 'empleadomaquinaria'=>'Empleado Maquinaria', 'empleadoservicios'=>'Empleado Servicios'], $user->tipoUsuario->descripcion, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
		</div>
		@endif
		@if(Auth::user()->empleadomaquinaria() OR Auth::user()->empleadoproductos() OR Auth::user()->empleadomineria() OR Auth::user()->empleadoservicios())
		<div class="form-group">
		{!!Form::label('Tipo','Tipo')!!}
		{!!Form::select('tipoUsuario_id', ['usuariomineria'=>'Usuario Mineria','usuarioproductos'=>'Usuario Productos','usuariomaquinaria'=>'Usuario Maquinaria', 'usuarioservicios'=>'Usuario Servicios'], $user->tipoUsuario->descripcion, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
		</div>
		@endif
		
		<div class="form-group">
		{!!Form::label('region','Region')!!}
		{!!Form::select('region_id', ['Guatemala'=>'Guatemala','Xela'=>'Xela','Zacapa'=>'Zacapa','Peten'=>'Petén'], $user->region->descripcion, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
		</div>

		<div class="form-group">
			{!!Form::submit('Editar', ['class'=>'btn btn-primary'])!!}
			<a href="{{route('admin.usuarios.index')}}" class="btn btn-info">Regresar</a><hr>
		</div>

	{!! Form::close() !!}
@endsection