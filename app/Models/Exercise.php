<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
