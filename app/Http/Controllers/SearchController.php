<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StolenCarBase;

class SearchController extends Controller
{

	protected $search;
	protected $stolenCarBase;
	public $searchResults;

	function __construct(Request $request, StolenCarBase $stolenCarBase)
    {
     
		$this->search = $request->get('q');
		$this->stolenCarBase = $stolenCarBase;
    }

    /**
     *  view searched data.
     */
    
    public function index(){

    	$this->search();

    	return view('search')->with('searchResults', $this->searchResults);
    }

    /**
     *  Search in StolenCarBase.
     */

	public function search(){

		if ($this->search) {

        $this->searchResults = $this->stolenCarBase->where(function($q){

                $q->where('name', "%$this->search%")
                	->orWhere('name', 'like', "%$this->search%")
                    ->orWhere('vin', 'like', "%$this->search%")
                    ->orWhere('number', 'like', "%$this->search%")
                    ->orWhere('marka', 'like', "%$this->search%")
                    ->orWhere('model', 'like', "%$this->search%")
                    ->orWhere('color', 'like', "%$this->search%")
                    ->orWhere('year', 'like', "%$this->search%");
            })->get();
        }
    }
}
