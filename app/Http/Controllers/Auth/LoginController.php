<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request){
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required'
        ],[
            'username.required'=>'Enter your username',
            'password.required'=>'Enter your password for this account'
        ]);
        $user = AdminUser::where('username', $request->username)->first();
        if(!empty($user)){
            if(Auth::attempt(['username'=>$request->username,'password'=>$request->password])){
                return redirect()->route('dashboard');
            }
        }else{
            session()->flash("error", "<strong>Whoops!</strong> There's no account with these credentials.");
            return back();
        }

    }
}
