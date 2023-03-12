<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StolenCarBase;
use Illuminate\Support\Facades\Auth;
use App\Traits\Filters;

class FilterController extends Controller
{
    use Filters;

    /**
     *  Show filtered data.
     */

    public function index(Request $request){

    	$user = Auth::user();

    	$stolenCarBase = $this->carBase($user);

    	$filter = $this->filter($stolenCarBase->get());

		$this->filtersID($stolenCarBase, $request);

		$checked = $request->query();

		$carBaseData = $stolenCarBase->get();
    		
	        return view('filter', compact('carBaseData', 'filter', 'checked'));

    }

	/**
     *  Filter by fields.
     */

    public function filterByFields($stolenCarBase, $filtersID){

    	return $stolenCarBase->whereIn('id', $filtersID);
    }

	/**
     *  Filters data.
     */

    public function filtersData($stolenCarBase, $request){

		$filtersID = [];
		
	 	if($request->marka)
	 		$filtersID=$request->marka;
	
		if($request->model)
			$filtersID=array_merge($filtersID, $request->model);
	
		if($request->year)
			$filtersID = array_merge($filtersID, $request->year);


		$this->filterByFields($stolenCarBase, array_unique($filtersID));


    }

    /**
     * Get Stolen car by user id.
     */

    private function carBase($user){
 
 		return StolenCarBase::query()->where('user_id', $user->id);

    }
}
