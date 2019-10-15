@extends('layout.app')
@section('titulo','Nueva Delegación')
@section('container')

    <h3 class="font300 mb20  h2" align="center">
        <span class="text-primary">Nueva delegación</span>
    </h3>

    @if ($errors->any())
        <div class="alert alert-danger row div-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="section">
        <form action="{{ route('guardar.delegacion') }}" method="post">
            @csrf 
            <p class="lead">Datos Personales </p>
            <div class="row">
                <div class="col-sm-6 form-group">      
                    <label for="nomenclatura">¿CÚAL ES SU NOMENCLATURA?</label>
                    <select class="custom-select form-control" name="nomenclatura" id="nomenclatura" >
                        <option disabled selected>SELECCIONA</option>
                        @foreach ($nomenclaturas as $key => $n)
                            <option value="{{$n->id}}">{{$n->nomenclatura}}&nbsp</option>
                        @endforeach
                    </select>                 
                </div>
                <div class="col-sm-3 form-group">
                    <label for="numero">NÚMERO</label>          
                    <input id="numero" type="tel" name="numero" class="form-control gui-input " style='text-transform:uppercase' placeholder="*" value="{{ old('numero')}}"  required>
                </div>
                <div class="col-sm-3 form-group">
                    <label for="sede">SEDE</label>
                    <input id="sede" type="text" name="sede" class="form-control" style='text-transform:uppercase' value="{{old('sede')}}"  required >
                </div>
            </div>                           

            <div class="row">
                <div class="col-sm-6  form-group">
                    <label for="nivel">NIVEL EDUCATIVO</label>
                    <select class="custom-select form-control" name="nivel" id="nivel" >
                        <option disabled selected>¿CÚAL ES SU NIVEL?</option>
                        @foreach ($niveles as $key => $niv)
                            <option value="{{$niv->id}}">{{$niv->nivel_educativo}}&nbsp</option>
                        @endforeach
                    </select> 
                </div>
                <div class="col-sm-6  form-group">
                <label for="region">A QUE REGIÓN PERTENECE</label>
                    <select class="custom-select form-control" name="region" id="region" >
                        <option disabled selected>SELECCIONA REGIÓN</option>
                        @foreach ($regiones as $key => $r)
                            <option value="{{$r->id}}">{{$key+1}} - {{$r->nombre}}&nbsp&nbsp{{$r->sede}}</option>
                        @endforeach
                    </select> 
                </div>
            </div>


            <select name="gender" class="form-control" id="gender">
                <option value="">Select Gender</option>
                <option value="M" @if (old('gender') == "M") {{ 'selected' }} @endif>Male</option>
                <option value="F" @if (old('gender') == "F") {{ 'selected' }} @endif>Female</option>
            </select>


            <div class="row ">
                <div class="col-xs-12 col-sm-12  form-group pt20">
                    <center><button type="submit" data-btntext-sending="Sending..." class="button btn btn-primary">Regístrate</button></center>
                </div>
            </div>
        </form>    
    </div>

@stop