<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'codproveedor' => 'required|integer',
            'NIF' => 'required|string|max:10',
            'Nombre' => 'required|string|max:100',
            'Domicilio' => 'nullable|string|max:100',
            'Localidad' => 'nullable|string|max:100',
            'Codpostal' => 'nullable|string|max:5',
            'Provincia' => 'nullable|string|max:100',
            'telefono1' => 'nullable|string|max:20',
            'telefono2' => 'nullable|string|max:20',
            'Fax' => 'nullable|string|max:20',
            'NroCuenta' => 'nullable|string|max:20',
            'web' => 'nullable|string|url|max:50',
            'email' => 'nullable|string|email|max:100',
            'Observaciones' => 'nullable|string|max:50',
            'idempresa' => 'nullable|integer',
            'rowid' => 'nullable|string|max:50',
            'contacto' => 'nullable|string|max:50',
            'personacontacto' => 'nullable|string|max:50',
            'cuentacont' => 'nullable|string|max:50',
        ];
    }
}
