<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejercicio_grupo_muscular extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'ejercicio_grupo_muscular';

    // Specify the fillable fields
    protected $fillable = [
        'exercise_id',
        'grupo_muscular',
    ];

    // Define the relationship with the Exercise model
    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}
