<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'codproveedor',
        'NIF',
        'Nombre',
        'Domicilio',
        'Localidad',
        'Codpostal',
        'Provincia',
        'telefono1',
        'telefono2',
        'Fax',
        'NroCuenta',
        'web',
        'email',
        'Observaciones',
        'idempresa',
        'rowid',
        'contacto',
        'personacontacto',
        'cuentacont',
    ];

}
