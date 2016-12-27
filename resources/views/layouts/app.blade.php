<!DOCTYPE html> <html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Financia Motors</title>
<link rel="icon" href="{{asset('images/icono_f.png')}}" type="image/x-icon" />
    <!-- Bootstrap core CSS -->

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('fonts/css/font-awesome.min.css')}}" rel="stylesheet">

    <link href="{{asset('css/jquery-ui.min.css')}}" rel="stylesheet">

    <link href="{{asset('css/jquery-ui.css')}}" rel="stylesheet">
    <link href="{{asset('css/jquery-ui.theme.css')}}" rel="stylesheet"> 
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/maps/jquery-jvectormap-2.0.3.css')}}" />
    <link href="{{asset('css/icheck/flat/green.css')}}" rel="stylesheet" />
    <link href="{{asset('css/floatexamples.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('css/tres.css')}}" rel="stylesheet" type="text/css" />


    <!--[if lt IE 9]>
    <script src="../assets/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body class="nav-md">

    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="home" class="site_title"><i class="fa fa-home"></i> <span>Administración</span></a>
                    </div>
                    <div class="clearfix"></div>

                    
                    <!-- menu prile quick info -->
                    @if(!Auth::guest())
                    <div class="profile">
                        <div class="profile_pic">
                           <img src="{{asset('assets/profile/'.Auth::user()->id.'/'.Auth::user()->img_src)}}" alt="..." class="img-circle profile_img">
                         </div>
                   
                        <div class="profile_info">
                            <span>Bienvenido</span>
                            <h2>{{Auth::user()->persona->nombre}}</h2>
                          <!--  <h5> Tipo Usuario @if(Auth::user()->TipoPermiso==2) Administrador @else Cotizador @endif</h5>
                       --> </div>
                    </div>
                   
                      @else
                      <div class="profile">
                       <div class="profile_pic">
                            <img src="{{ asset('images/img.jpg')}}" alt="..." class="img-circle profile_img">
                        </div>
                    <div class="profile_info">
                            <span>Inicia Session</span>
                            <h2>Invitado</h2>
                           
                        </div>
                    </div>
                      
                    @endif
                    <!-- /menu prile quick info -->

                    <br />
  @if(!Auth::guest())
                    <!-- sidebar menu -->
     <br />

                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
<hr>
        <div class="menu_section">

<ul class="nav side-menu">

                <li><a><i class="fa fa-car"></i> Vehiculos <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                       <li ><a>Vehiculo<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu" style="display: none;">
                               <li ><a href="{{url('admin/Vehiculo/create')}}">Alta Vehiculo</a></li>
                               <li ><a href="{{url('admin/Vehiculo')}}">Modificar/Eliminar</a></li>
                                <li ><a href="{{url('admin/Servicios_for_Vehiculo/')}}">Asignar Servicio a Vehiculo</a></li>
                               
                          </ul>
                        </li>
                         <li ><a>Tipo Vehiculo<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu" style="display: none;">
                               <li ><a href="{{url('admin/tipoVehiculo/create')}}">Alta Tipo de Vehiculo</a></li>
                               <li ><a href="{{url('admin/tipoVehiculo')}}">Modificar/Eliminar</a></li>
                            
                          </ul>
                        </li>
                         <li ><a>Marca<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu" style="display: none;">
                               <li ><a href="{{url('admin/Marca/create')}}">Alta Marca</a></li>
                               <li ><a href="{{url('admin/Marca')}}">Modificar/Eliminar</a></li>
                            
                          </ul>
                        </li>
                        <li ><a>Servicios<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu" style="display: none;">
                               <li ><a href="{{url('admin/Servicios/create')}}">Alta Servicio</a></li>
                               <li ><a href="{{url('admin/Servicios')}}">Modificar/Eliminar</a></li>
                            
                          </ul>
                        </li> 
                
                        
                            
             

 
                  </ul>
                </li> 

                <li><a><i class="fa fa-users"></i> Clientes <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                       <li ><a>Cliente<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu" style="display: none;">
                               <li ><a href="{{url('admin/Cliente/create')}}">Alta Clientes</a></li>
                               <li ><a href="{{url('admin/Cliente')}}">Modificar/Eliminar</a></li>
                            
                          </ul>
                        </li>
                            <li ><a>Empresa<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu" style="display: none;">
                               <li ><a href="{{url('admin/Empresa/create')}}">Alta Empresa</a></li>
                               <li ><a href="{{url('admin/Empresa')}}">Modificar/Eliminar</a></li>
                            
                          </ul>
                        </li>
 
                  </ul>
                </li>
                <li><a><i class="fa fa-user"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                       <li ><a>Vendedor<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu" style="display: none;">
                               <li ><a href="{{url('admin/Vendedor/create')}}">Alta Vendedor</a></li>
                               <li ><a href="{{url('admin/Vendedor')}}">Modificar/Eliminar</a></li>
                            
                          </ul>
                        </li>
 
                  </ul>
                </li>
                       <li><a><i class="fa fa-shopping-cart"></i> Ventas <span class="fa fa-chevron-down"></span></a> 
                          <ul class="nav child_menu" style="display: none;">
                               <li ><a href="#">Contabilidad</a></li>
                               <li ><a href="{{url('Ventas')}}">Ventas</a></li>

                               <li ><a href="{{url('Prospeccion/primera_etapa')}}">Prospeccion</a></li>
                            
                          </ul>
                        </li>
                       
 
                  </ul>
                </li>
  
  </ul>    

                                <!---->
      
 
  </div>
                    
                     
                    </div>
                    <!-- /sidebar menu -->
