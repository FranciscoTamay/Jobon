<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\DetalleVenta;
use App\Models\Ventas;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Ventas::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $venta= new Ventas();
        $venta->folio=$request->get('folio');
        $venta->fecha_venta=$request->get('fecha_venta');
        $venta->num_articulos=$request->get('num_articulos');
        $venta->total=$request->get('total');

        $venta->save();

        //fin del manejo de una venta

        //se obtiene el json de los detalles
        $detalles=$request->get('detalles');
        //se insertan los detalles en la tabla de detalles
        DetalleVenta::insert($detalles);
        //se actualiza el estado del inventario
        for($i=0; $i<count($detalles); $i++){
            $cantidadVendida=$detalles[$i]['cantidad'];
            $productoVendido=$detalles[$i]['sku'];
            DB::update("UPDATE productos 
                        SET cantidad=cantidad-$cantidadVendida
                        WHERE sku=$productoVendido");
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return $venta = Ventas::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
