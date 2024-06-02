<?php


namespace App\Repositories\University;

use App\Models\University\University;

class UniversityRepository
{


    protected $uniM;
    public function __construct(University $university)
    {
        $this->uniM = $university;
    }

    public function getAllUniversity()
    {
        return $this->uniM->with('country')->get();
    }

    public function getUniById($id)
    {
        return $this->uniM->where('id', $id)->with('country', 'universityDetails', 'universityGallery')->first();
    }
}
