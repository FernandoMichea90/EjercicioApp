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
        Schema::create('ejercicio_grupo_muscular', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('exercise_id')->constrained('exercise')->onDelete('cascade');
            $table->enum('grupo_muscular', ['Pecho', 'Espalda','Trapecio', 'Hombros', 'Biceps','Triceps','Antebrazos', 'Muslos','Pantorrillas', 'Glúteos', 'Abdomen']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejercicio_grupo_muscular');
    }
};
