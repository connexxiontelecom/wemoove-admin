<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ride;

class RideController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->ride = new Ride();
    }



    public function index(){
        $rides = $this->ride->getAllRides();
        return view('ride.index',['rides'=>$rides]);
    }
}
