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
  	<h1>Factura</h1>
	 <table width="100%" border=1 cellspacing=0 cellpadding=2 bordercolor="666633">

	<thead>
		<tr>
			<th class="col-sm-1">ID</th>
			<th class="col-sm-2">CantidadDias</th>
			<th class="col-sm-2">Total</th>
			<th class="col-sm-1">Usuario</th>
			<th class="col-sm-1">Direccion</th>
			<th class="col-sm-1">Transaccion</th>
			<th class="col-sm-2">Maquinaria</th>
		</tr>
		</thead>
		<tbody>
			@foreach($transacciones as $transaccion)
				<tr>
					<td>{{$transaccion->id}}</td>
					<td>{{$transaccion->cantidadDias}}</td>
					<td>Q{{number_format($transaccion->total, '2','.' , ',')}}</td>
					<td>{{ $transaccion->user->name }}</td>
					<td>{{ $transaccion->user->region->descripcion }}</td>
					<td>{{ $transaccion->tipoTransaccion->descripcion }}</td>
					<td>{{ $transaccion->maquinaria->placa }}</td>
					
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
