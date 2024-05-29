<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'weight',
        'equipment',
    ];

    public function sets()
    {
        return $this->hasMany(Set::class);
    }
}
