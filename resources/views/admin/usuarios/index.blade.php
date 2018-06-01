@extends ('admin.template.main')
@section('title', 'Listado de usuarios')
@section('content')
<a href="{{route('admin.usuarios.create')}}" class="btn btn-info">Nuevo Usuario</a>
<hr>
<div class="table-responsive">
	<table class="table table-striped table-hover">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Correo</th>
			<th>Tipo</th>
			<th>Region</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($usuarios as $user)
				<tr>
					<td>{{$user->id}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>
					@if ($user->tipoUsuario->descripcion=='gerentegeneral' OR $user->tipoUsuario->descripcion=='gerentemineria' OR $user->tipoUsuario->descripcion=='gerenteproductos' OR $user->tipoUsuario->descripcion=='gerentemaquinaria')
					<span class="label label-danger">{{$user->tipoUsuario->descripcion}}</span>
					@else
					<span class="label label-primary">{{$user->tipoUsuario->descripcion}}</span>
					@endif
					</td>
					<td>{{ $user->region->descripcion }}</td>
					<td><a href="{{route('admin.usuarios.edit', $user->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>

					<a href="{{ route('admin.usuarios.destroy', $user->id)}}" onclick="return confirm('¿Seguro que desaes eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-record" aria-hidden="true"></span></a></td>

				</tr>
			@endforeach
		</tbody>
	</table>
</div>
	{!!$usuarios->render()!!}

@endsection
