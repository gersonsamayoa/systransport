@extends ('admin.template.main')
@section('title', 'Listado de Transacciones')
@section('content')
@if((Auth::user()->usuariomaquinaria()))
<a href="{{route('admin.transaccion.create')}}" class="btn btn-info">Nueva Compra o Alquiler</a>
@endif

@if((Auth::user()->gerentegeneral()))
<a href="{{route('admin.transaccion.informes')}}" class="btn btn-info">Imprimir Informe</a>
@endif

<hr>

<div class="table-responsive">
	<table class="table table-striped table-hover">
		<thead>
			<th>ID</th>
			<th>Fecha</th>
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
					<td>{{$transaccion->fecha}}</td>
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
					<td>Q{{number_format($transaccion->total, '2','.',',')}}</td>
					<td>
					@if((Auth::user()->empleadomaquinaria()))
					<a href="{{route('admin.transaccion.edit', $transaccion->id)}}" class="btn btn-warning" title="Validar"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>

					@if($transaccion->estadoTransaccion->descripcion!="Finalizada")
					<a href="{{ route('admin.transaccion.destroy', $transaccion->id)}}" onclick="return confirm('¿Seguro que desaes eliminarlo?')" class="btn btn-danger" title="Eliminar"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
					@endif
					@endif

					@if(Auth::user()->usuariomaquinaria() And $transaccion->estadoTransaccion->descripcion=="Finalizada")
					<a href="{{route('admin.transaccion.informes', $transaccion->id)}}" class="btn btn-primary" title="Imprimir Factura"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
					@endif

					@if(Auth::user()->usuariomaquinaria() And $transaccion->estadoTransaccion->descripcion=="Finalizada" And $transaccion->tipoTransaccion->descripcion=="Alquiler")
					@endif

					</td>
				</tr>
			@endforeach

			@if((Auth::user()->gerentegeneral()))
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>Q{{number_format($sum, '2','.',',') }}</td>
			</tr>
			@endif
		</tbody>
	</table>
</div>

{!!$transacciones->render()!!}

@endsection