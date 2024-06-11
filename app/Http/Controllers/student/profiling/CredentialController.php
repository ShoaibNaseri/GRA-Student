<?php

namespace App\Http\Controllers\student\profiling;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\Credential\CredentialSave;
use App\Http\Requests\Student\Credential\CredentialUpdate;
use App\Repositories\Student\Profiling\Credential\CredentialRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CredentialController extends Controller
{


    protected $credenRepo;
    public function __construct(CredentialRepository $credentialRepository)
    {
        $this->credenRepo = $credentialRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        $data  = $this->credenRepo->getCredentialByStudentId($id);
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CredentialSave $request)
    {
        //
        $data = $request->validated();
        $success = $this->credenRepo->saveCreden($data);

        if ($success) {
            return response()->json(['success' => 'Your Credentials Has Been Saved Successfully']);
        } else {
            return response()->json(['error' => 'Faild To Save Credentials']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = $this->credenRepo->getCredenById($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CredentialUpdate $request, string $id)
    {
        //
        $data = $request->validated();
        $success = $this->credenRepo->updateCreden($data, $id);
        if ($success) {
            return response()->json(['message' => 'Credential Data Saved']);
        } else {
            return response()->json(['error' => 'Faild To Save Date']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $success = $this->credenRepo->deleteCreden($id);
        if ($success) {
            return response()->json(['message' => 'Credentials Details Has Been Deleted Successfully']);
        } else {
            return response()->json(['error' => 'Faild To Delete Credentials Details']);
        }
    }
}
