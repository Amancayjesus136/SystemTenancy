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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('nombres')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('fecha_nacimiento')->nullable();
            $table->string('direccion')->nullable();
            $table->string('pais')->nullable();
            $table->string('provincia')->nullable();
            $table->string('distrito')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('numero_telefonico')->nullable();
            $table->string('telefono_casa')->nullable();
            $table->string('telefono_secundario')->nullable();
            $table->string('designacion')->nullable();
            $table->string('empresa');
            $table->string('experiencia_inicio')->nullable();
            $table->string('experiencia_fin')->nullable();
            $table->string('web_personal')->nullable();
            $table->string('red_facebook')->nullable();
            $table->string('red_whatsapp')->nullable();
            $table->string('red_instagram')->nullable();
            $table->string('red_tiktok')->nullable();
            $table->string('puesto')->nullable();
            $table->string('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
