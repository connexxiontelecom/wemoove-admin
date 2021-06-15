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
        $assets =  $this->user->getUserById($id);
        //return dd($user["user"]["user_type"]);
        //return dd($assets);
        if(!empty($assets)){
            return view('profile',['assets'=>$assets, 'user'=>$this->user->getUserOnlyById($id)]);
        }else{
            session()->flash("error", "Whoops! No record found.");
            return back();
        }
    }

    public function updateAccountStatus(Request $request){
        $this->validate($request,[
            'user'=>'required',
            'action'=>'required'
        ]);
        $this->user->updateUserAccountStatus($request);
        session()->flash("success", "<strong>Success!</strong> Account ".$request->action);
        return back();
    }
}
