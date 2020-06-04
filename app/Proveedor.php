<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'proveedor';

    protected $fillable = [
        'nombreproveedor',
        'direccion',
        'NIT',
        'fechacontrato'
    ];
    protected $hidden = ['created_at','updated_at'];

}
