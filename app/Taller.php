<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen_taller'
    ];  

    public function usuarios()
    {
        return $this->hasMany('App\Usuario');
    }
  
}
