<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Vaciado</title>
    <style type="text/css">
    	html {
		margin: 0;
		}
		body {
		margin: 10mm 7mm 10mm 7mm;
		}
    </style>
  </head>
  <body>
  	<h1>Listado de Usuarios</h1>
	 <table width="100%" border=1 cellspacing=0 cellpadding=2 bordercolor="666633">

	<thead>
		<tr>
			<th class="col-sm-1">ID</th>
			<th class="col-sm-2">Nombre</th>
			<th class="col-sm-2">Correo</th>
			<th class="col-sm-1">Tipo</th>
			<th class="col-sm-1">Region</th>
			<th class="col-sm-2">Empleado Asignado</th>
		</tr>
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
				
					

				</tr>
			@endforeach
		</tbody>
	</table>
</div>
