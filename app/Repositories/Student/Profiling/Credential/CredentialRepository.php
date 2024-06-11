<?php

namespace App\Repositories\Student\Profiling\Credential;

use App\Models\Student\Credential\Credential;

class CredentialRepository
{
    protected $credenModel;
    public function __construct(Credential $credential)
    {
        $this->credenModel = $credential;
    }
    public function getCredentialByStudentId($id)
    {
        $data =  $this->credenModel->where('student_id', $id)->first();
    }
    public function getCredenById($id)
    {
        return $this->credenModel->where('id', $id)->first();
    }
    public function saveCreden(array $data)
    {
        return $this->credenModel->create($data);
    }
    public function updateCreden(array $data, $id)
    {
        return $this->getCredenById($id)->update($data);
    }
    public function deleteCreden($id)
    {
        return $this->getCredenById($id)->delete();
    }
}
