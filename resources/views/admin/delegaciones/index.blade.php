@extends('layout.app')
@section('titulo','Delegaciones')
@section('container')
<h3 class="font300 mb20  h2" align="center">
    <b>Mostrar</b>
    <span class="text-primary">Delegaciones</span>
</h3>

<div class="section">
    <div class="row">
        <div class="col-md-4">

            <div class=" form-group mr-auto">
                <select class="custom-select form-control" name="region" id="region" >
                    <option disabled selected="selected" >SELECCIONA LA REGIÓN</option>
                    <option value="todas" >MOSTRAR TODAS</option>
                    @foreach ($regiones as $key => $region)
                        <option value="{{$region->id}}">{{$region->nombre}}&nbsp &nbsp{{$region->sede}}</option>
                    @endforeach
                </select>   
            </div>

        </div>
        <div class="col-md-4 text-left">
            <a href="{{route('crear.delegacion')}}" class="btn btn-outline-primary "> Nueva</a>
        </div>
        <div class="col-md-4 text-left">

            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-search" aria-hidden="true"></i></div>
                </div>
                <input type="text" id="search" name="search" class="form-control" >
            </div>

        </div>
    </div>
</div>

<div class="section">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">NO.</th>
                <th scope="col">DELEGACIÓN</th>
                <th scope="col">SEDE</th>
                <th scope="col">NIVEL EDUCATIVO</th>
                <th scope="col">REGIÓN</th>
                <th scope="col">EDICIÓN</th>
            </tr>
        </thead>
        <tbody id="delegacion">

            @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                La delegación <strong>"{{ session('message') }}"</strong> se ha creado satisfactoriamente.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

        </tbody>
    </table>    
</div>
@stop