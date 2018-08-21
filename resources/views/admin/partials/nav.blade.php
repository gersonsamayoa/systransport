<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="/" class="navbar-brand ">SysTransPort</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      @if(Auth::user())
        <ul class="nav navbar-nav">
            @if(Auth::user()->gerentemineria() OR Auth::user()->usuariomineria() OR Auth::user()->empleadomineria() OR Auth::user()->gerentegeneral())
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Planta de <br>Extracción</a>
                <ul class="dropdown-menu" role="menu">
                  @if (!Auth::user()->usuariomineria())
                  <li> <a href="#">Ingreso de Materias</a></li>
                  @endif
                  <li> <a href="#">Transacciones de Materias</a></li>
                </ul>
            </li>
            @endif
            @if(Auth::user()->gerenteproductos() OR Auth::user()->usuarioproductos() OR Auth::user()->empleadoproductos() OR Auth::user()->gerentegeneral())
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Planta de Proceso <br>de Materia prima</a>
                <ul class="dropdown-menu" role="menu">
                  @if (!Auth::user()->usuarioproductos())
                  <li> <a href="#">Ingreso de Productos</a></li>
                  @endif
                  <li> <a href="#">Transacciones de Productos</a></li>
                </ul>
            </li>
            @endif
            @if(Auth::user()->gerentemaquinaria() OR Auth::user()->usuariomaquinaria() OR Auth::user()->empleadomaquinaria() OR Auth::user()->gerentegeneral())
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Alquiler o<br>Venta</a>
                <ul class="dropdown-menu" role="menu">
                  @if (!Auth::user()->usuariomaquinaria())
                  <li> <a href="{{ route('admin.maquinaria.index') }}">Ingreso de Maquinaria</a></li>
                  @endif
                  <li><a href="{{ route('admin.transaccion.index') }}">Compras/Alquilares de Maquinaria</a></li>
                  </ul>
            </li>
          @endif

          @if(Auth::user()->gerenteservicios() OR Auth::user()->usuarioservicios() OR Auth::user()->empleadoservicios() OR Auth::user()->gerentegeneral())
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Servicios de <br>Construcción</a>
                <ul class="dropdown-menu" role="menu">
                  @if (!Auth::user()->usuarioservicios())
                  <li> <a href="#">Ingreso de Nuevos Servicios</a></li>
                  @endif
                  <li><a href="#">Transaccion de Servicios</a></li>
                 </ul>
            </li>
          @endif

          @if(Auth::user()->gerentemineria() OR Auth::user()->gerenteproductos()  OR Auth::user()->gerentemaquinaria() OR Auth::user()->gerentegeneral() OR Auth::user()->gerenteservicios() )
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Gestión de<br>Usuarios</a>
                <ul class="dropdown-menu" role="menu">
                  <li> <a href="{{ route('admin.usuarios.index') }}">Listado de Usuarios</a></li>
                </ul>
            </li>

            @endif
            @if(Auth::user()->empleadomineria() OR Auth::user()->empleadomaquinaria() OR Auth::user()->empleadoproductos() OR Auth::user()->empleadoservicios())
            
               
                  <li> <a href="{{ route('admin.usuarios.index') }}">Mis Clientes</a></li>
                
            @endif
          </ul>
         @endif

         @if(Auth::user())
          <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('admin.auth.logout')}}">Salir</a></li>
            </ul>
          </li>
        </ul>
         @else
         <ul class="nav navbar-nav navbar-right">
           <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> </a>
          <li><a href="{{ route('admin.auth.login') }}" title="Login">Login/SignUp <span class="glyphicon glyphicon-user"></span></a></li>
            <ul class="dropdown-menu">
              <li><a href="{{ route('admin.auth.logout')}}">Salir</a></li>
            </ul>       
            </li>
            </ul>
      @endif
      <ul class="nav navbar-nav navbar-right">
      <li><a href="{{ route('admin.auth.contacto') }}">Contacto</a></li>
    </ul>

</div>
</div>
</nav>