<?php

namespace App\Http\Controllers;

use App\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProveedorController extends Controller
{
    public function index(Request $request)
    {
        $info = Proveedor::all();

        return response()->json([
            'success' => true,
            'message' =>'Listado de proveedores',
            'data'    => $info
        ], 200);
    }

    public function show($id)
    {
        try {
            $info = Proveedor::where('idproveedor','=',$id)->firstOrFail();
            return response()->json([
                'success' => true,
                'message' =>'Proveedor buscado',
                'data'    => $info
            ], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => "El proveedor numero {$id} no existe"], 404);
        }                
    } //fin de show

    public function store(Request $request)
    {
         $this->Validate($request, [
            'nombreproveedor' => 'required',
            'direccion' => 'required',
            'NIT' => 'required',
            'fechacontrato' =>'required'

         ]);

         $info = Proveedor::wherenombreproveedor($request->get('nombreproveedor'))
         ->first();

         if($info) {
            return response()->json(['message' => "El Proveedor{$request->get('nombreproveedor')} ya existe"], 404);
         }

         $input = $request->all();
         Proveedor::create($input);
         return response()->json([
            'success' => true,
            'message' =>'Registro insertado correctamente'
        ], 200);

    }//fin funcion store

    public function update($id, Request $request)
    {
        try{
            $info = TipoProducto::where('idproveedor','=',$id)->firstOrFail();
            TipoProducto::where('idproveedor', $id)
            ->update(['nombreproveedor'=>$request->get('nombreproveedor'), 
            'direccion'=>$request->get('direccion'),
            'impuesto'=>$request->get('impuesto'),
            'NIT'=>$request->get('NIT'),
            'fechachontrato'=>$request->get('fechacontrato'),]);
            
            return response()->json([
                'success' => true,
                'message' =>'Registro actualizado correctamente'
            ], 200);
        }
        catch(\Throwable $th){
            return response()->json(['message' => "El Proveedor numero {$id} no existe"], 404);
        }

    }
}
