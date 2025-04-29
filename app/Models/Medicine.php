<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'frequency',     // once, twice, thrice
        'time_of_intake', // 08:00:00 etc.
        'for_infants',   // boolean
    ];

    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'intakes');
    }
}
