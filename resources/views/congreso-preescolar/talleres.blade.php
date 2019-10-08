@extends('layout.app')
@section('titulo','Mostrar talleres')
@section('container')

    <div class="container pt20 pb60">
        <h3 class="font300 mb20  h2" align="center"><strong><span class="text-primary">Talleres</span></strong></h3>
        <p class="lead " align="center">El registro a los taller tienen un cupo máximo de 60 personas.</p>
        <div class="row">
            @foreach($talleres as $key => $taller)
                @if(App\Usuario::where('taller_id',$taller->id)->count() < 3)
                    <div class="col-md-4 mb30">
                        <div class="pricing-card">               
                            <div class="row gallery-row">                    
                                <a href="../images/talleres/{{$taller->imagen_taller}}" class="gallery-item">
                                    <img src="../images/talleres/{{$taller->imagen_taller}}" alt="" class="img-fluid">
                                </a>                    
                            </div>
                            <h6 class="pt20 mb10">
                                Taller {{$key+1}}
                                <span style="color:#FFA500; font-size: 0.8rem;" class="float-right text-primary">
                                    Total de Registros <strong>{{$registros = App\Usuario::where('taller_id',$taller->id)->count()}}</strong>  / de 5
                                </span>    
                            </h6>
                            <h6 class="pt20 ">{{$taller->titulo}}</h6>
                            <p  style="text-transform: uppercase;">{{$taller->ponente}} </p>  
                            <a href="{{route('registrarse')}}" class="btn btn-outline-secondary">Regístrate</a> 
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div><hr>

    <h3 class="font300 pt20  h2" align="center">Talleristas</h3>


    <div class="container pt20 pb20">
        <div class="row align-items-center">
            <div class="col-md-5 mb30">
                <img src="{{asset('../images/talleristas/juan_rulfo.jpg')}}" alt="" class="img-fluid">
            </div>
            <div class="col-md-6 offset-md-1 mb30">
                <h3 class="font300 mb20 h2">Juan <span class="text-primary">Rulfo</span></h3>
                <p class="lead">
                (Apulco, Jalisco, 1918 - Ciudad de México, 1986) Escritor mexicano. Un solo libro de cuentos, El llano en llamas (1953), y una única novela, Pedro Páramo (1955), bastaron para que Juan Rulfo fuese reconocido como uno de los grandes maestros de la narrativa hispanoamericana del siglo XX. Su obra, tan breve como intensa, ocupa por su calidad un puesto señero dentro del llamado Boom de la literatura hispanoamericana de los años 60, fenómeno editorial que dio a conocer al mundo la talla de los nuevos (y no tan nuevos, como en el caso de Rulfo) narradores del continente.                </p><br>
            </div><!--/div-->
        </div>
    </div>


    <div class="container pt20 pb20">
        <div class="row align-items-center">            
            <div class="col-md-6 offset-md-1 mb30">
                <h3 class="font300 mb20 h2">Subscribe &amp; get <span class="text-primary">Discounts</span></h3>                
                <p class="lead">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penculus mus.
                </p>
            </div>
            <div class="col-md-5 mb30">
                <img src="{{asset('../images/g6.jpg')}}" alt="" class="img-fluid">
            </div>
        </div>
    </div>


@stop