<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

use App\Delegacion;
use App\Nivel;
use App\Nomenclatura;
use App\Region;

class DelegacionController extends Controller
{
    public function index() {
        $delegaciones = Delegacion::paginate(25);
        $nomenclaturas = Nomenclatura::all();
        $niveles = Nivel::all();
        $regiones = Region::all();
        // return $delegaciones;
        return view ('admin.delegaciones.index',compact('delegaciones','nomenclaturas','niveles','regiones'));
    }     

    public function create() {
        $niveles = Nivel::all();
        $nomenclaturas = Nomenclatura::all();
        $regiones = Region::all();
        return view ('admin.delegaciones.create', compact('niveles','nomenclaturas','regiones'));
    }

    public function store(Request $request)
    {
        $delegacion = new Delegacion();
        
        $delegacion->nomenclatura_id = $request->get('nomenclatura');
        $delegacion->numero = $request->get('numero');
        $delegacion->sede = strtoupper($request->get('sede'));
        $delegacion->nivel_id = $request->get('nivel');
        $delegacion->region_id = $request->get('region');        


        $valueNom = Nomenclatura::find($delegacion->nomenclatura_id);
        $delegacion->slug = $valueNom->nomenclatura.$delegacion->numero;
        $delegacion->delegacion = $valueNom->nomenclatura.$delegacion->numero;               

        $reglas = [
            'nomenclatura' => 'required',
            'numero' => 'required',
            'sede' => 'required',
            'nivel' => 'required',
            'region' => 'required',
        ];
        
        $mensaje =[
            'nomenclatura.required' => 'Es necesario seleccione una NOMENCLATURA',
            'numero.required' => 'Ingrese por favor un numero ',
            'sede.required' => 'Se requiere coloque nombre de sede ',
            'nivel.required' => 'A que nivel pertenece la delegación ',
            'region.required' => '¿Cúal es su región? ',
        ];

        $this->validate($request, $reglas, $mensaje);       

        $delegacion->save();
        
        session()->flash('message', $delegacion->delegacion);
        return redirect()->route('mostrar.delegaciones');



        // $delegacion->save();
        // return redirect('/delegacion')->with('success_create','La delegación '.$delegacion->nomenclatura->nomenclatura.$delegacion->numero.' se CREADO satisfactoriamente');
        
        


    }
    
    public function delegaciones(Request $request, $id) {
        if($request->ajax()){
            return DB::select('
                SELECT 
                    delegacions.id,
                    nomenclaturas.nomenclatura,
                    delegacions.numero,
                    delegacions.sede as delegacion,
                    delegacions.delegacion as deleg,
                    nivels.nivel_educativo,
                    regions.nombre as region,
                    regions.sede
                FROM
                    delegacions
                        INNER JOIN
                    nomenclaturas ON nomenclaturas.id = delegacions.nomenclatura_id
                        INNER JOIN
                    nivels ON nivels.id = delegacions.nivel_id
                        INNER JOIN
                    regions ON regions.id = delegacions.region_id
                WHERE
                    delegacions.region_id = '.$id.'          
            ');
        }
        return redirect('/');
    } 

    public function delegacionesAll() {
        return DB::select('
            SELECT 
                delegacions.id,
                nomenclaturas.nomenclatura,
                delegacions.numero,
                delegacions.sede as delegacion,
                nivels.nivel_educativo,
                regions.nombre as region,
                regions.sede
            FROM
                delegacions
                    INNER JOIN
                nomenclaturas ON nomenclaturas.id = delegacions.nomenclatura_id
                    INNER JOIN
                nivels ON nivels.id = delegacions.nivel_id
                    INNER JOIN
                regions ON regions.id = delegacions.region_id          
        ');
    }

    public function destroy($slug)
    {
        $delegacion = Delegacion::where('slug','=', $slug)->firstOrFail();
        return $delegacion;        
        // $delegacion->delete();
        // return redirect('/delegacions')->with('success','La información ha sido borrada');
    }   
}
