<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Producto::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $producto=new Producto();
        $producto->sku=$request->get('sku');
        $producto->nombre=$request->get('nombre');
        $producto->precio_publico=$request->get('precio_publico');
        //$producto->precio_veterinaria=$request->get('precio_veterinaria');
        $producto->precio_mayoreo=$request->get('precio_mayoreo');
        $producto->cantidad=$request->get('cantidad');

        $producto->save();

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       return $producto=Producto::find($id);
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
        $producto=Producto::find($id);
        $producto->sku=$request->get('sku');
        $producto->nombre=$request->get('nombre');
        $producto->precio_publico=$request->get('precio_publico');
        //$producto->precio_veterinaria=$request->get('precio_veterinaria');
        $producto->precio_mayoreo=$request->get('precio_mayoreo');
        $producto->cantidad=$request->get('cantidad');

        $producto->update();
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
        $producto=Producto::find($id);
        $producto->delete();
    }
}
