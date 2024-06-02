<?php

namespace App\Repositories\Admin\FormData;

use App\Models\Admin\Category;

class ProgramCategoryRepository
{
    protected $proCateM;
    public function __construct(Category $category)
    {
        $this->proCateM = $category;
    }
    public function getAll()
    {
        return $this->proCateM->all();
    }
}
