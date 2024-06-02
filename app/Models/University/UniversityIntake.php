<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityIntake extends Model
{
    use HasFactory;

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
