<?php

namespace App\Models\Scholarship;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarshipIntake extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scholarships()
    {
        return $this->hasMany(Scholarship::class);
    }
}
