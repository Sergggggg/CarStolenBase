<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StolenCarBase;
use Illuminate\Support\Facades\Auth;
use App\Traits\Filters;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    use Filters;

    public function __construct()
    {
        
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        $user = Auth::user();

        $stolenCars = $this->getStolenCar($user);

        $filter = $this->filter($stolenCars);
        
        return view('home', compact('stolenCars', 'filter'));
    } 
 
    /**
     * Get Stolen car by user id.
     */

    public function getStolenCar($user)
    {

        return      StolenCarBase::query()
                            ->where('user_id', $user->id)
                            ->orderBy('name')
                            ->paginate(10);
    }
}
