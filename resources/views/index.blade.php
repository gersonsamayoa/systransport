@extends('admin.template.main')     
@section('carrusel')
<div class="container-fluid contenedor-carrusel">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                      <img src="{{asset('images/transport.jpg')}}" alt="Alt">
                      <div class="carousel-caption">
                        1
                      </div>
                    </div>
                    <div class="item">
                      <img src="{{asset('images/transport.jpg')}}" alt="Alt">
                      <div class="carousel-caption">
                        2
                      </div>
                    </div>
                  </div>
                  <!-- Controls -->
                  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
@endsection

@section('content')
<div class="row container">
                    <div class="col-md-4">
                    <div class="thumbnail panel panel-default">
                      <div class="panel-heading">Extracción y transporte de Materia Prima a diferentes partes de Guatemala</div>
                      <img src="{{asset('images/transport2.jpg')}}" alt="">
                      <div class="caption centrar">
                        <h3>Servicios de Mineria</h3>
                        <p><a href="#" class="btn btn-primary" role="button">Ver mas</a></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                       <div class="thumbnail panel panel-default">
                      <div class="panel-heading">Produción y envios de producos como: pisos, cerámicos y otros</div>
                      <img src="{{asset('images/transport3.jpg')}}" alt="">
                      <div class="caption centrar">
                        <h3>Productos de construcción</h3>
                        <p><a href="#" class="btn btn-primary" role="button">Ver mas</a></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                       <div class="thumbnail panel panel-default">
                      <div class="panel-heading">Venta y alquiler de maquinaria</div>
                      <img src="{{asset('images/transport1.jpg')}}" alt="">
                      <div class="caption centrar">
                        <h3>Venta y Alquiler</h3>
                        <p><a href="#" class="btn btn-primary" role="button">Ver mas</a></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-md-offset-4">
                       <div class="thumbnail panel panel-default">
                      <div class="panel-heading">Construcción de puentes, carreteras y edicios</div>
                      <img src="{{asset('images/transport4.jpg')}}" alt="">
                      <div class="caption centrar">
                        <h3>Servicios de Construcción</h3>
                        <p><a href="#" class="btn btn-primary" role="button">Ver mas</a></p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Footer -->
 
 <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <p class="text-muted">Proyecto Elaborado por: Gerson Arturo Samayoa Salazar <br>Carnet: 1790-03-11952</p>
      </div>
    </footer>

@endsection