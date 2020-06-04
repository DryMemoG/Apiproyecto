<?php
//modelos
namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'producto';

    protected $fillable = [
        'nombreproducto',
        'idtipoproducto',
        'precio',
        'cantidad',
        'idproveedor'
    ];
    protected $hidden = ['created_at','updated_at'];

}
