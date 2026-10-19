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
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', length:100);
            $table->string('apellidos', length:100);
            $table->date('fecha_nacimiento');
            $table->unsignedTinyInteger('ninos')->default(0);
            $table->string('madre_cabeza', length:2);
            $table->string('estudio', length:2);
            $table->string('generos', length:255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
