<?php

namespace App\Models\Student\Application;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationDetail extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
