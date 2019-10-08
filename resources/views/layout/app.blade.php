<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from bootstraplovers.com/assan-kit-3.8/bootstrap4/website-templates/beauty-spa/html/index-onepage.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Oct 2018 18:09:15 GMT -->
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Intranet | @yield('titulo')</title>    
        <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}" sizes="90x90"/>
        <!-- Plugins CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/plugins.css') }}" >
        <!--dz parallaxer-->
        <link href="{{ asset('dzsparallaxer/dzsparallaxer.css')}}" rel="stylesheet">
        <link href="{{ asset('dzsparallaxer/scroller.css')}}" rel="stylesheet">
        <link href="{{ asset('dzsparallaxer/advancedscroller/plugin.css')}}" rel="stylesheet">
        <link href="{{ asset('linearicons/fonts.css')}}" rel="stylesheet">
        <!-- REVOLUTION STYLE SHEETS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('revolution/css/settings.css')}}">
        <!-- REVOLUTION LAYERS STYLES -->
        <link rel="stylesheet" type="text/css" href="{{ asset('revolution/css/layers.css')}}">
        <!-- REVOLUTION NAVIGATION STYLES -->
        <link rel="stylesheet" type="text/css" href="{{ asset('revolution/css/navigation.css')}}">
        <link href="{{ asset('css/style.css')}}" rel="stylesheet">
        
        <script src="{{ asset('js/formulario.js') }}" defer></script>
        


    </head>

    <body data-spy="scroll" data-target="#navbarsExampleDefault" data-offset="58">
        <div id="preloader">
            <div id="preloader-inner"></div>
        </div><!--/preloader-->




    @guest
        <nav class="navbar navbar-expand-lg navbar-light bg-white header-center navbar-onepage fixed-top">
            <div class="container">                
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="{{route('inicio')}}"><img src="{{asset('images/logo.png')}}" alt=""></a>
                <div class="collapse navbar-collapse" id="navbarsExampleDefault">

                    <ul class="navbar-nav mr-auto">                        
                        <li class="nav-item"><a data-scroll class="nav-link active" href="{{route('inicio')}}">Inicio</a></li>
                        <li class="nav-item"><a data-scroll class="nav-link" href="{{route('mostrar_talleres')}}">Talleres</a></li>
                        <li class="nav-item"><a data-scroll class="nav-link" href="{{route('verificacion')}}">Buscar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    @else
        <nav class="navbar navbar-expand-lg navbar-light bg-white header-center navbar-onepage fixed-top">
            <div class="container">                
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="{{route('inicio')}}"><img src="{{asset('images/logo.png')}}" alt=""></a>
                <div class="collapse navbar-collapse" id="navbarsExampleDefault">

                    <ul class="navbar-nav mr-auto">                        
                        <li class="nav-item"><a data-scroll class="nav-link active" href="{{ route('inicio')}}">Inicio</a></li>
                        <li class="nav-item"><a data-scroll class="nav-link" href="{{ route('home')}}">Registros</a></li>
                        <li class="nav-item"><a data-scroll class="nav-link" href="{{ url('/congreso-preescolar-2019/talleres')}}">Talleres</a></li>
                        <li class="nav-item"><a data-scroll class="nav-link" href="{{ route('verificacion')}}">Buscar</a></li>
                    </ul>
                    <ul class="navbar-nav ml-auto">                        
                       <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Hola | {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
    
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </a>
    
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @endguest
    @yield('banner')









        <div class="container pt90 pb60">
            @yield('container')
        </div>


        <center>
        @yield('banner2')
        </center>

        <div class="pt90 pb60">
            <div class="container">
                <div class="row align-items-center">
                    
                </div>
            </div>
        </div>








        
        
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb30">
                        <h4>Dirección</h4>
                        <ul class="list-unstyled contact">
                            <li><i class="fa fa-home"></i>
                                Pino Suárez 04, Col. Centro, C.P. 91000 <br>Xalapa, Veracruz.
                            </li>
                            <li><i class="fa fa-phone"></i>
                               228 817 1570
                            </li>
                            <li><i class="fa fa-paper-plane"></i>
                                <a href="http://www.snte.org.mx/seccion56/" target="_blanck">snte.org.mx/seccion56</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 mb30">
                        <h4>Horario</h4>
                        <ul class="list-unstyled">
                            <li>
                                Lunes - Viernes <br>09:00 am - 09:00 pm
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 mb30">
                        <h4>Privacidad</h4>
                        <p>                            
                            Los datos personales que recabamos los utilizaremos para: <br>
                            Compartir asuntos sindicales de orden educativo, laboral y de interés para el desarrollo profesional de los agremiados
                        </p>
                        <a href=" {{route('privacidad')}} " class="btn btn-white-outline"> Aviso de Privacidad</a>
                    </div>
                </div>
                <div class="row pt40">

                    <div class="col-md-6">
                        <a href="https://www.facebook.com/snteseccion56veracruz/" target="_blanck" class="social-icon-sm si-dark si-colored-facebook si-gray-round">
                            <i class="fa fa-facebook"></i>
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="https://twitter.com/snte56veracruz?lang=es" target="_blanck" class="social-icon-sm  si-dark si-colored-twitter si-gray-round">
                            <i class="fa fa-twitter"></i>
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="https://www.instagram.com/seccion.56.snte/" target="_blanck" class="social-icon-sm si-dark si-colored-google-plus si-gray-round">
                            <i class="fa fa-instagram"></i>
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                    <div class="col-md-6 text-right">
                        © Todos los Derechos Reservados │ Intranet Sección 56 - 2018
                    </div>
                </div>
            </div>
        </footer>
        <!--back to top-->
        <a href="#" class="back-to-top hidden-xs-down" id="back-to-top"><i class="fa fa-angle-up"></i></a>
        <!-- jQuery first, then Tether, then Bootstrap JS. -->
        <script type="text/javascript" src="{{ asset('js/plugins/plugins.js')}}"></script> 
        <script type="text/javascript" src="{{ asset('js/beauty.custom.js')}}"></script> 
        <!--dz parallaxer-->
        <script type="text/javascript" src="{{ asset('dzsparallaxer/dzsparallaxer.js')}}"></script>
        <script type="text/javascript" src="{{ asset('dzsparallaxer/scroller.js')}}"></script>
        <script type="text/javascript" src="{{ asset('dzsparallaxer/advancedscroller/plugin.js')}}"></script>
        <!-- REVOLUTION JS FILES -->
        <script type="text/javascript" src="{{ asset('revolution/js/jquery.themepunch.tools.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
        <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->	
        <script type="text/javascript" src="{{ asset('revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/revolution-custom.js')}}"></script> 
        @yield('script')
    </body>
</html>