@extends('layout.app')
@section('titulo','Busqueda')
@section('container')            
            <div class="container pt40 pb100">
                <div class="row text-center">
                    <div class="col-md-10 mr-auto ml-auto">    
                        @if(count($usuario)>0)
                            @foreach($usuario as $user)  


                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="2">INFORMACIÓN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">AGREMIADO A LA SECCIÓN 56 DEL SNTE </th>
                                        <td>{{$user->agremiado}}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">USUARIO: </th>
                                        <td>{{$user->apellido_p}} {{$user->apellido_m}} {{$user->nombre}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">TALLER AL QUE DESEAS ASISTIR: </th>
                                        <td style="text-transform: uppercase;">TALLER <br> {{$user->taller->titulo}}</td>
                                    </tr>                                           
                                    <tr>
                                        <th scope="row">FECHA DEL EVENTO: </th>
                                        <td>LUNES 10 DE JUNIO DE 2019, 09:00 hrs.</td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="col-md-10 ml-auto mr-auto text-center">
                                <a href="{{route('folio',[$user->codigo_confirmacion])}}" class="btn btn-primary">
                                    <i class="fa fa-print" aria-hidden="true"></i>
                                    DESCARGA CÓDIGO 
                                </a> 
                            </div>





                            @endforeach 
                        @else
                            <h3 class="font300 mb20 h2">NO HAY   <span class="text-primary">REGISTRO</span></h3>
                                <div class="lead mb20">
                                    No hay resultados que mostrar con el correo electrónico que nos has proporcionado.
                                </div>
                                <a href="{{route('registrarse')}}" class="btn btn-primary">
                                    <i class="fa fa-print" aria-hidden="true"></i>
                                    REGISTRATE AQUÍ 
                                </a> 


                        @endif
                    </div>
                </div>
            </div>




<hr>












@stop