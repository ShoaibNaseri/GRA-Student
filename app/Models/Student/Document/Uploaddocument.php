<?php

namespace App\Models\Student\Document;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uploaddocument extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function getUploadedDocsByStudentId($id)
    {
        return Uploaddocument::where('student_id', $id)->get();
    }
}
