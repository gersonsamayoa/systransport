@extends ('admin.template.main')
@section('title', 'Listado de Maquinaria Disponible')
@section('content')
<a href="{{route('admin.maquinaria.create')}}" class="btn btn-info">Nueva Maquina</a>
<hr>

<div class="table-responsive">
	<table class="table table-striped table-hover">
		<thead>
			<th>ID</th>
			<th>Placa</th>
			<th>Costo por Dia</th>
			<th>Precio</th>
			<th>Region</th>
			<th>Estado</th>
			<th>Tipo</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($maquinarias as $maquinaria)
				<tr>
					<td>{{$maquinaria->id}}</td>
					<td>{{$maquinaria->placa}}</td>
					<td>{{$maquinaria->costoPorDia}}</td>
					<td>{{$maquinaria->precio}}</td>
					<td>{{ $maquinaria->user->region->descripcion }}</td>
					<td>{{ $maquinaria->estadoEquipo->descripcion }}</td>
					<td>{{ $maquinaria->tipoMaquinaria->descripcion }}</td>
					<td><a href="{{route('admin.maquinaria.edit', $maquinaria->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
					<a href="{{ route('admin.maquinaria.destroy', $maquinaria->id)}}" onclick="return confirm('¿Seguro que desaes eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-record" aria-hidden="true"></span></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
{!!$maquinarias->render()!!}

@endsection