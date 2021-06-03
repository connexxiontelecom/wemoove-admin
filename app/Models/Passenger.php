<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Passenger as Pass;
class Passenger extends Model
{
    use HasFactory;

    public function getUser(){
        return $this->belongsTo(User::class, 'passenger_id');
    }


    /*
     * Use-case methods
     */

    public function getAllPassengers(){
        return Pass::orderBy('id', 'DESC')->get();
    }

    public function getPassengerById($id){
        return Pass::find($id);
    }


}
