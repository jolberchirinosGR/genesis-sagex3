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
            $table->string('empresa', 50)->nullable()->default(null);
            $table->integer('mid')->nullable()->default(null);
            $table->string('rowid', 50)->nullable()->default(null);
            $table->string('razonsocial', 75)->nullable()->default(null);
            $table->binary('foto')->nullable()->default(null);
            $table->string('cif', 10)->nullable()->default(null);
            $table->string('direccion', 30)->nullable()->default(null);
            $table->string('poblacion', 30)->nullable()->default(null);
            $table->string('codpostal', 5)->nullable()->default(null);
            $table->string('provincia', 30)->nullable()->default(null);
            $table->integer('idempresa')->nullable()->default(null);

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
