<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUser extends Authenticatable
{
    use HasFactory;

    public function __construct()
    {
        //$this->log = new ApplicationLog();
    }

    /*
     * Use-case methods
     */
    public function getAllUsers(){
        //$this->log->registerNewActivity(Auth::user()->id, 'All Admin Users', 'Accessed list of administrative users');
        return AdminUser::orderBy('first_name', 'ASC')->get();
    }

    public function setNewAdminUser(Request $request){
        $user = new AdminUser();
        $user->first_name = $request->first_name ?? '';
        $user->surname = $request->surname ?? '';
        $user->email = $request->email ?? '';
        $user->mobile_no = $request->mobile_no ?? '';
        $user->password = bcrypt('password123');
        $user->username = $request->username;
        $user->save();
        //$this->log->registerNewActivity(Auth::user()->id, 'New admin registration', 'Registered new admin user');

    }

    public function updateAdminUser(Request $request){
        $user = AdminUser::find($request->user);
        $user->first_name = $request->first_name ?? '';
        $user->surname = $request->surname ?? '';
        $user->email = $request->email ?? '';
        $user->mobile_no = $request->mobile_no ?? '';
        $user->save();
       // $this->log->registerNewActivity(Auth::user()->id, "User record updated", "Made changes to user's (".$user->first_name .")record ");
    }

    public function deactivateUserAccount(Request $request){
        $user = AdminUser::find($request->user);
        $user->account_status = 2; //account deactivated
        $user->save();
        //$this->log->registerNewActivity(Auth::user()->id, "Account deactivated", "User's account (".$user->first_name.") deactivated");
    }
    public function activateUserAccount(Request $request){
        $user = AdminUser::find($request->user);
        $user->account_status = 1; //account activate
        $user->save();
        //$this->log->registerNewActivity(Auth::user()->id, "Account activated", "User's account (".$user->first_name.") activated");
    }

    public function getAdminUserById($id){
        return AdminUser::find($id);
    }

}
