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
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id'); // Definir 'id' como clave primaria con auto-incremento
            $table->string('empresa', 50);
            $table->integer('mid');
            $table->string('rowid', 50);
            $table->string('razonsocial', 75);
            $table->string('cif', 10);
            $table->string('direccion', 30);
            $table->string('poblacion', 30);
            $table->string('codpostal', 10);
            $table->string('provincia', 30);
            $table->integer('idempresa');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
