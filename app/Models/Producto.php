<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table='producto';

    protected $primaryKey='sku';

    public $incrementing=false;

    public $timestamps=false;

    protected $fillable=[
        'sku',
        'nombre',
        'precio_publico',
        'precio_mayoreo',
        'cantidad'
    ];

   

}
