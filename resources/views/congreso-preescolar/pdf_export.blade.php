<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>PDF Export</title>
</head>
<body>
    <div class="container pb30">
        <center>
            <h1 style="color:orange;">SEGUNDO CONGRESO DE PREESCOLAR 2019</h1>
            <h3 class="p-5" style="text-transform: uppercase;">“EDUCACIÓN SOCIOECONÓMICA EN PREESCOLAR. <br>PARADIGMA DEL SIGLO XXI”</h3>
            <hr>
            <div class="row">
                @foreach($usuario as $u)

                    
                    <table class="table table-bordered" style="border-collapse: separate;border-spacing:  5px 5px;">
                            <tbody>
                                <tr>
                                    <th scope="row">AGREMIADO A LA SECCIÓN 56 DEL SNTE </th>
                                    <td>{{$u->agremiado}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">NOMBRE COMPLETO: </th>
                                    <td>{{$u->apellido_p}} {{$u->apellido_m}} {{$u->nombre}} </td>
                                </tr>
                                <tr>
                                    <th scope="row">RFC: </th>
                                    <td>{{$u->rfc}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">FECHA DEL EVENTO: </th>
                                    <td>LUNES 10 DE JUNIO DE 2019, 09:00 hrs.</td>
                                </tr>
                            </tbody>
                        </table> <br>




                    <strong>TALLER AL QUE ASISTIRÁS</strong> <br>
                    <p style="text-transform: uppercase; font-size:200%;">TALLER <br> {{$u->taller->titulo}}</p> <br> <br>
                    <p class="lead">
                        Gracias por registrarte, por favor ten a la mano tu código de verificación y muestralo el día del evento. <br>
                    </p>


                    <strong>CÓDIGO DE CONFIRMACIÓN</strong>
                    <div class="alert alert-warning" role="alert">
                        <p style="font-size:500%; border-style: dashed; margin:15px; ">{{$u->codigo_confirmacion}}</p>
                    </div>                    

                    
                @endforeach                            
            </div>
        </center>
    </div>     
</body>
</html>