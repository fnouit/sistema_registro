@extends('layout.app')
@section('titulo','Lista de Talleres')
@section('container')
        <div class="container pb30">
            <div class="row pb80">
                <div class="col-md-8 mr-auto ml-auto text-center">
                    <h2 class="font300 h1">
                        Lista de  <span class="text-primary">Talleres Preescolar 2019</span> 
                    </h2>
                </div>
            </div>
            <div class="pt20">
                <a href="{{route('registrar_taller')}}" type="button" class="button btn btn-outline-secondary">Nuevo taller</a>
            </div>            
            <div class="row pt20">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Ponente</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Limite</th>                            
                            <th scope="col">Configuración</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($talleres as $key => $taller)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$taller->titulo}}</td>
                                <td style="text-transform: uppercase;">{{$taller->ponente}}</td>
                                <td>{{$taller->descripcion}}</td>
                                <td>{{$taller->limite}}</td>
                                <td><a href="{{route('editar_taller',[$taller->id])}}" >Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    @section('banner2')
        <a href="{{route('registrarse')}}" class="btn btn-block btn-primary pt40 pb40 btn-lg">Regístrate antes del 25 de mayo y participa con nosotros en esta gran experiencia.</a>        
    @endsection

@stop