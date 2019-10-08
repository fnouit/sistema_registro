<?php

namespace App\Http\Controllers;

use App\Taller;
use Illuminate\Http\Request;

class TallerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $talleres = Taller::all();
        return view ('admin.talleres.index')->with(compact('talleres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.talleres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $taller = new Taller();
        $taller->titulo = $request->titulo;
        $taller->ponente = strtoupper($request->ponente);
        $taller->descripcion = $request->descripcion;
        $taller->limite = $request->limite;

        if ($request->hasFile('imagen_taller'))
        {
            $file = $request->file('imagen_taller');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/talleres/',$name);
        }
        
        $taller->imagen_taller = $name;
        $taller->save();

        $talleres = Taller::all();
        return view ('admin.talleres.index')->with(compact('talleres'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Taller  $taller
     * @return \Illuminate\Http\Response
     */
    public function show(Taller $taller)
    {

    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Taller  $taller
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taller = Taller::find($id);
        return view ('admin.talleres.edit')->with(compact('taller')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Taller  $taller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $taller = Taller::find($id);
        $taller->titulo = $request->titulo;
        $taller->ponente = strtoupper($request->ponente);
        $taller->descripcion = $request->descripcion;
        $taller->limite = $request->limite;

        
        if ($request->hasFile('imagen_taller'))
        {
            $file = $request->file('imagen_taller');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/talleres/',$name);
        }
        
        // $taller->imagen_taller = $name;
                
        $mensaje = [
            'titulo.required' => 'Es necesario ingresar un nombre para el taller',
            'ponente.required'=>'Ingresa el nombre del ponente',
            'descripcion.required'=>'Hace falta una descripcion del taller ',
        ];
        
        $reglas = [
            'titulo' => 'required',
            'ponente' => 'required',
            'descripcion' => 'required',                        
        ];
        
        $this->validate( $request, $reglas, $mensaje );


        $taller->save();

        return redirect('/congreso-preescolar-2019/talleres');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Taller  $taller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taller $taller)
    {
        //
    }
}
