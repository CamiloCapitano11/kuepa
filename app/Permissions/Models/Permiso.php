<?php

namespace App\Permissions\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $fillable = [
        'nombre', 'slug', 'descripcion',
    ];

    public function roles(){
        return $this->belongsToMany('App\Permissions\Models\Role')->withTimesTamps();
    }
}
