<?php

namespace App\Repositories\Admin\Front;

use App\Models\Front\Slider;

class SliderRepository
{
    protected $sliderM;


    public function __construct(Slider $slider)
    {
        $this->sliderM = $slider;
    }

    public function getAll()
    {
        return $this->sliderM->all();
    }
    public function getSlideById($id)
    {
        return $this->sliderM->where('id', $id)->first();
    }
    public function saveSlider(array $data)
    {
        return  $this->sliderM->create($data);
    }
    public function updateSlider(array $data, $id)
    {
        return $this->sliderM->where('id', $id)->update($data);
    }
    public function updateOnlyImage(array $data, $id)
    {
        return $this->sliderM->where('id', $id)->update([
            'image' => $data['image']
        ]);
    }
    public function deleteSlide($id)
    {
        return $this->getSlideById($id)->delete();
    }
}
