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
            'codproveedor' => 'required|string|max:255',
            'NIF' => 'required|string|max:255',
            'Nombre' => 'required|string|max:255',
            'Domicilio' => 'nullable|string|max:255',
            'Localidad' => 'nullable|string|max:255',
            'Codpostal' => 'nullable|string|max:255',
            'Provincia' => 'nullable|string|max:255',
            'telefono1' => 'nullable|string|max:255',
            'telefono2' => 'nullable|string|max:255',
            'Fax' => 'nullable|string|max:255',
            'NroCuenta' => 'nullable|string|max:255',
            'web' => 'nullable|string|url|max:255',
            'email' => 'nullable|string|email|max:255',
            'Observaciones' => 'nullable|string',
            'idempresa' => 'nullable|integer',
            'rowid' => 'nullable|string|max:255',
            'contacto' => 'nullable|string|max:255',
            'personacontacto' => 'nullable|string|max:255',
            'cuentacont' => 'nullable|string|max:255',
        ];
    }
}
