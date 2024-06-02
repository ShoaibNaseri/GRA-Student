<?php

namespace App\Services\Document;

use App\Models\Document;

class DocumentService
{

    public static function generateDocumentName($studentName, $documentName, $extention)
    {
        $docName = $studentName . '_' . $documentName . '.' . $extention;
        return $docName;
    }
    public static function checkDocId($id)
    {
        $getDoc = Document::where('doc_id', $id)->get();
        if ($getDoc == null) {
            return true;
        } else {
            return false;
        }
    }
}
