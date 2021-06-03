<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
        $this->user = new User();
    }

    public function userDetail($id){
        $user = $this->user->getUserById($id);
        if(!empty($user)){
            return view('profile',['user'=>$user]);
        }else{
            session()->flash("error", "Whoops! No record found.");
            return back();
        }
    }
}
