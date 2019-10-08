@extends('layout.app')
@section('titulo','Busqueda')
@section('container')            
            <div class="container pt40 pb100 text-uppercase">
                <div class="row text-center">
                    <div class="col-md-6 mr-auto ml-auto">    
                        @if(count($usuario)>0)
                            @foreach($usuario as $user)                                   
                                <h3 class="font300 mb20 h2">{{$user->nombre}}  <span class="text-primary">{{$user->apellido_p}}</span></h3>
                                <p>Usuario registrado</p>
                            @endforeach 
                        @else
                            <h3 class="font300 mb20 h2">SIN  <span class="text-primary">REGISTRO</span></h3>
                            <p>No contamos con ningún registro solicitado con el Número de Personal que nos proporcionaste.</p>
                        @endif
                    </div>
                </div>
            </div>
@stop