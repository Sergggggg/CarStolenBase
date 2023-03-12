<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\InfoCar;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use App\Models\StolenCarBase;
use Illuminate\Support\Facades\Auth;

class StolenAvtoController extends Controller implements InfoCar
{

	protected $request;
	protected $stolenCarBase;
	protected $user;

	function __construct(Request $request, StolenCarBase $stolenCarBase)
    {
      $this->request = $request;
      $this->stolenCarBase = $stolenCarBase;
      
    }


    public function index(){

		return view('formAddToBase');
    }

    /**
     *  Get all info car via API
     */

    public function infoCar(){

		$validator = $this->validator($this->request->all());

		if($validator->fails()){
			
			$errors = $validator->errors()->all();
		
			return	view('formAddToBase', compact('errors'));
		
		}else{
			
			$CarInfoByVin = $this->getInfoByVinCode($this->request->vin);

			$this->addCarInfoToDataBase($this->request, $CarInfoByVin);


			return redirect()->route('home')->with('success','Item created successfully!');

		}

    }

    /**
     *  Get info car via API
     */

    public function getInfoByVinCode($vin){

    	$infoByVin = Http::get('https://vpic.nhtsa.dot.gov/api/vehicles/decodevin/'
								    .$vin.'?format=json')->collect(['Results']);
   
   		$infoByVin = $infoByVin->map(function ($answer){

						switch ($answer['Variable']){
							
							case "Make":
							return ['marka'=> $answer['Value']];
							break;

							case "Model":
							return ['model'=> $answer['Value']];
							break;

							case "Model Year": 
							return ['year'=> $answer['Value']];
							break;

						}

    		})->filter()->collapse()->all();
  
		return $infoByVin;

    }
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'number' => ['required', 'unique:car_stoled_base', 'string', 'max:15'],
            'color'=>['required', 'string', 'max:15'],
            'vin' => ['required', 'unique:car_stoled_base', 'string', 'max:25'],
        ]);
    }

    /**
     *  Save data to database
     */

    protected function addCarInfoToDataBase($request, $CarInfoByVin) {

    		$this->stolenCarBase->name = $request->name;
    		$this->stolenCarBase->user_id = $request->user_id; 
    		$this->stolenCarBase->number = $request->number;
    		$this->stolenCarBase->color = $request->color;
    		$this->stolenCarBase->vin = $request->vin;
    		$this->stolenCarBase->marka = $CarInfoByVin['marka'];
    		$this->stolenCarBase->model = $CarInfoByVin['model'];
    		$this->stolenCarBase->year = $CarInfoByVin['year'];

    		$this->stolenCarBase->save();
    }
}
