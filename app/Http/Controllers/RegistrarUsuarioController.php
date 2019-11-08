<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ConfirmacionRegistro;
use Illuminate\Support\Facades\Mail;

use App\Usuario;
use App\Region;
use App\Delegacion;
use PDF;

class RegistrarUsuarioController extends Controller
{

    public function index()
    {
        #Obteniendo todas las regiónes
        $regiones = Region::all();

        return view('convocatoria_fisica_2019.index', compact('regiones'));
    }    

    public function create()
    {
/*         $regiones = Region::all();
        $talleres = Taller::all();

        return view ('congreso-preescolar.registro')->with(compact('regiones','talleres')); */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mensaje = [
            'nombre.required' => 'Es necesario ingresar un nombre para el registro',
            'apellido_paterno.required'=>'Es necesario ingresar al menos un apellido',
            'correo.required'=>'Hace falta tu correo electrónico ',
            'correo.unique'=>'El correo electrónico que proporciono ya ha sido registrado',
            'rfc.required'=>'Su RFC es necesario',
            'numero_personal.required'=>'Su número personal es necesario para el registro',
            'delegacion.required'=>'Es necesario saber a qué delegación perteneces ',
            'numero_personal.unique'=>'El numero personal ya ha sido registrado',
            'numero_personal.numeric' => 'Su número personal no debe contener ninguna letra',
            'seleccion_taller.required' => 'Es necesario que selecciones un taller',
            'zona_e.required' => 'Es necesario que ingreses la Zona Escolar a la que perteneces',
            'clave_ct.required' => '¿Cúal es tu clave de centro de trabajo?'
        ];
        $reglas = [
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'correo' => 'required|unique:usuarios,correo',            
            'rfc' => 'required',
            'delegacion' => 'required',             
            'numero_personal'  => 'required|numeric|unique:usuarios,num_personal',
            'zona_escolar' => 'required',
            'ct' => 'required',
        ];

        $this->validate($request, $reglas, $mensaje);


        $usuario = new Usuario();
        $usuario->nombre = strtoupper($request->nombre);
        $usuario->apellido_p = strtoupper($request->apellido_paterno);
        $usuario->apellido_m = strtoupper($request->apellido_materno);
        $usuario->correo = $request->correo;
        $usuario->rfc = strtoupper($request->rfc);
        $usuario->genero = strtoupper($request->genero);
        $usuario->telefono = $request->telefono;
        $usuario->facebook = "/".$request->facebook;
        $usuario->twitter = "@".$request->twitter;

        $usuario->delegacion_id = $request->delegacion;
        $numero_delegacion = Delegacion::find($request->delegacion);
        $usuario->delegacion = $numero_delegacion->delegacion;
        
        $usuario->delegacion_opc = $request->delegacion2;

        $usuario->num_personal = $request->numero_personal;
        $usuario->zona_e = strtoupper($request->zona_escolar);
        $usuario->clave_ct = strtoupper($request->ct);

        $usuario->codigo_confirmacion = strtoupper(str_random(8));
        $usuario->slug = $usuario->codigo_confirmacion;

        $usuario->save();
        
        
        // ENVIAR CORREO ELCTRÓNICO        
        $mensajeEmail = [
            'nombre' => $usuario->nombre,
            'ap' => $usuario->apellido_p,
            'am' => $usuario->apellido_m,
            'rfc' => $usuario->rfc,
            'correo' => $usuario->correo,
            'folio' => $usuario->codigo_confirmacion,
        ];

        #Utilizar QUEUE en vez de SEND
        // Mail::to($usuario->correo)->send(new ConfirmacionRegistro($mensajeEmail)); 
        Mail::to($usuario->correo)->queue(new ConfirmacionRegistro($mensajeEmail)); 
        // return new ConfirmacionRegistro($mensajeEmail);

        return redirect()->route('success', ['code' => $usuario->slug]);
    }

    public function success($code)
    {
        $usuario = Usuario::where('codigo_confirmacion', '=', $code)->firstOrFail();
        return view('convocatoria_fisica_2019.success',compact('usuario'));
    }


    public function folio($folio)
    {
        $usuario = Usuario::where('codigo_confirmacion', $folio)->get();
        // $usuario = Usuario::find($codigo_confirmacion);

        foreach ($usuario as $key => $u) {
            $user = $u->nombre."_".$u->apellido_p."_".$u->apellido_m ;
        }
        
    
        $pdf = PDF::loadView('convocatoria_fisica_2019.pdf_export',['usuario' => $usuario]); # Carga una vista 
    
        // return $pdf->stream(); # muestra el PDF en una ventana
        return $pdf->download($user.'.pdf'); # descarga el PDF
    }


    public function buscar(Request $request)
    {
        // $num_personal = $request->get('np');      
        // $usuario = Usuario::busqueda($num_personal)->get();
        // return view ('busqueda')->with(compact('usuario'));

        $taller = Taller::all();
        $correo = $request->get('correo');      
        $usuario = Usuario::busqueda($correo)->get();
        return view ('congreso-preescolar.busqueda')->with(compact('usuario','taller'));        
        
        // return view('congreso-preescolar.confirmar_registro')->with(compact('usuario'));

    }


    public function privacidad()
    {
        return view('privacidad');
    }

}
