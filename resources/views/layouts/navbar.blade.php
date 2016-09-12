<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>CNKTCOTIZA</title>

    <link rel="shortcut icon" href="{{asset('img/icon/icon.png')}}">
    <!-- Fonts -->

 
    <!-- Styles -->
    
    

  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('css/custom-styles.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui.min.css')}}">


  
   @yield('css')
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
  <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><i class="fa fa-comments"></i> <strong>MASTER </strong></a>
            </div>
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>           
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
              
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">CNKTCOTIZA</a></li>
                </ul>

            @if(!Auth::guest())
                  <ul class="nav navbar-nav">

            <li ><a  href="{{ url('cotiza') }}">Cotizador</a></li>
          
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Administración<span class="caret"></span></a>
              <ul class="dropdown-menu">
          
                 <li><a href="{{ url('') }}" ></a></li>
             
                <li><a  href="{{ url('') }}" ></a></li>
                 
                <li><a href=""></a></li>


              </ul>
            </li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administracion Usuarios <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="../admin/modificarUsuarios.php" >Modificar Usuarios</a></li>
                      <li role="separator" class="divider"></li>
                  <li><a href="../admin/agregarUsuario.php" >Agregar Elementos de la Empresa</a></li>
                  
                    
                 </ul>
          </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">A<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">A</a></li>
                <li><a href="#">B</a></li>
                <li><a href="#">C</a></li>
              </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">B<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">A</a></li>
                <li><a href="#">B</a></li>
                <li><a href="#">C</a></li>
                <li><a href="{{ url('/registrar') }}">Registrar</a></li>
                         
              
              </ul>
            </li>
              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">C<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">A</a></li>
                <li><a href="#">B</a></li>
                <li><a href="#">C</a></li>
              </ul>
            </li>
          </ul>
          @endif
     <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Iniciar Sesion</a></li>

                           @else
                         
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->nombres }} <span class="caret"></span>
                            </a>


                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Cerrar Sesion</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

    </nav>

    <!---->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="ui-elements.html"><i class="fa fa-desktop"></i> UI Elements</a>
                    </li>
          <li>
                        <a href="chart.html"><i class="fa fa-bar-chart-o"></i> Charts</a>
                    </li>
                    <li>
                        <a href="tab-panel.html" class="active-menu"><i class="fa fa-qrcode"></i> Tabs & Panels</a>
                    </li>
                    
                    <li>
                        <a href="table.html"><i class="fa fa-table"></i> Responsive Tables</a>
                    </li>
                    <li>
                        <a href="form.html"><i class="fa fa-edit"></i> Forms </a>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>

                                </ul>

                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="empty.html"><i class="fa fa-fw fa-file"></i> Empty Page</a>
                    </li>
                </ul>

            </div>

        </nav>
    <!---->
    <br><br><br>
    <!-- JavaScripts -->

  <script src="{{asset('js/jquery-1.11.3.min.js')}}"></script>
  <script src="{{asset('js/jquery-ui.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>

  <script src="{{asset('js/custom-scripts.js')}}"></script>

  <script src="{{asset('js/custom.js')}}"></script>

  <script src="{{asset('js/jquery.metisMenu.js')}}"></script>

@yield('scripts')
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    @yield('content')






  <nav class="navbar  navbar-fixed-bottom" role="navigation">

    
        <div class="row center-block" align="center">
          Plataforma elaborada por  <a href=" " >Dante Rangel</a>
            <br><a href="">Términos y condiciones uso</a> <a href="">Aviso de Privacidad</a> Todos los derechos reservados
        </div>
    
 
  </nav>

   
    

    </body>
</html>
    

