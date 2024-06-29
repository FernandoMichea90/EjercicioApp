<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ejercicio_grupo_muscular;

class Exercise extends Model
{
    use HasFactory;

    protected $table = 'exercise'; // Especifica el nombre de la tabla

    protected $fillable = [
        'name',
    ];

    public function sets()
    {
        return $this->hasMany(Set::class);
    }

     // Define the relationship with EjercicioGrupoMuscular
     public function gruposMusculares()
     {
        
         return $this->hasMany(Ejercicio_grupo_muscular::class, 'exercise_id');
     }

}
