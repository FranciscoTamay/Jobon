<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;
    protected $table='ventas';

    protected $primaryKey='folio';

    protected $with=['detalles'];

    public $incrementing=false;

    public $timestamps=false;

    protected $fillable=[
        'folio',
        'fecha_venta',
        'num_articulos',
        'total'
    ];

    public function detalles(){
        return $this->hasMany(DetalleVenta::class, 'folio','folio');
    }

}
