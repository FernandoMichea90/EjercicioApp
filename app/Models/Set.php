<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    use HasFactory;

    protected $fillable = [
        'routine_id',
        'exercise_id',
        'set_number',
        'reps',
        'equipment_id',
    ];

    public function routine()
    {
        return $this->belongsTo(Routine::class, 'routine_id', 'id_routine');
    }

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}
