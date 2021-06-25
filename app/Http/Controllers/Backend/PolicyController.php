<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PolicySetting;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->policysettings = new PolicySetting();
    }

    public function policySettings(){
        return view('policy.policy-settings');
    }

    public function processPolicySettings(Request $request){
        $this->validate($request,[
            'minimum_threshold'=>'required',
            'charge_rate'=>'required'
        ]);
        $this->policysettings->setNewPolicySettings($request);
        session()->flash("success", "<strong>Success!</strong> Policy settings updated.");
        return back();

    }
}
