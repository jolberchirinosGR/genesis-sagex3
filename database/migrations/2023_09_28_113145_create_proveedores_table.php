<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();

            $table->integer('codproveedor')->nullable();
            $table->integer('idempresa')->nullable();

            $table->string('NIF',10)->nullable();
            $table->string('Nombre',100)->nullable();
            $table->string('Domicilio',100)->nullable();
            $table->string('Localidad',100)->nullable();
            $table->string('Codpostal',5)->nullable();
            $table->string('Provincia',100)->nullable();
            $table->string('telefono1',20)->nullable();
            $table->string('telefono2',20)->nullable();
            $table->string('Fax',20)->nullable();
            $table->string('NroCuenta',20)->nullable();
            $table->string('web',50)->nullable();
            $table->string('email',100)->nullable();
            $table->string('Observaciones',50)->nullable();
            $table->string('rowid',50)->nullable();
            $table->string('contacto',50)->nullable();
            $table->string('personacontacto',50)->nullable();
            $table->string('cuentacont',50)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
