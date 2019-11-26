@extends('layout.app')
@section('titulo','Busqueda')
@section('container')
<div class="container pt40 pb100">
    <div class="row text-center">
        <div class="col-md-10 mr-auto ml-auto">
            @if(count($usuario)>0)
            @foreach($usuario as $user)
            <h3 class="font300 mb20 h2">USUARIO <span class="text-primary">REGISTRADO</span></h3>
            <table data-toggle="bootstrap-table" data-search="true" data-show-columns="true"
                class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="" data-field="0" colspan="4">
                            <div class="th-inner ">
                                <center> INFORMACIÓN </center>
                            </div>
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
                            {{$user->nombre}}
                            {{$user->apellido_p}}
                            {{$user->apellido_m}}
                        </td>
                    </tr>
                    <tr id="tr-id-2" class="tr-class-2" data-index="1">
                        <td id="td-id-2" class="td-class-2" style="">DELEGACIÓN</td>
                        <td style="">{{$user->delegacion}} - {{$user->deleg->sede}} </td>
                    </tr>
                    <tr id="tr-id-3" class="tr-class-3" data-index="2">
                        <td id="td-id-3" class="td-class-3" style="">FECHA DE REGÍSTRO</td>
                        <td style="">{{$user->created_at}}</td>
                    </tr>
                    <tr id="tr-id-4" class="tr-class-4" data-index="3">
                        <td id="td-id-4" class="td-class-4" style="">FOLIO</td>
                        <td style="">{{$user->codigo_confirmacion}}</td>
                    </tr>
                    <tr id="tr-id-6" class="tr-class-5" data-index="5">
                        <td id="td-id-5" class="td-class-5" style="" colspan="2">
                            <form action="{{route('descargar.folio',[$user->codigo_confirmacion])}}" method="get">
                                <button type="submit" data-btntext-sending="Sending..." class="button btn btn-primary">
                                    <i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>
                                    DESCARGAR FOLIO</button></form>
                        </td>
                    </tr>
                </tbody>
                <tfoot style="display: none;">
                    <tr></tr>
                </tfoot>
            </table>






            @endforeach
            @else
            <h3 class="font300 mb20 h2">NO HAY <span class="text-primary">REGISTRO</span></h3>
            <div class="lead mb20">
                No hay resultados que mostrar con la información que nos has proporcionado.
            </div>
            <a href="/" class="btn btn-primary">
                <i class="fa fa-print" aria-hidden="true"></i>
                REGISTRATE AQUÍ
            </a>


            @endif
        </div>
    </div>
</div>




<hr>












@stop