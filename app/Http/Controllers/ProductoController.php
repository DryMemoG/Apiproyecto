<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $info = Producto::all();

        return response()->json([
            'success' => true,
            'message' =>'Listado de productos',
            'data'    => $info
        ], 200);
    }

    public function show($id)
    {
        try {
            $info = Producto::where('idproducto','=',$id)->firstOrFail();
            return response()->json([
                'success' => true,
                'message' =>'Producto buscado',
                'data'    => $info
            ], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => "El producto numero {$id} no existe"], 404);
        }                
    } //fin de show

    public function store(Request $request)
    {
         $this->Validate($request, [
            'nombreproducto' => 'required',
            'idtipoproducto' => 'required',
            'precio' => 'required',
            'cantidad' =>'required',
            'idproveedor'=>'required'

         ]);

         $info = Producto::wherenombreproducto($request->get('nombreproducto'))
         ->first();

         if($info) {
            return response()->json(['message' => "El Producto{$request->get('nombreproducto')} ya existe"], 404);
         }

         $input = $request->all();
         Producto::create($input);
         return response()->json([
            'success' => true,
            'message' =>'Registro insertado correctamente'
        ], 200);

    }//fin funcion store

    public function update($id, Request $request)
    {
        try{
            $info = Producto::where('idproducto','=',$id)->firstOrFail();
            Producto::where('idproducto', $id)
            ->update(['nombreproducto'=>$request->get('nombreproducto'), 
            'idtipoproducto'=>$request->get('idtipoproducto'),
            'precio'=>$request->get('precio'),
            'cantidad'=>$request->get('cantidad'),
            'idproveedor'=>$request->get('idproveedor'),]);
            
            return response()->json([
                'success' => true,
                'message' =>'Registro actualizado correctamente'
            ], 200);
        }
        catch(\Throwable $th){
            return response()->json(['message' => "El Producto numero {$id} no existe"], 404);
        }

    }
}
