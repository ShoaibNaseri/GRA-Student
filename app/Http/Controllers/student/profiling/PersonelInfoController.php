<?php

namespace App\Http\Controllers\student\profiling;

use App\Http\Controllers\Controller;
use App\Repositories\Student\Profiling\PersonelInfo\PersonelInfoRepository;
use Illuminate\Http\Request;

class PersonelInfoController extends Controller
{
    //
    protected $personelInfoRepo;
    public function __construct(PersonelInfoRepository $personalInfoRepository)
    {
        $this->personelInfoRepo = $personalInfoRepository;
    }
    public function index($id)
    {
        $data = $this->personelInfoRepo->getPersonalDataByStudentId($id);
        return response()->json($data);
    }
    public function edit($id)
    {
        $data = $this->personelInfoRepo->getPersonalDataById($id);
        return response()->json($data);
    }
}
