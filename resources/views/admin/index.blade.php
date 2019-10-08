@extends('layout.app')
@section('titulo','Inicio')
@section('container')

    <div class="text-center">
        <h2 class="font300 h2"><strong>BIENVENIDO</strong></h2>    
        <h3 class="font300 h2">Usuario <span class="text-primary">registrado</span></h3>
        <br>
    </div>

    @if (session('status'))
        <div class="alert alert-success font300 h2" role="alert">
            {{ session('status') }}
        </div>
    @endif


    @section('banner2')

        <form action="#" method="get">     
            <div class="form-group row col-sm-8">
                <h2 class="mb30 text-black"><i class="fa fa-file-excel-o fa-1x"></i> </h2>
                <div class="col-sm-4">
                    <select id="dynamic_select" class="form-control">
                        <option value="">Selecciona Formato</option>
                        <option value="{{ route('exportar_archivo',['type'=>'csv'])}}">CSV</option>
                        <option value="{{ route('exportar_archivo',['type'=>'xlsx'])}}">XLSX</option>
                        <option value="{{ route('exportar_archivo',['type'=>'xls'])}}">XLS</option>
                    </select>
                    
                </div>
            </div>
        </form>

        <div class="row align-items-center col-md-8">
            <div class="mb20">
                <strong>Total de Registros:</strong> 
                <span class="badge badge-primary badge-pill" style="font-size:1.2em;">
                    {!! $usuarios->total() !!}
                </span>
            </div>
            <table class="table table-striped">
                <thead style="text-transform: uppercase;">
                    <tr>
                        <th scope="col">NO.</th>
                        <th scope="col" colspan="3">NOMBRE</th>
                        <th scope="col">CORREO</th>
                        <th scope="col">NÚMERO PERSONAL</th>
                        <th scope="col">DELEGACIÓN</th>
                        <th scope="col">CÓDIGO</th>
                        <th scope="col">EDICIÓN</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($usuarios as $key => $usuario)     
                            <tr >
                                <td> {{ $key+1 }} </td>
                                <td colspan="3" style="text-transform: uppercase;"> {{ $usuario->nombre }} {{ $usuario->apellido_p }} {{ $usuario->apellido_m }}</td>
                                <td> {{ $usuario->correo}} </td>
                                <td style="text-transform: uppercase;"> {{ $usuario->num_personal }} </td>
                                <td style="text-transform: uppercase;"> {{ $usuario->delegacion }} </td>
                                <td style="text-transform: uppercase;"> {{ $usuario->codigo_confirmacion }} </td>
                                <td class="text-center"> <a href=" {{ url('/usuario/'.$usuario->id) }}"><i class="fa fa-cog fa-2x" aria-hidden="true"></i> </a></td>
                            </tr>
                        @endforeach
                        
                </tbody>
            </table>{{ $usuarios->links() }}
        </div>
    @endsection 

@stop

@section('script')
    <script>
        $(function(){
        // bind change event to select
        $('#dynamic_select').on('change', function () {
            var url = $(this).val(); // get selected value
            if (url) { // require a URL
                window.location = url; // redirect
            }
            return false;
        });
        });
    </script>
@stop