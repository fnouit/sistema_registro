@extends('layout.app')
@section('titulo','Busqueda')
@section('container')            
            <div class="container pt40 pb100">
                <div class="row text-center">
                    <div class="col-md-6 mr-auto ml-auto">  


                        <div class="section">
                            <form action="{{route('buscar')}}" method="post">
                                @csrf
                                <p class="lead">Ingresa tu número de personal</p>
                                <div class="row">
                                    <div class="col-md-6 mr-auto ml-auto form-group">
                                        <center>
                                            <input id="num_personal" type="text" name="num_personal" class="form-control gui-input"
                                                style='text-transform:uppercase;text-align: center;' placeholder="*" value="{{ old('num_personal')}}" required>
                                        </center>
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="col-xs-12 col-md-6 mr-auto ml-auto  form-group pt20">
                                        <center><button type="submit" data-btntext-sending="Sending..."
                                                class="button btn btn-primary">Buscar</button></center>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@stop