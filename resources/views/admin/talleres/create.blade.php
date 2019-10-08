@extends('layout.app')
@section('titulo','Nuevo Taller')
@section('container')

    <h3 class="font300 mb20  h2" align="center">Registrar nuevo <span class="text-primary">Taller</span></h3>

    @if ($errors->any())
        <div class="alert alert-danger row div-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('enviar_taller') }}" method="post" enctype="multipart/form-data">
    
    @csrf 
        <p class="lead">Datos del taller </p>
        <div class="row">
            <div class="col-sm-6 form-group">      
                <label for="titulo">INGRESA TÍTULO DEL TALLER</label>          
                <input id="titulo" type="text" name="titulo" class="form-control gui-input" value="{{ old('titulo')}}" >
            </div>
        </div>                           

        <div class="row">
            <div class="col-sm-6 form-group">      
                <label for="ponente">PONENTE</label>          
                <input class="form-control" id="ponente" name="ponente" style="text-transform: uppercase;">
            </div>
        </div>                           

        <div class="row">
            <div class="col-sm-6 form-group">      
                <label for="descripcion">DESCRIPCION</label>          
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4"></textarea>
            </div>
        </div>                           

        <div class="row">
            <div class="col-sm-6 form-group custom-file ">
                <input type="file" class="custom-file-input" id="imagen_taller" name="imagen_taller">
                <label class="custom-file-label" for="imagen_taller">SELECCIONA UNA IMAGEN</label>
            </div>            
        </div>                           

        <div class="row ">
            <div class="col-xs-12 col-sm-12  form-group pt20">
                <button type="submit" data-btntext-sending="Sending..." class="button btn btn-primary">Enviar</button>
            </div>
        </div>
    </form>
@stop