@endif
                    <!-- /menu footer buttons -->
              
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
              
                <ul class="nav navbar-nav">
                               </ul>

         
                  <ul class="nav navbar-nav">

     
  
          </ul>
       
     <!-- Right Side Of Navbar -->


            <ul class="nav navbar-nav navbar-right">
   @if(!Auth::guest())

                   
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                 <img src="{{asset('assets/profile/'.Auth::user()->id.'/'.Auth::user()->img_src)}}" > {{Auth::user()->persona->nombre}}
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li><a href="{{url('admin/Vendedor/'.Auth::user()->id.'/edit')}}"><i class="fa fa-user  pull-right"></i>Perfil</a></li>
                  <li><a href="{{ url('logout')}}"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesion</a>
                  </li>
                </ul>
              </li>
               <li></li>

          

   @endif


@if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Iniciar Sesion</a></li>

                 <li><a href="{{ url('/home') }}">Home</a></li>
                           @else
                         
        
 @endif
              <!--<li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <span class="badge bg-green">6</span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                  <li>
                    <a>
                      <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                    </a>
                  </li>
                  <li>
                    <div class="text-center">
                      <a href="inbox.html">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>-->

            </ul>
              
            </div>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->


            <!-- page content -->
            <div class="right_col" role="main">

                <div class="container-fluid" style="min-height:700px !important;">
                                    @yield('content')
 
                </div>
     

                <!-- footer content -->
          <div class="container-fluid" style="margin-bottom:1em !important;">
              <div class="center-block" align="center"  >
          Plataforma elaborada por  <a href="http://www.facebook.com/dante.rangel.robles" > Dante Rangel Robles </a>
            <br><a href="">Términos y condiciones uso</a> <a href="">Aviso de Privacidad</a> Todos los derechos reservados
        </div>
                
 
                <!-- /footer content -->
            </div>
             <div class="clearfix"></div>
         <!-- /footer content -->
            <!-- /page content -->

        </div>

    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

