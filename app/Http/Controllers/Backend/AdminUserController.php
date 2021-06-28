<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
        $this->adminuser = new AdminUser();
    }

    public function allUsers(){
        $admin_users = $this->adminuser->getAllUsers();
        return view('adminusers.all-users', ['admin_users'=>$admin_users]);
    }

    public function showAddNewUserForm(){
        return view('adminusers.add-new-user');
    }

    public function storeNewAdminUser(Request $request){
        $this->validate($request,[
            'email'=>'required|unique:admin_users,email',
            'first_name'=>'required',
            'surname'=>'required',
            'username'=>'required|unique:admin_users,username'
        ]);
        $this->adminuser->setNewAdminUser($request);
        session()->flash("success", "<strong>Success!</strong> New admin user registered");
        return back();
    }

    public function getAdminUser($id){
        $user = $this->adminuser->getAdminUserById($id);
        if(!empty($user)){
            return view('adminusers.view-user', ['user'=>$user]);
        }else{
            session()->flash("error","<strong>Whoops!</strong> No record found.");
            return back();
        }
    }
}
