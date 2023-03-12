<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\JsonResponseFormat;
use App\Models\StolenCarBase;
use App\Models\Models;
use App\Http\Resources\Api\CarBaseResource;
use Illuminate\Http\Request;



class ExportController extends Controller
{
    use JsonResponseFormat;

    public function getCarStoledBase(Request $request)
    {

        $query = StolenCarBase::findOrFail($request->id);

        return new CarBaseResource($query);
    }

    public function getModels(Request $request)
    {

        return Models::where('make_id', $request->make_id)->first();
    
    }
}


