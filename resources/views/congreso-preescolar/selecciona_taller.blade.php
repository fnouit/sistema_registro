@extends('layout.app')
@section('titulo','Selecciona Taller')
@section('container')

    @if ($errors->any())
        <div class="alert alert-danger row div-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <div class="container pt0 pb60">
            <div class="row mb50">
                <div class="col-md-10 ml-auto mr-auto">
                    <form action="{{route('actualizar_usuario_taller',[$usuario->id])}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <p class="lead"><strong>{{$usuario->nombre}} {{$usuario->apellido_p}}</strong></p>
                        <p class="lead pt20">Selecciona el Taller al que deseas asistir.</p>
                        <div class="row ">
                            <div class="col-sm-12 form-group">      
                                <select id="seleccion_taller" name="seleccion_taller" class="form-control" required>                            
                                    <option value="" selected disabled hidden>TALLERES DISPONIBLES</option>    
                                    @foreach($talleres as $key => $taller) 
                                        {{$users = App\Usuario::where('taller_id',$taller->id)->count()}}   
                                        @if($users < $taller->limite)
                                            <option value="{{$taller->id}}" style="text-transform: uppercase;">{{$taller->titulo}}</option>
                                        @endif

                                    @endforeach                                                 
                                </select>
                                <span class="pt20">Si el taller no se encuentra es por que ha superado el limite de registros. </span>
                            </div>
                        </div>       
                        <button type="submit" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i> IMPRIMIR FOLIO</button>                           
                    </form>  
                </div>          
            </div>
            <hr class="mb80">
        </div>
@stop