<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getDriverRides(){
        return $this->hasMany(Ride::class, 'driver_id');
    }

    public function getDriverReviews(){
        return $this->hasMany(Rating::class, 'driver_id');
    }

    public function getDriverVehicles(){
        return $this->hasMany(Vehicle::class, 'driver_id');
    }




    /*
     * use-case methods
     */
    public function getAllDrivers(){
        return User::where('user_type',1)->orderBy('full_name', 'ASC')->get();
    }

    public function getAllPassengers(){
        return User::where('user_type',0)->orderBy('full_name', 'ASC')->get();
    }

    public function getUserById($id){
        return User::find($id);
    }
}
