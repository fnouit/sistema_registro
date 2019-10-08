@extends('layout.app')
@section('titulo','Inicio')
@section('container')


@section('banner')

        <section id="home">
            <div id="rev_slider_1078_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classic4export" data-source="gallery" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
                <!-- START REVOLUTION SLIDER 5.4.1 auto mode -->
                <div id="rev_slider_1078_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.1">
                    <ul>	
                        <li data-index="rs-3045" data-transition="parallaxtoleft" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000" data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                            <img src="{{asset('images/bg5.jpg')}}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                        </li>
                    </ul>
                    <div class="tp-bannertimer" style="height: 7px; background-color: rgba(255, 255, 255, 0.25);"></div>	</div>
            </div><!-- END REVOLUTION SLIDER -->
        </section>

@endsection

        <div class="container pb30">
            <div class="row pb80">
                <div class="col-md-8 mr-auto ml-auto text-center">
                    <h2 class="font300 h1">
                        Congreso <span class="text-primary">Preescolar 2019</span> 
                    </h2>
                    <p class="lead">
                        “EDUCACIÓN SOCIOECONÓMICA EN PREESCOLAR. <br>PARADIGMA DEL SIGLO XXI”
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb30">
                    <a href="{{route('registrarse')}}">
                        <img src="{{asset('images/img1.jpg')}}" alt="" class="img-fluid mb20">
                        <h4>Registro al Congreso</h4>
                    </a>
                    <p>
                        Asiste al 2º Congreso de Preescolar que la Sección 56 del SNTE realiza para ti y conoce que se está haciendo en materia de Innovación Educativa.                    
                    </p>
                </div>
                <div class="col-md-4 mb30">
                    <a href="{{route('verificacion')}}">
                        <img src="{{asset('images/img4.jpg')}}" alt="" class="img-fluid mb20">
                        <h4>Verifica tu FOLIO</h4>
                    </a>
                    <p>
                        Consulta con tu número personal si ya te encuentra inscrito. Teclea tu número, espacios y oprime el botón buscar.
                    </p>
                </div>
                <div class="col-md-4 mb30">
                    <a href="{{route('mostrar_talleres')}}">
                        <img src="{{asset('images/img5.jpg')}}" alt="" class="img-fluid mb20">
                        <h4>¿Cuales son los Talleres?</h4>
                    </a>
                    <p>
                    Descripción de los 15 talleres que se impartirán brindando herramientas a los docentes para realizar mejor su desempeño profesional.                     </p>
                </div>
            </div>
        </div> 


        <div class="container pt90 pb60">
            <h4 class="text-center mb50 font700 h2">Conferencias</h4>
            <div class="row align-items-center">
                <div class="row gallery-row col-md-6 mb30">
                    <a href="../images/talleristas/conferencia_1.jpg" class="gallery-item">
                        <img src="images/talleristas/conferencia_1.jpg" alt="" class="img-fluid">
                    </a>                    
                </div>
    
                <div class="row gallery-row col-md-6 mb30">                    
                    <a href="../images/talleristas/conferencia_2.jpg" class="gallery-item">
                        <img src="images/talleristas/conferencia_2.jpg" alt="" class="img-fluid">
                    </a>                    
                </div>
            </div>
        </div>

        
        
        
        
        
        
        


<center>
    <div class="container pb30">
    <h4 class="text-center mb50 font700 h2">Panel de Especialistas</h4>
        <div class="row pb80">
            <div class="col-md-12 mb30" >

                <h4 class="mb30">Percepción del nuevo modelo educativo en Preescolar </h4>
                <div class="owl-carousel owl-theme owl-testimonials">
                    <div class="item">
                        <div class="testi-author">
                            <i class="icon-user"></i>
                        </div>
                        <p>
                            Emociones orientadas al aprendizaje
                        </p>
                        <h6>Lic. Lorenzo Gómez Lozano</h6>
                    </div> 
                    <div class="item">
                        <div class="testi-author">
                            <i class="icon-user"></i>
                        </div>
                        <p>
                            Nuevo modelo educativo para preescolar
                        </p>
                        <h6>Lic. Amanda Cano</h6>
                    </div> 
                    <div class="item">
                        <div class="testi-author">
                            <i class="icon-user"></i>
                        </div>
                        <p>
                            Modelo Educativo
                        </p>
                        <h6>Lic. Oralia Bonilla</h6>
                    </div> 
                    <div class="item">
                        <div class="testi-author">
                            
                            <img src="{{asset('images\talleristas\dra.jpg')}}" class="img-circle" alt="Cinque Terre">
                        </div>
                        <p>
                            Gestión escolar
                        </p>
                        <h6>Lic. Raymundo Trilla</h6>
                    </div> 
                    <div class="item">
                        <div class="testi-author">
                            <img src="{{asset('images\talleristas\dra.jpg')}}" class="img-circle" alt="Cinque Terre">

                        </div>
                        <p>
                            Nuevo programa de Preescolar
                        </p>
                        <h6>Dra. María Teresa Meléndez Irigoyen</h6>
                    </div> 

                </div>
            </div>
        </div>
    </div>




    
</center>




    @section('banner2')
        <a href="{{route('registrarse')}}" class="btn btn-block btn-primary pt40 pb40 btn-lg">Regístrate antes del 25 de mayo y participa con nosotros en esta gran experiencia.</a>        
    @endsection

@stop