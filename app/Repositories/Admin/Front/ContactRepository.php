<?php


namespace App\Repositories\Admin\Front;

use App\Models\Front\Contact;

class ContactRepository
{
    protected $contactM;
    public function __construct(Contact $contact)
    {
        $this->contactM = $contact;
    }
    //Get Contact
    public function getContact()
    {
        return $this->contactM->first();
    }
    public function getContactById($id)
    {
        return $this->contactM->where('id', $id)->first();
    }
    //blank Contact
    public function blankContact()
    {
        return new $this->contactM;
    }
    //Save and Update
    public function saveContact(array $data)
    {
        $save = $this->contactM->create($data);
        if ($save) {
            return true;
        } else {
            return false;
        }
    }
    public function updateContact(array $data, $id)
    {
        $update = $this->getContactById($id)->update($data);
        if ($update) {
            return true;
        } else {
            return false;
        }
    }
}
