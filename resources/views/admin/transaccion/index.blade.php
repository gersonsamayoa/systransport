@extends ('admin.template.main')
@section('title', 'Listado de Transacciones del ' . Auth::user()->name . ' de: ' . Auth::user()->region->descripcion)
@section('content')
@if((Auth::user()->usuariomaquinaria()))
<a href="{{route('admin.transaccion.create')}}" class="btn btn-info">Nueva Compra o Alquiler</a>
@endif
<hr>

<div class="table-responsive">
	<table class="table table-striped table-hover">
		<thead>
			<th>ID</th>
			<th>Tipo Transaccion</th>
			<th>Cliente</th>
			<th>Region</th>
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
					<td>
					@if($transaccion->tipoTransaccion->descripcion=="Alquiler")
					<span class="label label-info">
					@else
					<span class="label label-warning">
					@endif
					{{$transaccion->tipoTransaccion->descripcion}}</span></td>
					<td>{{$transaccion->user->name}}</td>
					<td>{{ $transaccion->user->region->descripcion }}</td>
					<td>{{$transaccion->maquinaria->placa}}</td>
					<td>
						@if($transaccion->estadoTransaccion->descripcion=="Finalizada")
						<span class="label label-success">
						@else
						<span class="label label-danger">
						@endif
						{{ $transaccion->estadoTransaccion->descripcion}}</span></td>
					@if($transaccion->tipoTransaccion->descripcion=="Alquiler")
					<td>{{ $transaccion->cantidadDias }}</td>
					@else
					<td></td>
					@endif
					
					<td>{{ $transaccion->total }}</td>
					<td>
					@if((Auth::user()->empleadomaquinaria()))
					<a href="{{route('admin.transaccion.edit', $transaccion->id)}}" class="btn btn-warning" title="Validar"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>

					<a href="{{ route('admin.transaccion.destroy', $transaccion->id)}}" onclick="return confirm('¿Seguro que desaes eliminarlo?')" class="btn btn-danger" title="Eliminar"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
					@endif

					@if(Auth::user()->usuariomaquinaria() And $transaccion->estadoTransaccion->descripcion=="Finalizada")
					<a href="{{route('admin.transaccion.informes', $transaccion->id)}}" class="btn btn-primary" title="Imprimir Factura"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
					@endif

					@if(Auth::user()->usuariomaquinaria() And $transaccion->estadoTransaccion->descripcion=="Finalizada" And $transaccion->tipoTransaccion->descripcion=="Alquiler")
					<a href="{{route('admin.transaccion.informes', $transaccion->id)}}" class="btn btn-danger" title="Finalizar Alquiler"><span class="glyphicon glyphicon-time" aria-hidden="true"></span></a>
					@endif

					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

{!!$transacciones->render()!!}

@endsection