@extends('layout.app')
@section('titulo','Registro')
@section('container')
        
    <div class="container pt90 pb60">
        <div id="buscar" class="row align-items-center">
            <div class="col-md-5 mb30">
                <img src="{{asset('images/about.png')}}" alt="" class="img-fluid">
            </div>
            <div class="col-md-6 offset-md-1 mb30">
                <h3 class="font300 mb20 h2">Verifica tu  <span class="text-primary">Información</span></h3>
                <div class="lead">
                    Por favor ingresa el corre electrónico con el que te registraste
                </div>
<br>
                <form action="{{route('buscar')}}" method="get">
                
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="email" name="correo" class="form-control form-control-lg mb20" placeholder="Ingresa tu correo electrónico">
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