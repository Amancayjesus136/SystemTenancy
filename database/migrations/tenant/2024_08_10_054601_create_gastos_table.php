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
        Schema::create('gastos', function (Blueprint $table) {
            $table->id('id_gasto');
            $table->string('fecha_gasto');
            $table->string('descripcion_gasto')->nullable();
            $table->decimal('monto_gasto', 10,2);
            $table->string('tipo_gasto');
            $table->string('metodo_gasto');
            $table->integer('estado_gasto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gastos');
    }
};
