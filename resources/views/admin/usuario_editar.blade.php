@extends('./layout.app')
@section('titulo','Editar')
@section('container')

            @if ($errors->any())
                <div class="alert alert-danger row div-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row align-items-center">
                <div class="col-md-5 mb30">
                    <img src="{{asset('images/login.png')}}"  alt="" class="img-fluid">
                </div>

                <div class="col-md-6 offset-md-1 mb30">
                    <h3 class="font300 mb20 h3 text-center">Información de <span class="text-primary">{{ __('contacto') }}</span></h3>
                    <form action="{{ route('actualizar',$usuario->id) }}" method="post">
                    {{ csrf_field() }} 
                    {{ method_field('PUT') }}
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="2">
                                        <div class="float-left">Usuario ID: {{ $usuario->id}}</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td  width="38%"  align="right">Nombre:</td>
                                        <td> <input id="nombre" type="text" name="nombre" class="form-control gui-input" required value="{{ old('nombre', $usuario->nombre) }}"></td></tr>
                                    <tr>
                                        <td  width="38%"  align="right">Apellido Paterno:</td>
                                        <td> <input id="apellido_paterno" type="text" name="apellido_paterno" class="form-control gui-input " required="required" value="{{ old('apellido_paterno',$usuario->apellido_p) }}"></td></tr>
                                    <tr>
                                        <td  width="38%"  align="right">Apellido Materno:</td>
                                        <td> <input id="apellido_materno" type="text" name="apellido_materno" class="form-control gui-input" value="{{ old('apellido_materno',$usuario->apellido_m)}}" > </td></tr>
                                    <tr>
                                        <td  width="38%"  align="right">Genero:</td>
                                        <td> 
                                        <select name="genero" class="form-control" id="genero">
                                            <option value="{{$usuario->genero}}">{{$usuario->genero}}</option>
                                            <option value="OTRO"    @if (old('genero') == "OTRO")   {{ 'selected' }} @endif>SIN ESPECIFICAR </option>
                                            <option value="HOMBRE"  @if (old('genero') == "HOMBRE") {{ 'selected' }} @endif>HOMBRE          </option>
                                            <option value="MUJER"   @if (old('genero') == "MUJER")  {{ 'selected' }} @endif>MUJER           </option>
                                        </select>
                                        </td></tr>
                                    <tr>
                                        <td  width="38%"  align="right">Correo electrónico:</td>
                                        <td> <input id="correo" type="email" name="correo" class="form-control" required="required" value="{{ old('correo',$usuario->correo) }}"> </td></tr>
                                    <tr>
                                        <td  width="38%"  align="right">RFC:</td>
                                        <td> <input id="rfc" type="text" name="rfc" class="form-control" required="required" value="{{ old('rfc',$usuario->rfc) }}"></td></tr>
                                    <tr>
                                        <td  width="38%"  align="right">Teléfono:</td>
                                        <td> <input id="telefono" type="tel" name="telefono" class="form-control" telefono value="{{ old('telefono',$usuario->telefono) }}"></td></tr>
                                    <tr>
                                        <td  width="38%"  align="right">Facebook:</td>
                                        <td> <input type="text" id="facebook" name="facebook" class="form-control" value="{{ old('facebook',$usuario->facebook) }}"> </td></tr>
                                    <tr>
                                        <td  width="38%"  align="right">Twitter:</td>
                                        <td> <input type="text" id="twitter" name="twitter" class="form-control" value="{{ old('twitter',$usuario->twitter) }}"> </td></tr>
                                    <tr>
                                        <td  width="38%"  align="right">Número de personal:</td>
                                        <td> <input type="tel" id="numero_personal" name="numero_personal" class="form-control" equired="required" value="{{ old('numero_personal',$usuario->num_personal) }}"> </td></tr>
                                    <tr>
                                        <td  width="38%"  align="right">Delegación:</td>
                                        <td> <input type="text" id="delegacion" name="delegacion"  class="form-control" required="required" value="{{ old('delegacion',$usuario->delegacion) }}"> </td></tr>
                                    <tr>
                                        <td  width="38%"  align="right">Zona Escolar:</td>
                                        <td> <input type="text" id="zona_escolar" name="zona_escolar" class="form-control" value="{{ old('zona_escolar',$usuario->zona_e) }}"> </td></tr>
                                    <tr>
                                        <td  width="38%"  align="right">Centro de Trabajo:</td>
                                        <td> <input type="text" id="ct" name="ct" class="form-control" value="{{ old('ct',$usuario->clave_ct) }}"> </td></tr>
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
                                            <div class="float-left">
                                                <a href="{{ URL::previous() }}" rel="tooltip" class="btn btn-default btn-sm">
                                                    <i class="fa fa-home fa-3x"></i>
                                                    REGRESAR  
                                                </a>
                                            </div>  
                                            <div class="float-right">
                                                <center><button type="submit" data-btntext-sending="Sending..." class="button btn btn-primary">Actualizar</button></center>                                        
                                            </div>
                                        </td>
                                    </tr>


                            </tbody>
                        </table>



                    </form>
                </div><!--/div-->  
            </div>            
@stop