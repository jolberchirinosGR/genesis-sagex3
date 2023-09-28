<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProveedorRequest;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return response()->json([
            "code" => 200,
            "data" => $proveedores,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show($id)
    {
        $proveedor = Proveedor::find($id);

        if (!$proveedor) {
            return response()->json([
                "code" => 404,
                "message" => "Proveedor no encontrado",
            ], 404);
        }

        return response()->json([
            "code" => 200,
            "data" => $proveedor,
        ]);
    }

    /**
     * Store the specified resource from storage.
     */
    public function store(ProveedorRequest $request)
    {
        $data = $request->validated();

        $proveedor = new Proveedor($data);
        $proveedor->save();

        return response()->json([
            "code" => 200,
            "message" => "Proveedor creado exitosamente.",
        ]);
    }

    /**
     * Update the specified resource from storage.
     */
    public function update(ProveedorRequest $request, $id)
    {
        $data = $request->validated();

        $proveedor = Proveedor::find($id);

        if (!$proveedor) {
            return response()->json([
                "code" => 404,
                "message" => "Proveedor no encontrado",
            ], 404);
        }

        $proveedor->update($data);

        return response()->json([
            "code" => 200,
            "message" => "Proveedor actualizado exitosamente",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::find($id);

        if (!$proveedor) {
            return response()->json([
                "code" => 404,
                "message" => "Proveedor no encontrado",
            ], 404);
        }

        $proveedor->delete();

        return response()->json([
            "code" => 200,
            "message" => "Proveedor eliminado exitosamente",
        ]);
    }
}
