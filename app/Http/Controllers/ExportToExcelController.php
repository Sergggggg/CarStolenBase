<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportStolenCarBase;


class ExportToExcelController extends Controller
{
    
	/**
    *  Export data to excel 
    */

	 public function exportToStolenCar(){
	 	
        return Excel::download(new ExportStolenCarBase, 'stolenCar.xlsx');
    }


}
