@extends('./layout.app')
@section('titulo','Usuario')
@section('container')

            <div class="row align-items-center">
                <div class="col-md-5 mb30">
                    <img src="{{asset('images/login.png')}}"  alt="" class="img-fluid">
                </div>
                <div class="col-md-6 offset-md-1 mb30">
                    <h3 class="font300 mb20 h3 text-center">Información de <span class="text-primary">{{ __('contacto') }}</span></h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" colspan="2">
                                    
                                <div class="float-left">Usuario ID: {{ $usuario->id}} <br> Registro: {{$usuario->created_at}} <br>  </div>
                                <div class="float-right">
                                    <form action="{{ url('/usuario/'.$usuario->id) }}" method="POST">
                                        <a href="{{ url('/usuario/'.$usuario->id.'/editar/') }}" rel="tooltip" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit fa-2x"></i>
                                        </a>
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" rel="tooltip" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash fa-2x"></i>
                                        </button>
                                    </form>                                 
                                    
                                </div>
                                    
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td  width="38%"  align="right">Nombre:</td>
                                <td> {{ $usuario->nombre }} </td></tr>
                            <tr>
                                <td  width="38%"  align="right">Apellido Paterno:</td>
                                <td> {{ $usuario->apellido_p }} </td></tr>
                            <tr>
                                <td  width="38%"  align="right">Apellido Materno:</td>
                                <td> {{ $usuario->apellido_m }} </td></tr>
                            <tr>
                                <td  width="38%"  align="right">Genero:</td>
                                <td> {{ $usuario->genero }} </td></tr>
                            <tr>
                                <td  width="38%"  align="right">Correo electrónico:</td>
                                <td> {{ $usuario->correo}} </td></tr>
                            <tr>
                                <td  width="38%"  align="right">RFC:</td>
                                <td> {{ $usuario->rfc }} </td></tr>
                            <tr>
                                <td  width="38%"  align="right">Teléfono:</td>
                                <td> {{ $usuario->telefono }} </td></tr>
                            <tr>
                                <td  width="38%"  align="right">Facebook:</td>
                                <td> {{ $usuario->facebook }} </td></tr>
                            <tr>
                                <td  width="38%"  align="right">Twitter:</td>
                                <td> {{ $usuario->twitter }} </td></tr>
                            <tr>
                                <td  width="38%"  align="right">Número de personal:</td>
                                <td> {{ $usuario->num_personal }} </td></tr>
                            <tr>
                                <td  width="38%"  align="right">Delegación:</td>
                                <td> {{ $usuario->delegacion }} </td></tr>
                            <tr>
                                <td  width="38%"  align="right">Zona Escolar:</td>
                                <td> {{ $usuario->zona_e }} </td></tr>
                            <tr>
                                <td  width="38%"  align="right">Centro de Trabajo:</td>
                                <td> {{ $usuario->clave_ct }} </td></tr>
                            <tr>
                                <td  width="38%"  align="right">Codigo de Confirmación:</td>
                                <td> {{ $usuario->codigo_confirmacion }} </td>
                            </tr>
                            <tr>
                                <td  width="38%"  align="right">Confirmado:</td>
                                <td> {{ $usuario->confirmado }} </td>
                            </tr>
                            <tr>
                                <td  colspan="2" align="center"> 
                                        <a href="{{ url('/home') }}" rel="tooltip" class="btn btn-default btn-sm">
                                            <i class="fa fa-home fa-3x"></i>
                                            REGRESAR  
                                        </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div><!--/div-->            
            </div>
            
@stop