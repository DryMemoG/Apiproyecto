<?php

namespace App\Http\Controllers;

use App\TipoProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoProductoController extends Controller
{
    public function index(Request $request)
    {
        $info = TipoProducto::all();

        return response()->json([
            'success' => true,
            'message' =>'Listado de Tipos de Producto',
            'data'    => $info
        ], 200);
    }

    public function show($id)
    {
        try {
            $info = TipoProducto::where('idtipoproducto','=',$id)->firstOrFail();
            return response()->json([
                'success' => true,
                'message' =>'Tipo buscado',
                'data'    => $info
            ], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => "El Tipo de Producto numero {$id} no existe"], 404);
        }                
    } //fin de show

    public function store(Request $request)
    {
         $this->Validate($request, [
            'nombretipo' => 'required',
            'pasillo' => 'required',
            'impuesto' => 'required'

         ]);

         $info = TipoProducto::wherenombretipo($request->get('nombretipo'))
         ->first();

         if($info) {
            return response()->json(['message' => "El Tipo {$request->get('nombretipo')} ya existe"], 404);
         }

         $input = $request->all();
         TipoProducto::create($input);
         return response()->json([
            'success' => true,
            'message' =>'Registro insertado correctamente'
        ], 200);

    }//fin funcion store

    public function update($id, Request $request)
    {
        try{
            $info = TipoProducto::where('idtipoproducto','=',$id)->firstOrFail();
            TipoProducto::where('idtipoproducto', $id)
            ->update(['nombretipo'=>$request->get('nombretipo'), 
            'pasillo'=>$request->get('pasillo'),
            'impuesto'=>$request->get('impuesto'),]);
            
            return response()->json([
                'success' => true,
                'message' =>'Registro actualizado correctamente'
            ], 200);
        }
        catch(\Throwable $th){
            return response()->json(['message' => "El Tipo de Producto numero {$id} no existe"], 404);
        }

    }

}
