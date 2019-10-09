<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nomenclatura extends Model
{
    protected $fillable = [
        'nomenclatura'
    ];

    protected $table = 'nomenclaturas';
    
    public function delegaciones()
    {
        return $this->hasMany(Delegacion::class);
    }
}
