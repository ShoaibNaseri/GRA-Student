<?php

namespace App\Repositories\Student\Profiling\Education;

use App\Models\Student\Education\Bachelor;
use App\Models\Student\Education\Master;
use App\Models\Student\Education\School;

class EducationRepository
{


    protected $schoolModel;
    protected $masterModel;
    protected $bachelorModel;


    public function __construct(School $school, Master $master, Bachelor $bachelor)
    {
        $this->schoolModel = $school;
        $this->masterModel = $master;
        $this->bachelorModel = $bachelor;
    }

    public function getEducatoinDataByStudentId($id)
    {
        $schoolData = $this->schoolModel->where('student_id', $id)->first();
        $masterData = $this->masterModel->where('student_id', $id)->first();
        $bachelorData = $this->bachelorModel->where('student_id', $id)->first();

        return [
            'school' => $schoolData,
            'bachelor' => $bachelorData,
            'master' => $masterData
        ];
    }
    public function getSchoolById($id)
    {
        return $this->schoolModel->where('id', $id)->first();
    }
    public function createSchool(array $data)
    {
        return $this->schoolModel->create($data);
    }
    public function updateSchool(array $data, $id)
    {
        return $this->getSchoolById($id)->update($data);
    }
    public function destroySchool($id)
    {
        return $this->getSchoolById($id)->delete();
    }
    public function getBachelorById($id)
    {
        return $this->bachelorModel->where('id', $id)->first();
    }
    public function createBachelor(array $data)
    {
        return $this->bachelorModel->create($data);
    }
    public function updateBachelor(array $data, $id)
    {
        return $this->getBachelorById($id)->update($data);
    }
    public function destroyBachelor($id)
    {
        return $this->getBachelorById($id)->delete();
    }
    public function getMasterById($id)
    {
        return $this->masterModel->where('id', $id)->first();
    }
    public function createMaster(array $data)
    {
        return $this->masterModel->create($data);
    }
    public function updateMaster(array $data, $id)
    {
        return $this->getMasterById($id)->update($data);
    }
    public function destroyMaster($id)
    {
        return $this->getMasterById($id)->delete();
    }
}
