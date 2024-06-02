<?php

namespace App\Models\Student\Document;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequstedDocument extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getRequestedDocByStudentId($id)
    {
        return RequstedDocument::where('student_id', $id)->get();
    }
}
