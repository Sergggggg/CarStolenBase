<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StolenCarBase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EditController extends Controller
{

	/**
     *  Show data.
     */

    public function show(Request $request){


    	$infoCarToEdit = $this->getInfoCar($request->id);

    	return view('edit', compact('infoCarToEdit'));

    }

	/**
     *  Info car.
     */

    protected function getInfoCar($id){

    	$user = Auth::user();

		return      StolenCarBase::query()
						->where('user_id', $user->id)
						->where('id', $id)
						->first();
    }


    /**
     *  Edit Stolen car.
     */

    protected function edit(Request $request){

    				

		$validator = $this->validator($request->all(), $request->id);

		if($validator->fails()){
			
			$errors = $validator->errors()->all();
		
			return	view('edit', compact('errors'));

	    }else{

	    	$this->saveEdittedData($request);

	    	return redirect()->route('home')->with('success','Item edit successfully!');
	    }

	}
     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data, $id)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'number' => 'required|unique:car_stoled_base,number, '.$id,
            'color'=>['required', 'string', 'max:15'],
            'vin' => 'required|unique:car_stoled_base,vin, '.$id,
            'marka'=>['required', 'string', 'max:25'],
            'model'=>['required', 'string', 'max:25'],
            'year'=>['required', 'digits:4', 'integer'],
        ]);
    }

    /**
     *  Save editted record to stolen car base.
     */


    protected function saveEdittedData($request){

    	$stolenCarBase = $this->getInfoCar($request->id);

    		$stolenCarBase->name = $request->name;
    		$stolenCarBase->user_id = $request->user_id; 
    		$stolenCarBase->number = $request->number;
    		$stolenCarBase->color = $request->color;
    		$stolenCarBase->vin = $request->vin;
    		$stolenCarBase->marka = $request->marka;
    		$stolenCarBase->model = $request->model;
    		$stolenCarBase->year = $request->year;

		$stolenCarBase->update();

    }
}
