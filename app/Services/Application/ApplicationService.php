<?php

namespace App\Services\Application;


class ApplicationService
{


    public static function generateApplicationName()
    {
        $currentData = now();
        $formatDate = $currentData->format('MDYHsi');
        $getName = "S" . "A" . "-ID-" . $formatDate;
        return $getName;
    }
}
