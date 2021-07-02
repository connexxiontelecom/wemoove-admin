<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

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

    public function getUserReviews(){
        return $this->hasMany(Rating::class, 'driver_id');
    }




    /*
     * use-case methods
     */
    public function getAllDrivers(){
        return User::where('user_type',1)->orderBy('full_name', 'ASC')->get();
    }

    public function getAllPotentialDrivers(){
        return User::where('confirmed',0)->where('declined',0)->orderBy('full_name', 'ASC')->get();
    }

    public function getAllPassengers(){
        return User::where('user_type',0)->orderBy('full_name', 'ASC')->get();
    }

    public function getUserById($id){
        //return User::find($id);

        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://wemove.cnx247.com/api/fetchuser/'.$id);
        //$response = $request->getBody();
        $result = json_decode($request->getBody()->getContents(), true);
        //http://wemove.cnx247.com/api/fetchuser
        return $result;

    }

    public function getCarsByDriverId($id){
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://wemove.cnx247.com/api/fetchcars/'.$id);
        //$response = $request->getBody();
        $result = json_decode($request->getBody()->getContents(), true);
        return $result;
    }

    public function getUserOnlyById($id){
        return User::find($id);
    }

    public function updateUserAccountStatus(Request $request){
        $user = User::find($request->user);
        switch($request->action){
            case 'decline':
                $user->status = 2; //ban
                $user->declined = 1;
                $user->declined_by = Auth::user()->id;
                $user->declined_date = now();
                $user->save();
            break;
            case 'ban':
                $user->status = 3; //
                $user->save();
            break;
            case 'activate':
                $user->status = 1; //suspended
                $user->save();
            break;
            case 'suspend':
                $user->status = 4;
                $user->save();
            break;
            case 'approve':
                $user->status = 0; //active
                $user->confirmed = 1;
                $user->confirmed_by = Auth::user()->id;
                $user->confirmed_date = now();
                $user->save();
            break;
        }

    }

    public function getUserByPhoneNumber($number){
        return User::where('phone_number', $number)->first();
    }

    public function getUserWalletBalanceById($id){
        $debit = Wallet::where('user_id', $id)->sum('debit');
        $credit = Wallet::where('user_id', $id)->sum('credit');
        return $credit - $debit;
    }

    public function checkUserAccountByPhoneNumber(Request $request){
        $account = User::where('phone_number', $request->account)->first();
        if(!empty($account)){
            return 1; //exists
        }else{
            return 0;//no record
        }
    }


}
