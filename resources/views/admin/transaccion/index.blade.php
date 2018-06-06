@extends ('admin.template.main')
@section('title', 'Listado de Transacciones')
@section('content')
<a href="{{route('admin.transaccion.create')}}" class="btn btn-info">Nueva Compra o Alquiler</a>
<hr>

<div class="table-responsive">
	<table class="table table-striped table-hover">
		<thead>
			<th>ID</th>
			<th>Tipo Transaccion</th>
			<th>Cliente</th>
			<th>Maquina</th>
			<th>Estado</th>
			<th>Cantidad Dias</th>
			<th>Total</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($transacciones as $transaccion)
				<tr>
					<td>{{$transaccion->id}}</td>
					<td>{{$transaccion->tipoTransaccion_id}}</td>
					<td>{{$transaccion->user_id}}</td>
					<td>{{$transaccion->maquinaria_id}}</td>
					<td>{{ $transaccion->estadoTransaccion_id}}</td>
					<td>{{ $transaccion->cantidadDias }}</td>
					<td>{{ $transaccion->total }}</td>
					<td><a href="{{route('admin.transaccion.edit', $transaccion->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
					<a href="{{ route('admin.transaccion.destroy', $transaccion->id)}}" onclick="return confirm('¿Seguro que desaes eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-record" aria-hidden="true"></span></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
{!!$transacciones->render()!!}

@endsection