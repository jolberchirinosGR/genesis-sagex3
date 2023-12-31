<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as BaseController;
use App\Models\Empresa;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ProveedorController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return $this->sendResponse($proveedores, 'Proveedores encontrados exitosamente');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show($id)
    {
        $proveedor = Proveedor::find($id);

        if (!$proveedor) {
            return $this->sendError('Validation Error.', 'Proveedor no encontrado');
        }

        return $this->sendResponse($proveedor, 'Proveedor encontrado exitosamente');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idempresa' => 'nullable|integer',
            'codproveedor' => 'nullable|integer',
            'nif' => 'nullable|string|max:10',
            'nombre' => 'nullable|string|max:100',
            'domicilio' => 'nullable|string|max:100',
            'localidad' => 'nullable|string|max:100',
            'codpostal' => 'nullable|string|max:5',
            'provincia' => 'nullable|string|max:100',
            'telefono1' => 'nullable|string|max:20',
            'telefono2' => 'nullable|string|max:20',
            'fax' => 'nullable|string|max:20',
            'nrocuenta' => 'nullable|string|max:20',
            'web' => 'nullable|string|url|max:50',
            'email' => 'nullable|string|email|max:100',
            'observaciones' => 'nullable|string|max:50',
            'rowid' => 'nullable|string|max:50',
            'contacto' => 'nullable|string|max:50',
            'personacontacto' => 'nullable|string|max:50',
            'cuentacont' => 'nullable|string|max:50',
        ]);

        $empresa = Empresa::where('idempresa', $request->idempresa)->first();

        if (!$empresa) {
            $validator = Validator::make([], []);
            $validator->errors()->add('idempresa', 'Empresa no encontrada');

            return $this->sendError('Validation Error.', $validator->errors());
        }

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $proveedor = new Proveedor($request->all());
        $proveedor->save();

        return $this->sendResponse($proveedor, 'Proveedor creado exitosamente');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'idempresa' => 'nullable|integer',
            'codproveedor' => 'nullable|integer',
            'nif' => 'nullable|string|max:10',
            'nombre' => 'nullable|string|max:100',
            'domicilio' => 'nullable|string|max:100',
            'localidad' => 'nullable|string|max:100',
            'codpostal' => 'nullable|string|max:5',
            'provincia' => 'nullable|string|max:100',
            'telefono1' => 'nullable|string|max:20',
            'telefono2' => 'nullable|string|max:20',
            'fax' => 'nullable|string|max:20',
            'nrocuenta' => 'nullable|string|max:20',
            'web' => 'nullable|string|url|max:50',
            'email' => 'nullable|string|email|max:100',
            'observaciones' => 'nullable|string|max:50',
            'rowid' => 'nullable|string|max:50',
            'contacto' => 'nullable|string|max:50',
            'personacontacto' => 'nullable|string|max:50',
            'cuentacont' => 'nullable|string|max:50',
        ]);

        $empresa = Empresa::where('idempresa', $request->idempresa)->first();

        $proveedor = Proveedor::find($id);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if (!$empresa) {
            $validator = Validator::make([], []);
            $validator->errors()->add('idempresa', 'Empresa no encontrada');

            return $this->sendError('Validation Error.', $validator->errors());
        }

        if (!$proveedor) {
            return $this->sendError('Validation Error.', 'Proveedor no econtrado');
        }

        $proveedor->update($request->all());

        return $this->sendResponse($proveedor->refresh(), 'Proveedor actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::find($id);

        if (!$proveedor) {
            return $this->sendError('Validation Error.', 'Proveedor no econtrado');
        }

        $proveedor->delete();

        return $this->sendResponse($proveedor, 'Proveedor eliminado exitosamente');
    }
}
