<?php

namespace App\Permissions\models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'nombre', 'slug', 'descripcion', 'full-acceso',
    ];

    public function users(){
        return $this ->belongsToMany('App\User')->withTimesTamps();
    }

    public function permisos(){
        return $this ->belongsToMany('App\Permissions\Models\Permiso')->withTimesTamps();
    }
}
