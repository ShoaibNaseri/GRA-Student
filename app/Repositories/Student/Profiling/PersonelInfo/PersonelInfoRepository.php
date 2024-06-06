<?php

namespace App\Repositories\Student\Profiling\PersonelInfo;

use App\Models\Student\Personel\Personelinfo;

class PersonelInfoRepository
{
    protected $personalM;
    public function __construct(Personelinfo $personelinfo)
    {
        $this->personalM = $personelinfo;
    }
    public function getPersonalDataById($id)
    {
        return $this->personalM->where('id', $id)->first();
    }
    public function getPersonalDataByStudentId($id)
    {
        return $this->personalM->where('student_id', $id)->with('student')->first();
    }
    public function getBlankPersonal()
    {
        return new $this->personalM;
    }
    //Save And UPdate
    public function savePersonalInfoData(array $data)
    {
        $save = $this->personalM->create($data);
        if ($save) {
            return true;
        } else {
            return false;
        }
    }
    public function updatePersonalInfoData(array $data, $id)
    {
        $update = $this->personalM->where('id', $id)->update($data);
        if ($update) {
            return true;
        } else {
            return false;
        }
    }
}
