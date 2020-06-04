<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    protected $table = 'tipoproducto';

    protected $fillable = [
        'nombretipo',
        'pasillo',
        'impuesto'
    ];
    protected $hidden = ['created_at','updated_at'];

}
