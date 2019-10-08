@extends('layout.app')
@section('titulo','Registro')
@section('container')


@section('banner')

        <section id="home">
            <div id="rev_slider_1078_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classic4export" data-source="gallery" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
                <!-- START REVOLUTION SLIDER 5.4.1 auto mode -->
                <div id="rev_slider_1078_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.1">
                    <ul>	
                        <li data-index="rs-3045" data-transition="parallaxtoleft" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000" data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                            <img src="images/bg3.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                        </li>
                        <li data-index="rs-3046" data-transition="parallaxtoleft" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000" data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                            <img src="images/bg4.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                        </li>
                    </ul>
                    <div class="tp-bannertimer" style="height: 7px; background-color: rgba(255, 255, 255, 0.25);"></div>	</div>
            </div><!-- END REVOLUTION SLIDER -->
        </section>

@endsection

        <div class="text-center">
        
            <h3 class="font300 mb20  h2">Regístro al <span class="text-primary">evento</span></h3>

            @if ($errors->any())
                <div class="alert alert-danger row div-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{ url('/registro') }}" method="post">
            {{ csrf_field() }} 
                <p class="lead">Datos Personales </p>
                <div class="row">
                    <div class="col-sm-6 form-group">      
                        <label for="nombre">INGRESA TÚ NOMBRE</label>          
                        <input id="nombre" type="text" name="nombre" class="form-control gui-input" style='text-transform:uppercase;' placeholder="*" value="{{ old('nombre')}}" >
                    </div>
                    <div class="col-sm-3 form-group">
                        <label for="apellido_paterno">PRIMER APELLIDO</label>          
                        <input id="apellido_paterno" type="text" name="apellido_paterno" class="form-control gui-input " style='text-transform:uppercase' placeholder="*" value="{{ old('apellido_paterno')}}">
                    </div>
                    <div class="col-sm-3 form-group">
                        <label for="apellido_materno">SEGUNDO APELLIDO</label>          
                        <input id="apellido_materno" type="text" name="apellido_materno" class="form-control gui-input" style='text-transform:uppercase' value="{{ old('apellido_materno')}}" >
                    </div>
                </div>                           

                <div class="row">
                    <div class="col-sm-5  form-group">
                        <label for="apellido_materno">CORREO ELECTRÓNICO</label>          
                        <input id="correo" type="email" name="correo" class="form-control" placeholder="*" value="{{old('correo')}}"  >
                    </div>
                    <div class="col-sm-5  form-group">
                        <label for="rfc">INGRESA TÚ RFC</label>
                        <input id="rfc" type="text" name="rfc" class="form-control" style='text-transform:uppercase' placeholder="*" value="{{old('rfc')}}" >
                    </div>
                    <div class="col-sm-2  form-group">
                    <label for="genero">GENERO</label>          
                        <select id="genero" name="genero" class="form-control">                            
                            <option></option>                    
                            <option value="OTRO">SIN ESPECIFICAR</option>                    
                            <option value="HOMBRE">HOMBRE</option>
                            <option value="MUJER">MUJER</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4  form-group">
                        <label for="telefono">¿TÚ TELÉFONO ES?</label>
                        <input id="telefono" type="tel" name="telefono" class="form-control" telefono value="{{old('telefono')}}">
                    </div>
                    <div class="col-sm-4  form-group">
                        <label for="facebook">¿CUÁL ES TU FACEBOOK?</label>
                        <input type="text" id="facebook" name="facebook" class="form-control" value="{{old('facebook')}}">       
                    </div>
                    <div class="col-sm-4  form-group">
                        <label for="twitter">¿CUÁL ES TU TWITTER?</label>
                        <input type="text" id="twitter" name="twitter" class="form-control" value="{{old('twitter')}}">
                    </div>                      
                </div> <hr>


                <div class="clearfix pt20" ></div>
                <p class="lead">¿Eres agremiado a la Sección 56 del SNTE? </p>  

                <div class="row" align="left">
                    <div class="col-md-12 form-group">
                        <div class="form-check ">
                            <input type="radio" class="form-check-input " id="check-radio1" name="radio" checked>
                            <label class="form-check-label" for="check-radio1">Sí, soy agremiado</label>
                        </div>
                        <div class="form-check ">
                            <input type="radio" class="form-check-input  " id="check-radio2" name="radio">
                            <label class="form-check-label" for="check-radio2">No, soy agremiado</label>
                        </div>                    
                    </div>









                </div><hr>


                <!-- <div class="clearfix pt20" ></div> -->
                <p class="lead">Datos Laborales </p>  

                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="region">SELECCIONA REGIÓN</label>
                        <select id="region" name="region"  class="form-control" value="">
                            <option value="">===</option>
                        </select>   
                    </div>
                    <div class="col-sm-3 form-group">
                        <label for="delegacion">DELEGACIÓN</label>
                        <input type="text" style='text-transform:uppercase' placeholder="*" id="delegacion" name="delegacion"  class="form-control" value="{{old('delegacion')}}">     
                    </div>
                    <div class="col-sm-3 form-group">
                        <label for="sede">SEDE DELEGACIONAL</label>
                        <input type="text" id="sede" name="sede" class="form-control" value="{{old('sede')}}" disabled>
                    </div>
                </div>



                <div class="row">
                    <div class="col-sm-4 form-group ">
                        <label for="numero_personal">¿TÚ NÚMERO DE PERSONAL ES?</label>
                        <input type="tel" placeholder="*" id="numero_personal" name="numero_personal" class="form-control" value="{{old('numero_personal')}}">
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="zona_escolar">¿CÚAL ES TU ZONA ESCOLAR?</label>
                        <input type="text" style='text-transform:uppercase' id="zona_escolar" name="zona_escolar" class="form-control" value="{{old('zona_escolar')}}">     
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="ct">CLAVE DEL TÚ CENTRO DE TRABAJO</label>
                        <input type="text" style='text-transform:uppercase' id="ct" name="ct" class="form-control" value="{{old('ct')}}">     
                    </div>                               
                </div>

                <div class="row ">
                    <div class="col-xs-12 col-sm-12  form-group pt20">
                        <center><button type="submit" data-btntext-sending="Sending..." class="button btn btn-primary">Regístrate</button></center>
                    </div>
                </div>
            </form>
        </div>

<hr>
        <div class="container pt90 pb60">
            <div id="buscar" class="row align-items-center">
                <div class="col-md-5 mb30">
                    <img src="images/about.png" alt="" class="img-fluid">
                </div>
                <div class="col-md-6 offset-md-1 mb30">
                    <h3 class="font300 mb20 h2">Verifica si ya te has  <span class="text-primary">registrado</span></h3>

                    <p>
                        Si ya te regístrate y deseas verificar tu información por favor ingresa tu Número de personal.
                    </p><br>
                    <form action="{{route('buscar')}}" method="get">
                    
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="tel" name="np" class="form-control form-control-lg mb20" placeholder="Ingresa tu Número de Personal">
                            </div>
                            <div class="col-md-6">
                                <span><small>Mostramos solo la información solicitada</small></span>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-outline-secondary btn-block">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div><!--/div-->
            </div>
        </div>

@stop