<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function policySettings(){
        return view('policy.policy-settings');
    }
}
