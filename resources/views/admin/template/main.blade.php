<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SysTransport 1.0</title>

    <!-- Bootstrap core CSS -->
   
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
     <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/css/estilos.css')}}">
</head>

<body>
@include('admin.partials.nav')
@yield('carrusel')
        <div class="container">
                <h2>@yield('title')</h2>
                <h3>@yield('subtitle')</h3>

                <section class="container">
                @include('flash::message')
                @yield('content')
                </section>
        </div>
  

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset ('plugins/jquery/jquery.js')}}"></script>
    <script src="{{asset ('plugins/jquery/dropdown.js')}}"></script>
    <script src="{{asset ('plugins/bootstrap/js/bootstrap.js')}}"></script>
    
</body>
</html>