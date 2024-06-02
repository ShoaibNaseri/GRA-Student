<?php

namespace App\Repositories\Admin\FormData;

use App\Models\Front\Country;

class CountryRepository
{
    protected $countryM;
    public function __construct(Country $country)
    {
        $this->countryM = $country;
    }

    public function getAllCountries()
    {
        return $this->countryM->all();
    }
}
