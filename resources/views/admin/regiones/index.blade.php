@extends('layout.app')
@section('titulo','Regiones')
@section('container')
<h3 class="font300 mb20  h2" align="center">
    <b>Mostrar</b>
    <span class="text-primary">Regiones</span>
</h3>


<div class="section">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">NO.</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">SEDE</th>
                <th scope="col">COORDINADOR</th>
                <th scope="col">EDICIÓN</th>
            </tr>
        </thead>
        <tbody>

            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Se ha actualizado la información correspondiente a la <strong>"{{ session('message') }}"</strong>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @foreach ($regiones as $key => $region)
                <tr>
                    <th>{{$key+1}}</th>
                    <td>{{$region->nombre}}</td>
                    <td>{{$region->sede}}</td>
                    <td>{{$region->coordinador}}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal_{{$key+1}}" data-whatever="@getbootstrap"><i
                                class="fa fa-edit fa-1x"></i></button>
                    </td>
                </tr>

                <div class="modal fade" id="exampleModal_{{$key+1}}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{route('region.edit',[$region->slug])}}" method="post">
                                @method('put')
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{$region->nombre}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nombre" class="col-form-label">NOMBRE:</label>
                                        <input id="nombre" type="text" name="nombre" class="form-control gui-input"
                                            style='text-transform:uppercase;' placeholder="{{$region->nombre}}"
                                            value="{{ old('nombre',$region->nombre)}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="sede" class="col-form-label">SEDE:</label>
                                        <input id="sede" type="text" name="sede" class="form-control gui-input"
                                            style='text-transform:uppercase;' placeholder="{{$region->sede}}"
                                            value="{{ old('sede',$region->sede)}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="coordinador" class="col-form-label">COORDINAD:</label>
                                        <input id="coordinador" type="text" name="coordinador"
                                            class="form-control gui-input" style='text-transform:uppercase;'
                                            placeholder="{{$region->coordinador}}"
                                            value="{{ old('coordinador',$region->coordinador)}}" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn " data-dismiss="modal">CANCELAR</button>
                                    <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>
@stop