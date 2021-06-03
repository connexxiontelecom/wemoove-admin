<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DriverController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
        $this->driver = new User();
    }


    public function index(){
        $drivers = $this->driver->getAllDrivers();
        return view('driver.index', ['drivers'=>$drivers]);
    }
    public function newRegistrations(){
        $drivers = $this->driver->getAllDrivers();
        return view('driver.new-registrations', ['drivers'=>$drivers]);
    }
}
