<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as BaseController;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class EmpresaController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = Empresa::all();
        return $this->sendResponse($empresas, 'Empresas encontrados exitosamente.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show($id)
    {
        $empresa = Empresa::find($id);

        if (!$empresa) {
            return $this->sendError('Validation Error.', 'Empresa no encontrado');
        }

        return $this->sendResponse($empresa, 'Empresa encontrado exitosamente.');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idempresa' => 'required|integer',
            'empresa' => 'nullable|string|max:50',
            'mid' => 'nullable|integer',
            'rowid' => 'nullable|string|max:50',
            'foto' => 'nullable|string|max:20',
            'razonsocial' => 'nullable|string|max:75',
            'cif' => 'nullable|string|max:10',
            'direccion' => 'nullable|string|max:30',
            'poblacion' => 'nullable|string|max:30',
            'codpostal' => 'nullable|string|max:10',
            'provincia' => 'nullable|string|max:30',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $empresa = new Empresa($request->all());
        $empresa->save();

        return $this->sendResponse($empresa, 'Empresa creado exitosamente.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'idempresa' => 'required|integer',
            'empresa' => 'nullable|string|max:50',
            'mid' => 'nullable|integer',
            'rowid' => 'nullable|string|max:50',
            'foto' => 'nullable|string|max:20',
            'razonsocial' => 'nullable|string|max:75',
            'cif' => 'nullable|string|max:10',
            'direccion' => 'nullable|string|max:30',
            'poblacion' => 'nullable|string|max:30',
            'codpostal' => 'nullable|string|max:10',
            'provincia' => 'nullable|string|max:30',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $empresa = Empresa::find($id);

        if (!$empresa) {
            return $this->sendError('Validation Error.', 'Empresa no econtrado');
        }

        $empresa->update($request->all());

        return $this->sendResponse($empresa, 'Empresa actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $empresa = Empresa::find($id);

        if (!$empresa) {
            return response()->json([
                "code" => 404,
                "message" => "Empresa no encontrado",
            ], 404);
        }

        $empresa->delete();

        return response()->json([
            "code" => 200,
            "message" => "Empresa eliminado exitosamente",
        ]);
    }
}
