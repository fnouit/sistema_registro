<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usuario;
use App\Exports\UsuariosExport;
use Maatwebsite\Excel\Facades\Excel;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::paginate(15);
        return view ('admin.index')->with(compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $now = Carbon::now();
        // dd($now);
        $usuario = Usuario::find($id);
        return view('admin.usuario')->with(compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::find($id);
        return view('admin.usuario_editar')->with(compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $usuario = Usuario::find($id);
       $usuario->nombre = strtoupper($request->nombre);
       $usuario->apellido_p = strtoupper($request->apellido_paterno);
       $usuario->apellido_m = strtoupper($request->apellido_materno);
       $usuario->correo = $request->correo;
       $usuario->rfc = strtoupper($request->rfc);
       $usuario->genero = strtoupper($request->genero);
       $usuario->telefono = $request->telefono;
       $usuario->facebook = $request->facebook;
       $usuario->twitter = $request->twitter;
       $usuario->num_personal = $request->numero_personal;
       $usuario->delegacion = strtoupper($request->delegacion);
       $usuario->zona_e = strtoupper($request->zona_escolar);
       $usuario->clave_ct = strtoupper($request->ct);

       
       $mensaje = [
            'nombre.required' => 'Es necesario ingresar un nombre para el registro',
            'apellido_paterno.required'=>'Es necesario ingresar al menos un apellido',
            'correo.required'=>'Hace falta tu correo electrónico ',
            'correo.unique'=>'El correo electrónico que proporciono ya ha sido registrado',
            'rfc.required'=>'Su RFC es necesario',
            'numero_personal.required'=>'Su número personal es necesario para el registro',
            'delegacion.required'=>'Es necesario saber a qué delegación perteneces ',
            'numero_personal.unique'=>'El numero personal ya ha sido registrado'
        ];
        $reglas = [
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'correo' => 'required',            
            'rfc' => 'required',
            'numero_personal'  => 'required',
            'delegacion' => 'required'             
        ];
        
       $this->validate( $request, $reglas, $mensaje );

       $usuario->save();
       return redirect('usuario/'.$usuario->id)->with(compact('usuario'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //ProductImage::where('product_id', $id)->delete();
        $usuario = Usuario::find($id);
        //dd($usuario->id);
        $usuario->delete();
        return redirect('home');
    }


    /**
     * 
     * Exportar archivo en formato XLSX, CSV, XLS
     * 
     * @return void
     */

    public function exportar($type)
    {
        return Excel::download(new UsuariosExport, 'usuarios.'.$type);
    }

}
