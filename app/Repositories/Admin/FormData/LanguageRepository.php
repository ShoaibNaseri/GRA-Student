<?php

namespace App\Repositories\Admin\FormData;

use App\Models\Admin\Language;

class LanguageRepository
{
    protected $langM;
    public function __construct(Language $language)
    {
        $this->langM = $language;
    }
    public function getAll()
    {
        return $this->langM->all();
    }
}
