<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Region;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regiones = Region::all();
        return view ('admin.regiones.index', compact('regiones'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        $mensaje = [
            'nombre.required' => 'El campo nombre es requerido',
            'sede.required'=>'Es necesario ingresar al menos una sede',
            'coordinador.required'=>'Este campo no puede estar vacio',
        ];
        $reglas = [
            'nombre' => 'required',
            'sede' => 'required',
            'coordinador' => 'required',
        ];

        $this->validate($request, $reglas, $mensaje);


        $region = Region::where('slug', $slug)->first();
        $region->nombre = strtoupper($request->nombre);
        $region->sede = strtoupper($request->sede);        
        $region->coordinador = strtoupper($request->coordinador);        

        $region->save();
        
        // return redirect()->route('confirmacion.registro', ['code' => $usuario->codigo_confirmacion]);
        
        session()->flash('message', $region->nombre);
        return redirect()->route('mostrar.regiones');

        // return view('admin.region.edit')->withRegion($region); 
        //return Redirect::to('user/login')->with('message', 'Login Failed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
