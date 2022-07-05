<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $table='detalle_ventas';

    protected $primaryKey='id';

    protected $with=['producto'];

    public $incrementing=true;

    public $timestamps=false;

    protected $fillable=[
        'sku',
        'cantidad',
        'precio',
        'total',
        'folio',
    ];

    public function producto(){
        return $this->belongsTo(Producto::class,'sku','sku');
    }
}
