<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\PolicySetting as PolicySet;
use Illuminate\Support\Facades\Auth;

class PolicySetting extends Model
{
    use HasFactory;


    /*
     * Use-case methods
     */

    public function setNewPolicySettings(Request $request){
        $policy = PolicySet::first();
        if(empty($policy)){
            $new = new PolicySet();
            $new->charge_rate = $request->charge_rate ?? '';
            $new->minimum_threshold = $request->minimum_threshold ?? '';
            $new->set_by = Auth::user()->id;
            $new->save();
        }else{
            $policy->charge_rate = $request->charge_rate ?? '';
            $policy->minimum_threshold = $request->minimum_threshold ?? '';
            $policy->set_by = Auth::user()->id;
            $policy->save();
        }
    }


    public function getPolicySettings(){
        return PolicySet::first();
    }
}
