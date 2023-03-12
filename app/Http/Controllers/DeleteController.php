<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StolenCarBase;

class DeleteController extends Controller
{
    
    /**
     *  Delete data from StolenCarBase.
     */

    public function delete(Request $request){

    	$deleteId = $request->input('delete');

		StolenCarBase::where('id', $deleteId)->delete();    	

    	return redirect()->route('home')->with('success','Record was deleted successfully!');
    }
}
