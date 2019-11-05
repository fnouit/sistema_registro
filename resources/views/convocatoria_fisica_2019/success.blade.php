@extends('layout.app')
@section('titulo','Confirmación')
@section('container')

<h3 class="font300 mb20  h2" align="center">
    <p>
    <i class="fa fa-check-circle-o fa-3x" aria-hidden="true"></i></p>
    <b>Registro Exitoso!</b><br><br>
    <span class="text-primary">
        Usted se a registrado correctamente!
    </span>
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

    <table data-toggle="bootstrap-table" data-search="true" data-show-columns="true"
        class="table table-bordered table-hover">
        <thead>
            <tr>
                <th style="" data-field="0" colspan="4">
                    <div class="th-inner "> <center> INFORMACIÓN </center> </div>
                    <div class="fht-cell"></div>
                </th>
            </tr>
            <tr>
                <th style="" data-field="0">
                    <div class="th-inner ">DATOS</div>
                    <div class="fht-cell"></div>
                </th>
                <th style="" data-field="1">
                    <div class="th-inner ">DESCRIPCIÓN</div>
                    <div class="fht-cell"></div>
                </th>

            </tr>
        </thead>
        <tbody>
            <tr id="tr-id-1" class="tr-class-1" data-index="0" data-object="{&quot;key&quot;:&quot;value&quot;}"
                data-title="bootstrap table">
                <td id="td-id-1" class="td-class-1" style="" data-title="bootstrap table">NOMBRE</td>
                <td style="" data-i18n="Description">
                    {{$usuario->nombre}}
                    {{$usuario->apellido_p}}
                    {{$usuario->apellido_m}}                
                </td>
            </tr>
            <tr id="tr-id-2" class="tr-class-2" data-index="1">
                <td id="td-id-2" class="td-class-2" style="">DELEGACIÓN</td>
                <td style="">{{$usuario->delegacion}}</td>
            </tr>
            <tr id="tr-id-3" class="tr-class-3" data-index="2">
                <td id="td-id-3" class="td-class-3" style="">FECHA DE REGÍSTRO</td>
                <td style="">{{$usuario->created_at}}</td>
            </tr>
            <tr id="tr-id-4" class="tr-class-4" data-index="3">
                <td id="td-id-4" class="td-class-4" style="">FOLIO</td>
                <td style="">{{$usuario->codigo_confirmacion}}</td>
            </tr>
            <tr id="tr-id-5" class="tr-class-5" data-index="4">
                <td id="td-id-5" class="td-class-5" style="" colspan="2">
                    <div class="th-inner "> <center> Se le enviara un email al correo electrónico que nos proporcionaste para confirmar su registro al evento.</center> </div>
                    <div class="fht-cell"></div>
                </td>
            </tr>
            <tr id="tr-id-6" class="tr-class-5" data-index="5">
                <td id="td-id-5" class="td-class-5" style="" colspan="2">
                    <button type="submit" data-btntext-sending="Sending..." class="button btn btn-primary">
                    <i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>
                    DESCARGAR FOLIO</button>
                </td>
            </tr>
        </tbody>
        <tfoot style="display: none;">
            <tr></tr>
        </tfoot>
    </table>
    
        <center>
    <p style="margin-top: 5em;">
            <a href="{{url('/')}}" class="btn btn-outline-dark">TERMINAR REGISTRO</a>
    </p>
        </center>








</div>

@stop