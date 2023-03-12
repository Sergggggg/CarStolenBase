<?php

namespace App\Contracts;

/**
 * Interface info car
 */
interface InfoCar
{
    
    public function getInfoCar();

    public function getInfoByVinCode($vin);
}
