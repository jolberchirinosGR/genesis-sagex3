<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';
    public $timestamps = false;

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'empresa',
        'mid',
        'rowid',
        'idempresa',
        'foto',
        'razonsocial',
        'cif',
        'direccion',
        'poblacion',
        'codpostal',
        'provincia',
    ];

}
