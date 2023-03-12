<?php

namespace App\Exports;

use App\Models\StolenCarBase;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportStolenCarBase implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function collection()
    {
        return StolenCarBase::query()
        				->orderBy('name')
        				->get();
    } 
}
