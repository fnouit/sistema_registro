@extends('layout.app')
@section('titulo','Confirmación')
@section('container')

@section('banner')
        <div class="dzsparallaxer auto-init height-is-based-on-content "  data-options='{   direction: "reverse"}'>
            <div class="divimage dzsparallaxer--target " style="width: 101%; height: 130%; background-image: url(images/bg2.jpg)">
            </div>
            <div class="semi-black-overlay"></div>
            <div class="container pt100 pb100">
                <div class="row">
                    <div class="col-md-8 mr-auto ml-auto">
                        <h3 class="h1 text-center font300 text-white">Confirmación</h3>
                    </div>
                </div>
            </div>
            <div class="dzsprxseparator--2triangles"></div>
        </div><!--parallax-->
@endsection

        <div class="container pt0 pb60">
            <div class="row mb50">
                <div class="col-md-10 ml-auto mr-auto text-center">
                    <p class="lead">
                        Muchas gracias <strong>{{$usuario->nombre}}</strong>, nuestra meta es brindar herramientas a los docentes para mejorar su desempeño profesional y de esta manera lograr la mejora de la calidad en la educación.
                    </p>

                </div>
            </div>            
            <div class="row mb50">
                <div class="col-md-6 ml-auto mr-auto text-center">
                    <a href="{{route('folio',[$usuario->codigo_confirmacion])}}" class="btn btn-outline-primary">
                        <i class="fa fa-print fa-3x" aria-hidden="true"></i>
                        Descarga tu FOLIO
                    </a>                    
                </div>
            </div>            


            <div class="row mb50">
                <div class="col-md-6 ml-auto mr-auto text-center">
                    <a href=" {{ route('inicio') }} " style="margin-top:35px;box-sizing:border-box;border-radius:3px;color:#fff;display:inline-block;text-decoration:none;background-color:#ed8407;border-top:10px solid #ed8407;border-right:18px solid #ed8407;border-bottom:10px solid #ed8407;border-left:18px solid #ed8407">
                        <i class="fa fa-home" aria-hidden="true"></i>                           
                        Terminar proceso de registro
                    </a>                                        
                </div>
            </div>            



            <hr class="mb80">
        </div>

@stop