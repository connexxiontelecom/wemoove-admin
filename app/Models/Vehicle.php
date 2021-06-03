<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vehicle as Veh;

class Vehicle extends Model
{
    use HasFactory;






    /*
     * Use-case methods
     */

    public function getAllVehicles(){
        return Veh::orderBy('id', 'DESC')->get();
    }

    public function getVehicleById($id){
        return Veh::find($id);
    }

    public function getVehicleByDriverId($id){
        return Veh::where('driver_id', $id)->first();
    }
}
