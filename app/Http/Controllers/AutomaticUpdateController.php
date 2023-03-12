<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Makes;
use App\Models\Models;

class AutomaticUpdateController extends Controller
{
    
    /**
     * Get data makes one time monthly.
     */

	public function getDataMakes(){
		
		$makesData = Http::get('https://vpic.nhtsa.dot.gov/api/vehicles/getallmakes?format=json')
							->collect(['Results'])->chunk(250)->toArray();

		$this->updateMakes($makesData)
		$this->getMakesById();

	}

    /**
     * Update data makes one time monthly.
     */

	public function updateMakes($makesData) {

	$makes = new Makes;

	foreach ($makesData as $makeData) {
 		
 		$makes->update($makeData->toArray());

		}

	}

	/**
     *  Get id makes one time monthly.
     */

	public function getMakesById(){

		$makesId = Makes::query()
						->select('make_id')
						->where('id', 2)
						->first()
						->toArray();

		$this->getModelsForMakeId($makesId);


	}

	/**
     *  Get id makes one time monthly.
     */ 

	public function getModelsForMakeId($makesId){

		$modelsDataById = Http::get('https://vpic.nhtsa.dot.gov/api/vehicles/getmodelsformakeid/'.$makesId['make_id'].'?format=json')
				->collect(['Results'])->collapse();
		 
		$this->updateModels($modelsDataById);
	}

	/**
     *  Update models one time monthly.
     */

	public function updateModels($modelsDataById){

		$makes = new Models; 

		$makes-> update([

		    		'make_id' => $modelsDataById['Make_ID'],
		    		'model_id' => $modelsDataById['Model_ID'],
		    		'model_name' => $modelsDataById['Model_Name'],

				]);


	}

}