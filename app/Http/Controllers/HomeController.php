<?php

namespace App\Http\Controllers;

use App\Models\Ride;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->rides = new Ride();
        $this->users = new User();
        $this->vehicles = new Vehicle();
        $this->middleware('auth');
    }

    public function dashboard(){
        return view('dashboard', [
            'rides'=>$this->rides->getAllRides(),
            'drivers'=>$this->users->getAllDrivers(),
            'passengers'=>$this->users->getAllPassengers(),
            'vehicles'=>$this->vehicles->getAllVehicles()
            ]);
    }
}
