<?php

namespace App\Repositories\Admin\Front;

use App\Models\Front\Gallery;

class GalleryRepository
{
    protected $galleryM;

    public function __construct(Gallery $gallery)
    {
        $this->galleryM = $gallery;
    }

    public function getAllGallery()
    {
        return $this->galleryM->all();
    }
    public function storeGalleryImage(array $data)
    {
        return $this->galleryM->create($data);
    }
    public function getGalleryById($id)
    {
        return $this->galleryM->where('id', $id)->first();
    }
    public function deleteGalleryImage($id)
    {
        return $this->getGalleryById($id)->delete();
    }
}
