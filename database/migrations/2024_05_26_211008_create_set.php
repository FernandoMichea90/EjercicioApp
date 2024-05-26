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
        Schema::create('set', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('routine_id'); // Usamos 'unsignedBigInteger' para 'routine_id'
            $table->foreign('routine_id')->references('id_routine')->on('routine')->onDelete('cascade'); // Referenciamos 'routine' y 'id_routine'
            $table->foreignId('exercise_id')->constrained('exercise')->onDelete('cascade');
            $table->integer('set_number');
            $table->integer('reps');
            $table->foreignId('equipment_id')->constrained('equipment')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('set');
    }
};
