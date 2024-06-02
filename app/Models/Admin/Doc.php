<?php

namespace App\Models\Admin;

use App\Models\Student\Document\Document;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Doc extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
    public static function findMissingDocs($studentId)
    {
        return
            DB::table('docs')
            ->leftJoin(DB::raw('(SELECT doc_id FROM documents WHERE student_id = :studentId) as subquery'), function ($join) {
                $join->on('docs.id', '=', 'subquery.doc_id');
            })
            ->whereNull('subquery.doc_id')
            ->setBindings(['studentId' => $studentId], 'where')
            ->select('docs.id as doc_id', 'docs.title', 'docs.type', 'docs.comment')
            ->get();
    }
    public static function getDocNameById($id)
    {
        $getName = Doc::where('id', $id)->value('title');
        return $getName;
    }
}
