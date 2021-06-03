<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ride as R;

class Ride extends Model
{
    use HasFactory;

    public function getDriver(){
        return $this->belongsTo(User::class, 'driver_id');
    }

    public function getRidePassengers(){
        return $this->hasMany(Passenger::class, 'ride_id');
    }


    /*
     * Use-case methods
     */

    public function getAllRides(){
        return R::orderBy('id', 'DESC')->get();
    }

    public function getRideById($id){
        return R::where('id', $id)->first();
    }

    public function cancelRide($rideId){
        $ride = R::where('id', $rideId)->first();
        $ride->ride_status = 2; //cancel ride
        $ride->save();
    }


}
