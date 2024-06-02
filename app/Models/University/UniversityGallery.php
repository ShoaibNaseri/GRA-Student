<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityGallery extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
