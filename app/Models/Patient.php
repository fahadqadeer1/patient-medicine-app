<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'gender', 'type'];
    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'intakes');
    }

}
