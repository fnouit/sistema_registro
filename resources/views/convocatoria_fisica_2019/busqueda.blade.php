@extends('layout.app')
@section('titulo','Busqueda')
@section('container')            
            <div class="container pt40 pb100">
                <div class="row text-center">
                    <div class="col-md-10 mr-auto ml-auto">  


                        <div class="section">
                            <form action="#" method="post">
                                @csrf
                                <p class="lead">Ingresa tu número de folio </p>
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <center>
                                            <input id="nombre" type="text" name="nombre" class="form-control gui-input"
                                                style='text-transform:uppercase;' placeholder="*" value="{{ old('nombre')}}" required>
                                        </center>
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="col-xs-12 col-sm-12  form-group pt20">
                                        <center><button type="submit" data-btntext-sending="Sending..."
                                                class="button btn btn-primary">Regístrate</button></center>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <h3 class="font300 mb20 h2">NO HAY   <span class="text-primary">REGISTRO</span></h3>
                        <div class="lead mb20">
                            No hay resultados que mostrar con el correo electrónico que nos has proporcionado.
                        </div>
                        <a href="#" class="btn btn-primary">
                            <i class="fa fa-print" aria-hidden="true"></i>
                            REGISTRATE AQUÍ 
                        </a> 
                    </div>
                </div>
            </div>
@stop