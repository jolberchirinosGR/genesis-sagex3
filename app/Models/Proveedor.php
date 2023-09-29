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
        'nif',
        'nombre',
        'domicilio',
        'localidad',
        'codpostal',
        'provincia',
        'telefono1',
        'telefono2',
        'fax',
        'nrocuenta',
        'web',
        'email',
        'observaciones',
        'idempresa',
        'rowid',
        'contacto',
        'personacontacto',
        'cuentacont',
    ];

}
