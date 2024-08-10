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
        Schema::create('ingresos', function (Blueprint $table) {
            $table->id('id_ingreso');
            $table->string('fecha_ingreso');
            $table->string('descripcion_ingreso')->nullable();
            $table->decimal('monto_ingreso', 10,2);
            $table->string('tipo_ingreso');
            $table->string('metodo_ingreso');
            $table->integer('estado_ingreso');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingresos');
    }
};
