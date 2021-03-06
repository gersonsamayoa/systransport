@extends ('admin.template.main')
@section('title', 'Listado de Maquinaria Disponible para: ' . Auth::user()->region->descripcion)
@section('content')
@if(!(Auth::user()->gerentegeneral()))
<a href="{{route('admin.maquinaria.create')}}" class="btn btn-success">Nueva Maquina</a>
@endif
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
			<th>Imagen</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($maquinarias as $maquinaria)
				<tr>
					<td>{{$maquinaria->id}}</td>
					<td>{{$maquinaria->placa}}</td>
					<td>Q{{number_format($maquinaria->costoPorDia, '2','.',',')}}</td>
					<td>Q{{number_format($maquinaria->precio, '2','.' , ',')}}</td>

					<td>{{ $maquinaria->user->region->descripcion }}</td>
					<td>{{ $maquinaria->estadoEquipo->descripcion }}</td>
					<td>{{ $maquinaria->tipoMaquinaria->descripcion }}</td>
					@if($maquinaria->imagen)
					<td><img src="/images/{{ $maquinaria->imagen }}" width="50px"></td>
					@else
					<td></td>
					@endif
					<td><a href="{{route('admin.maquinaria.edit', $maquinaria->id)}}" class="btn btn-warning" title="Editar"><span class="glyphicon glyphicon-wrench"  aria-hidden="true"></span></a>
					<a href="{{ route('admin.maquinaria.destroy', $maquinaria->id)}}" onclick="return confirm('¿Seguro que desaes eliminarlo?')" class="btn btn-danger" title="Eliminar"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
{!!$maquinarias->render()!!}

@endsection