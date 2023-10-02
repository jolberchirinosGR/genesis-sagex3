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
            $table->bigIncrements('id');
            $table->integer('codproveedor')->nullable();
            $table->string('nif', 10)->nullable();
            $table->string('nombre', 100)->nullable();
            $table->string('domicilio', 100)->nullable();
            $table->string('localidad', 100)->nullable();
            $table->string('codpostal', 5)->nullable();
            $table->string('provincia', 100)->nullable();
            $table->string('telefono1', 20)->nullable();
            $table->string('telefono2', 20)->nullable();
            $table->string('fax', 20)->nullable();
            $table->string('nrocuenta', 20)->nullable();
            $table->string('web', 50)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('observaciones', 50)->nullable();
            $table->string('rowid', 50)->nullable();
            $table->string('contacto', 50)->nullable();
            $table->string('personacontacto', 50)->nullable();
            $table->string('cuentacont', 20)->nullable();
            $table->integer('idempresa')->default(0);

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
