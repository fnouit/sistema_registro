<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Usuario extends Model
{
    protected $fillable = [
        'id',
        'nombre',
        'apellido_p',
        'apellido_m',
        'genero',
        'correo',            
        'rfc',
        'telefono',
        'facebook',
        'twitter',
        'num_personal',
        'delegacion',
        'zona_e',
        'clave_ct',    
        'confirmado',
        'codigo_confirmacion',
        'agremiado',
        'slug',
        'delegacion_id',
        'taller_id',
    ];  

    protected $table = 'usuarios';

    public function taller()
    {
        return $this->belongsTo(Taller::class);
    }  

    public function deleg()
    {
        return $this->belongsTo('App\Delegacion','delegacion_id', 'id');
        // return $this->belongsTo(Delegacion::class);
    }








    // Query Scope

    public function scopeBusqueda($query,$correo='')
    {
/*         if($num_personal)
            return $query->where('num_personal', $num_personal);
        elseif ($num_personal) {
            return "SIN REGISTRO";
        }
 */            
        // return $query->where('num_personal', $num_personal);
        if (trim($correo) != "")
        {
            return $query->where('correo', $correo);
        }
    }
  
}
