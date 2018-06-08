@extends ('admin.template.main')
@section('title', 'Listado de usuarios '. Auth::user()->region->descripcion)
@section('content')
<a href="{{route('admin.usuarios.create')}}" class="btn btn-info">Nuevo Usuario</a>
<a href="{{route('admin.usuarios.informes')}}" class="btn btn-success">Generar Informe Usuarios</a>
<hr>
<div class="table-responsive">
	<table class="table table-striped table-hover">
		<thead>
			<th class="col-sm-1">ID</th>
			<th class="col-sm-2">Nombre</th>
			<th class="col-sm-2">Correo</th>
			<th class="col-sm-1">Tipo</th>
			<th class="col-sm-1">Region</th>
			<th class="col-sm-2">Empleado Asignado</th>
			<th class="col-sm-2">Acción</th>
		</thead>
		<tbody>
			@foreach($usuarios as $user)
				<tr>
					<td>{{$user->id}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>
					@if ($user->tipoUsuario->descripcion=='gerentegeneral' OR $user->tipoUsuario->descripcion=='gerentemineria' OR $user->tipoUsuario->descripcion=='gerenteproductos' OR $user->tipoUsuario->descripcion=='gerentemaquinaria' OR $user->tipoUsuario->descripcion=='gerenteservicios')
					<span class="label label-danger">{{$user->tipoUsuario->descripcion}}</span>
					@else
					@if ($user->tipoUsuario->descripcion=='empleadomaquinaria' OR $user->tipoUsuario->descripcion=='empleadomineria' OR $user->tipoUsuario->descripcion=='empleadoproductos')
					<span class="label label-warning">{{$user->tipoUsuario->descripcion}}</span>

					@else
					<span class="label label-primary">{{$user->tipoUsuario->descripcion}}</span>
					@endif
					@endif
					</td>
					<td>{{ $user->region->descripcion }}</td>
					
					@if(!($user->user_id))
						<td><span class="label label-danger">Pendiente</span></td>
					@else
					<td>{{ $user->parent->name}}</td>
					@endif
				
					<td><a href="{{route('admin.usuarios.edit', $user->id)}}" class="btn btn-warning" title="Editar"><span class="glyphicon glyphicon-wrench"  aria-hidden="true"></span></a>

					@if(!($user->user_id))
					<a href="{{route('admin.usuarios.assign', $user->id)}}" class="btn btn-success" title="Asignar"><span class="glyphicon glyphicon-ok" aria-hidden="true"> </span></a>
					@endif

					<a href="{{ route('admin.usuarios.destroy', $user->id)}}" onclick="return confirm('¿Seguro que desaes eliminarlo?')" class="btn btn-danger" title="Eliminar"><span class="glyphicon glyphicon-remove"  aria-hidden="true" ></span></a></td>

				</tr>
			@endforeach
		</tbody>
	</table>
</div>
	{!!$usuarios->render()!!}

@endsection
