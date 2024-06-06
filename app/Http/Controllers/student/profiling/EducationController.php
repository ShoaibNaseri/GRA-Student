<?php

namespace App\Http\Controllers\student\profiling;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\Education\BachelorRequest;
use App\Http\Requests\Student\Education\BachelorUpdateRequest;
use App\Http\Requests\Student\Education\MasterRequest;
use App\Http\Requests\Student\Education\MasterUpdateRequest;
use App\Http\Requests\Student\Education\SchoolRequest;
use App\Http\Requests\Student\Education\SchoolUpdateRequest;
use App\Repositories\Student\Profiling\Education\EducationRepository;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    //
    protected $educationRepo;
    public function __construct(EducationRepository $educationRepository)
    {
        $this->educationRepo = $educationRepository;
    }
    public function index($id)
    {
        $data = $this->educationRepo->getEducatoinDataByStudentId($id);
        return response()->json($data);
    }
    public function storeSchool(SchoolRequest $request)
    {
        $data = $request->validated();

        $success = $this->educationRepo->createSchool($data);
        if ($success) {
            return response()->json(['success' => 'School Information Add Successfully']);
        } else {
            return response()->json(['error' => 'Faild To Add School Data'], 401);
        }
    }
    public function editSchool($id)
    {
        $data = $this->educationRepo->getSchoolById($id);
        return response()->json($data);
    }

    public function updateSchool(SchoolUpdateRequest $request, $id)
    {
        $data = $request->validated();

        $success = $this->educationRepo->updateSchool($data, $id);
        if ($success) {
            return response()->json(['success' => 'Your School Information has been updated successfully']);
        } else {
            return response()->json(['error' => 'Faild To Update Your School Information']);
        }
    }
    public function deleteSchool($id)
    {
        $success = $this->educationRepo->destroySchool($id);
        if ($success) {
            return response()->json(['success' => 'School Information Deleted Successfully']);
        } else {
            return response()->json(['error' => 'Faild to Delete School Information']);
        }
    }
    public function storeBachelor(BachelorRequest $request)
    {
        $data = $request->validated();
        $success = $this->educationRepo->createBachelor($data);
        if ($success) {
            return response()->json(['success' => 'Bachelor Degree Information Saved']);
        } else {
            return response()->json(['error' => 'Faild To Save Bachelor Degree Information']);
        }
    }

    public function editBachelor($id)
    {
        $data = $this->educationRepo->getBachelorById($id);
        return response()->json($data);
    }
    public function updateBachelor(BachelorUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $success = $this->educationRepo->updateBachelor($data, $id);
        if ($success) {
            return response()->json(['success' => 'Bachelor Degree Information updated Successfully']);
        } else {
            return response()->json(['error' => 'Fiald To update Bachelor Degree Information']);
        }
    }
    public function deleteBachelor($id)
    {
        $success = $this->educationRepo->destroyBachelor($id);
        if ($success) {
            return response()->json(['success' => 'Bachelor Degree Information Deleted Successfully']);
        } else {
            return response()->json(['error' => 'Faild To Delete Bachelor Degree Information']);
        }
    }

    public function storeMaster(MasterRequest $request)
    {
        $data = $request->validated();
        $success = $this->educationRepo->createMaster($data);
        if ($success) {
            return response()->json(['success' => 'Master Degree Infomation Saved']);
        } else {
            return response()->json(['error' => 'Faild To Save Master Degree Information']);
        }
    }
    public function editMaster($id)
    {
        $data = $this->educationRepo->getMasterById($id);
        return response()->json($data);
    }
    public function updateMaster(MasterUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $success = $this->educationRepo->updateMaster($data, $id);
        if ($success) {
            return response()->json(['success' => 'Master Degree Information Updated Successfully ']);
        } else {
            return response()->json(['error' => 'Faild To Update Master Degree Information']);
        }
    }
    public function deleteMaster($id)
    {
        $success = $this->educationRepo->destroyMaster($id);
        if ($success) {
            return response()->json(['success' => 'Master Degree Recored Deleted Successfully']);
        } else {
            return response()->json(['error' => 'Faild To Delete Master Degree Information']);
        }
    }
}
