<?php

namespace App\Traits;


trait Filters
{

    /**
     * Get collection fields to the filter.
     */

    public function getFieldsToFilter($stolenCars,$fields)
    {

            return  $stolenCars->mapWithKeys(function ($stolenCar, $key) use($fields){
                            
                    return [$stolenCar->id => $stolenCar->$fields];

            });
    }
    /**
     * Get array fields filter.
     */

    public function filter($stolenCars)
    {
    	$filterData = ['marka', 'model', 'year'];

            foreach ($filterData as $field) {
 
                $filter[$field] = $this->getFieldsToFilter($stolenCars, $field)->all();
            }

            return $filter;     
    }
}



?>