<script src="{{asset('js/jquery.js')}}"></script> 
  <script src="{{asset('js/bootstrap.min.js')}}"></script>

  <script src="{{asset('js/custom.js')}}"></script>
  <!-- bootstrap progress js -->
  <script src="{{asset('/js/progressbar/bootstrap-progressbar.min.js')}}"></script>
  <script src="{{asset('/js/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <!-- icheck -->
  <script src="{{asset('js/icheck/icheck.min.js')}}"></script>
 
  <!-- daterangepicker -->
  <script type="text/javascript" src="{{asset('/js/moment/moment.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/js/datepicker/daterangepicker.js')}}"></script>
  <!-- chart js -->
  <script src="{{asset('js/chartjs/chart.min.js')}}"></script>
  <!-- sparkline -->
  <script src="{{asset('js/sparkline/jquery.sparkline.min.js')}}"></script>

  <!-- skycons -->
  <script src="{{asset('js/skycons/skycons.min.js')}}"></script>

  <!-- flot js -->
  <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
  <script type="text/javascript" src="{{asset('js/flot/jquery.flot.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/flot/jquery.flot.pie.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/flot/jquery.flot.orderBars.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/flot/jquery.flot.time.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/flot/date.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/flot/jquery.flot.spline.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/flot/jquery.flot.stack.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/flot/curvedLines.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/flot/jquery.flot.resize.js')}}"></script>

  <script type="text/javascript" src="{{asset('js/notify/pnotify.core.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/notify/pnotify.buttons.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/notify/pnotify.nonblock.js')}}"></script>


  
  <script src="{{asset('js/jquery-ui.min.js')}}"></script>
  
    
   <script src="{{asset('js/validator/validator.js')}}"></script>
     <script src="{{asset('js/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('js/datatables/dataTables.bootstrap.js')}}"></script>
        <script src="{{asset('js/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('js/datatables/buttons.bootstrap.min.js')}}"></script>
        <script src="{{asset('js/datatables/jszip.min.js')}}"></script>
        <script src="{{asset('js/datatables/pdfmake.min.js')}}"></script>
        <script src="{{asset('js/datatables/vfs_fonts.js')}}"></script>
        <script src="{{asset('js/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{asset('js/datatables/buttons.print.min.js')}}"></script>
        <script src="{{asset('js/datatables/dataTables.fixedHeader.min.js')}}"></script>
        <script src="{{asset('js/datatables/dataTables.keyTable.min.js')}}"></script>
        <script src="{{asset('js/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('js/datatables/responsive.bootstrap.min.js')}}"></script>
        <script src="{{asset('js/datatables/dataTables.scroller.min.js')}}"></script>
        <script src="{{asset('js/pace/pace.min.js')}}"></script>
        <script src="{{asset('js/template.js')}}"></script>

<script type="text/javascript" src="{{ asset('js/bootstrap-filestyle.min.js') }}"> </script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    
 @yield('js')
 
 @if(Session::has('crear'))
  <script type="text/javascript"> 
    $(function() {
      new PNotify({
        title: "Transacción Exitosa",
        type: "dark",
        text: "{{Session::get('crear')}}",
   nonblock: {
          nonblock: false
        },
        hide: true,
          before_close: function(PNotify) {
            PNotify.update({
              title: PNotify.options.title + " - Enjoy your Stay",
              before_close: null
            });

            PNotify.queueRemove();

            return true;
          }
      });

    });
  </script>
  @endif
  @if(Session::has('actualizar'))
  <script type="text/javascript"> 
    $(function() {
      new PNotify({
        title: "Transacción Exitosa",
        type: "success",
        text: "{{Session::get('actualizar')}}",
   nonblock: {
          nonblock: false
        },
        hide: true,
          before_close: function(PNotify) {
            PNotify.update({
              title: PNotify.options.title + " - Enjoy your Stay",
              before_close: null
            });

            PNotify.queueRemove();

            return true;
          }
      });

    });
  </script>
  @endif
  @if(Session::has('eliminar'))
  <script type="text/javascript"> 
    $(function() {
      new PNotify({
        title: "Transacción Exitosa",
        type: "error",
        text: "{{Session::get('eliminar')}}",
   nonblock: {
          nonblock: false
        },
        hide: true,
          before_close: function(PNotify) {
            PNotify.update({
              title: PNotify.options.title + " - Enjoy your Stay",
              before_close: null
            });

            PNotify.queueRemove();

            return true;
          }
      });

    });
  </script>
  @endif
</body>

</html>
