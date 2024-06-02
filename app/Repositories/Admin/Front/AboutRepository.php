<?php

namespace App\Repositories\Admin\Front;

use App\Models\Front\About;

class AboutRepository
{
    protected $aboutM;
    public function __construct(About $about)
    {
        $this->aboutM = $about;
    }

    //Get About
    public function getAbout()
    {
        return $this->aboutM->first();
    }
    public function getAboutById($id)
    {
        return $this->aboutM->where('id', $id)->first();
    }
    //Blank About
    public function blankAbout()
    {
        return new $this->aboutM;
    }
    //Save and Update
    public function saveAbout(array $data)
    {
        $save = $this->aboutM->create($data);
        if ($save) {
            return true;
        } else {
            return false;
        }
    }
    public function updateAbout(array $data)
    {
        $update = $this->aboutM->first()->update($data);
        if ($update) {
            return true;
        } else {
            return false;
        }
    }
}
