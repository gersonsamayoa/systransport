@extends('admin.template.main')

@section('title','Maquinaria Disponible para: ' . Auth::user()->region->descripcion)

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
       <div class="row container">
				@foreach($maquinarias as $maquinaria)
                    <div class="col-md-4">
                    <div class="thumbnail panel panel-default">
                      <div class="panel-heading">Placa:{{ $maquinaria->placa }}</div>
                      <img src="/images/{{ $maquinaria->imagen }}" >
                      <div class="caption centrar">
                           	@if($maquinaria->precio != 0)
                        	<h4>Precio: Q{{number_format($maquinaria->precio, '2','.' , ',')}}</h4>
                        	 <p align="center">
                        	<a href="{{route('admin.transaccion.comprar', [$maquinaria->id, 'Compra'] )}}" class="btn btn-info" role="button">Comprar</a>   </p>
                        	@else
                        	<h4>Valor por día: Q{{number_format($maquinaria->costoPorDia, '2','.' , ',')}}</h4>
                        	 <p align="center">
                        	<a href="{{route('admin.transaccion.alquilar',[ $maquinaria->id, 'Alquiler'])}}" class="btn btn-success" role="button">Alquilar</a></p>
                        	@endif
               
                       </div>
                    </div>
                  </div>
            
                  @endforeach    
                         </div>   
	@endsection