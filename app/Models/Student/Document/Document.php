<?php

namespace App\Models\Student\Document;

use App\Enums\student\DocumentStatus;
use App\Models\Admin\Doc;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function doc()
    {
        return $this->belongsTo(Doc::class);
    }
    // public function markAsAccepted()
    // {
    //     $this->status = DocumentStatus::ACCEPTED;
    //     $this->save();
    // }
    // public function markAsRejected()
    // {
    //     $this->status = DocumentStatus::REJECTED;
    //     $this->save();
    // }
    public function getDocumentsByStudentId($id)
    {
        return Document::where('student_id', $id)->get();
    }
}
