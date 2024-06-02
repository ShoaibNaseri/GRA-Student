<?php


namespace App\Repositories\Program;

use App\Models\Scholarship\Scholarship;

class ProgramRepository
{


    protected $scholarM;
    public function __construct(Scholarship $scholarship)
    {
        $this->scholarM = $scholarship;
    }

    public function getAllPrograms()
    {
        return $this->scholarM->with('university')->get();
    }
    public function getProgById($id)
    {
        return $this->scholarM->where('id', $id)->with('university', 'scholarshipIntake', 'scholarshipFee')->first();
    }
}
