<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('auth');
        $this->passenger = new User();
    }


    public function passengers(){
        $passengers = $this->passenger->getAllPassengers();
        return view('passenger.index', ['passengers'=>$passengers]);
    }
   /* public function newRegistrations(){
        $drivers = $this->passenger->getAllDrivers();
        return view('driver.new-registrations', ['drivers'=>$drivers]);
    }*/
}
