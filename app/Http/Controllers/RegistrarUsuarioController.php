<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Region;
use App\Delegacion;
use App\Taller;
use PDF;

class RegistrarUsuarioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('congreso-preescolar.index');
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regiones = Region::all();
        $talleres = Taller::all();

        return view ('congreso-preescolar.registro')->with(compact('regiones','talleres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $talleres = Taller::all();

        if ($request->has('agremiado')) {
            
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

            // $usuario->delegacion = strtoupper($request->delegacion);
            $usuario->delegacion_id = $request->delegacion;
            $usuario->num_personal = $request->numero_personal;
            $usuario->zona_e = strtoupper($request->zona_escolar);
            $usuario->clave_ct = strtoupper($request->ct);

            $usuario->agremiado = $request->agremiado;

            $usuario->codigo_confirmacion = strtoupper(str_random(8));
            $usuario->slug = $usuario->codigo_confirmacion;


            
            $usuario->save();

            
        } elseif ($request->has('no_agremiado')) {
            
            $mensaje = [
                'nombre.required' => 'Es necesario ingresar un nombre para el registro',
                'apellido_paterno.required'=>'Es necesario ingresar al menos un apellido',
                'correo.required'=>'Hace falta tu correo electrónico ',
                'correo.unique'=>'El correo electrónico que proporciono ya ha sido registrado',
                'rfc.required'=>'Su RFC es necesario',
            ];
            $reglas = [
                'nombre' => 'required',
                'apellido_paterno' => 'required',
                'correo' => 'required|unique:usuarios,correo',            
                'rfc' => 'required',
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

            $usuario->agremiado = $request->no_agremiado;

            $usuario->codigo_confirmacion = strtoupper(str_random(8));
            $usuario->slug = $usuario->codigo_confirmacion;

           // return $usuario;
            $usuario->save();


        } 
        
        return view('congreso-preescolar.selecciona_taller')->with(compact('usuario','talleres'));
    }

    public function actualizar_usuario_taller(Request $request, $id)
    {
        
        $usuario = Usuario::findorfail($id);     

        $users = Usuario::where('taller_id',$request->seleccion_taller)->count();
        
        $taller = Taller::find($request->seleccion_taller);

        if ($users < $taller->limite) {
            $usuario->taller_id = $request->seleccion_taller;
            $usuario->save();                        
        } else {
            $usuario->taller_id = 12;
            $usuario->save();                          
        }
        
        return view('congreso-preescolar.confirmar_registro')->with(compact('usuario','users','taller'));

        // return $users;
        // return $taller->limite;
        

/*         $mensaje = [
            'seleccion_taller.required' => 'Debes seleccionar al menos un taller de la lista.',
        ];
        $reglas = [
            'seleccion_taller' => 'required',
        ];

        $this->validate($request, $reglas, $mensaje);


        $usuario = Usuario::find($slug); 
        $usuario->taller_id = $request->seleccion_taller;
        

        $usuario->save();

        
        
        return view('congreso-preescolar.confirmar_registro')->with(compact('usuario'));
 */


    }

    public function talleres()
    {
        $talleres = Taller::all();
        return view ('congreso-preescolar.talleres')->with(compact('talleres'));
    }

    public function verificacion()
    {
        return view ('congreso-preescolar.verificacion');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('confirmacion_registro');
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

    public function folio($codigo_confirmacion)
    {
        $usuario = Usuario::where('codigo_confirmacion', $codigo_confirmacion)->get();
        // $usuario = Usuario::find($codigo_confirmacion);
        // return view ('congreso-preescolar.pdf_export')->with(compact('usuario'));

    
        $pdf = PDF::loadView('congreso-preescolar.pdf_export',['usuario' => $usuario]); # Carga una vista 
    
    
        // return $pdf->stream(); # muestra el PDF en una ventana
        return $pdf->download(); # descarga el PDF


    }

    public function privacidad()
    {
        return view('privacidad');
    }

}
