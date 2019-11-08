@extends('layout.app')
@section('titulo','Captura')
@section('container')

    <h3 class="font300 mb20  h2" align="center">
        <b>Formulario de Registro</b><br>
        <span class="text-primary">Tercera Jornada Académica</span>
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
        <form action="{{ route('registrar.usuario') }}" method="post">
            @csrf 
            <input type="hidden" name="agremiado" value="SI">
            <p class="lead">Datos Personales </p>
            <div class="row">
                <div class="col-sm-6 form-group">      
                    <label for="nombre">INGRESA TÚ NOMBRE</label>          
                    <input id="nombre" type="text" name="nombre" class="form-control gui-input" style='text-transform:uppercase;' placeholder="*" value="{{ old('nombre')}}"  required>
                </div>
                <div class="col-sm-3 form-group">
                    <label for="apellido_paterno">PRIMER APELLIDO</label>          
                    <input id="apellido_paterno" type="text" name="apellido_paterno" class="form-control gui-input " style='text-transform:uppercase' placeholder="*" value="{{ old('apellido_paterno')}}"  required>
                </div>
                <div class="col-sm-3 form-group">
                    <label for="apellido_materno">SEGUNDO APELLIDO</label>          
                    <input id="apellido_materno" type="text" name="apellido_materno" class="form-control gui-input" style='text-transform:uppercase' value="{{ old('apellido_materno')}}" >
                </div>
            </div>                           

            <div class="row">
                <div class="col-sm-5  form-group">
                    <label for="apellido_materno">CORREO ELECTRÓNICO (VALIDO)</label>          
                    <input id="correo" type="email" name="correo" class="form-control" placeholder="*" value="{{old('correo')}}"  required >
                </div>
                <div class="col-sm-5  form-group">
                    <label for="rfc">INGRESA TÚ RFC</label>
                    <input id="rfc" type="text" name="rfc" class="form-control" style='text-transform:uppercase' placeholder="*" value="{{old('rfc')}}"  required >
                </div>
                <div class="col-sm-2  form-group">
                    <label for="genero">GENERO</label>          
                    <select id="genero" name="genero" class="form-control">                            
                        <option disabled selected>MOSTRAR</option>                    
                        <option value="SIN_ESPECIFICAR" >SIN ESPECIFICAR</option>                    
                        <option value="MUJER">MUJER</option>
                        <option value="HOMBRE" selected="selected">HOMBRE</option>
                        <option value="LGBT">LGBT</option>
                        
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4  form-group">
                    <label for="telefono">¿TÚ TELÉFONO ES?</label>
                    <input id="telefono" type="tel" name="telefono" class="form-control" telefono value="{{old('telefono')}}">
                </div>


                <div class="col-sm-4  form-group">
                    <label for="facebook">¿CUÁL ES TU FACEBOOK?</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">/</div>
                        </div>
                        <input type="text" class="form-control" id="facebook" name="facebook" value="{{old('facebook')}}" >
                    </div>
                </div>

                <div class="col-sm-4  form-group">
                    <label for="twitter">¿CUÁL ES TU TWITTER?</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                        </div>
                        <input type="text" id="twitter" name="twitter" class="form-control" value="{{old('twitter')}}">
                    </div>
                </div>                      
            </div> <hr>

            <!-- <div class="clearfix pt20" ></div> -->
            <p class="lead">Datos Laborales </p>  

            <div class="row">
                <div class="col-sm-6 form-group">
                    <label for="region">¿A QUE REGIÓN PERTENECES?</label>
                    <select class="custom-select form-control" name="region" id="region" >
                        <option disabled selected>SELECCIONA LA REGIÓN</option>
                        @foreach ($regiones as $key => $region)
                            <option value="{{$region->id}}">{{$key+1}} - {{$region->nombre}}&nbsp &nbsp{{$region->sede}}</option>
                        @endforeach
                    </select>                 
                </div>
                <div class="col-sm-6 form-group">
                    <label for="delegacion">¿CUÁL ES SU DELEGACIÓN?</label>
                    <select class="custom-select form-control" name="delegacion" id="delegacion" >
                    </select>                 
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4 form-group ">
                    <label for="numero_personal">¿TÚ NÚMERO DE PERSONAL ES?</label>
                    <input type="tel" placeholder="*" id="numero_personal" name="numero_personal" class="form-control" value="{{old('numero_personal')}}"  required>
                </div>
                <div class="col-sm-4 form-group">
                    <label for="zona_escolar">¿CÚAL ES TU ZONA ESCOLAR?</label>
                    <input type="text" style='text-transform:uppercase' id="zona_escolar" name="zona_escolar" class="form-control" value="{{old('zona_escolar')}}" required>     
                </div>
                <div class="col-sm-4 form-group">
                    <label for="ct">CLAVE DEL TÚ CENTRO DE TRABAJO</label>
                    <input type="text" style='text-transform:uppercase' id="ct" name="ct" class="form-control" value="{{old('ct')}}" required>     
                </div>                               
            </div>

            <div class="row">
                <div class="col-sm-12 form-group">
                    <label for="delegacion2">(OPCIONAL)</label>
                    <input type="text" style='text-transform:uppercase' name="delegacion2" id="delegacion2" class="form-control" value="{{old('delegacion2')}}" >
                    <span>SI NO ENCUENTRAS TU DELEGACIÓN INGRESALA MANUALMENTE</span>
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

@section('script')

<script type="text/javascript">
    $('#region').on('change', onSelectRegion);

    function onSelectRegion(){
        var region_id = $(this).val();
        $.get('/regiones/'+region_id+'/delegaciones', function(data){
            
            $('#delegacion').empty();

            $('#delegacion').append('<option disabled selected>SELECCIONA DELEGACIÓN</option>');
            for (var i = 0; i < data.length; ++i)
                $('#delegacion').append('<option value="'+ data[i].id +'">' + data[i].delegacion + " - " +data[i].sede +'</option>');
        return;
        });
    }
</script>

@endsection