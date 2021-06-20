<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayoutRequest extends Model
{
    use HasFactory;

    public function getUser(){
        return $this->belongsTo(User::class, 'user_id');
    }



    /*
     * Use-case methods
     */

    public function getAllPayoutRequests(){
        return PayoutRequest::orderBy('id', 'DESC')->get();
    }

    public function getPayoutRequestById($id){
        return PayoutRequest::find($id);
    }

    public function updatePayoutRequest(Request $request){
        $payout = PayoutRequest::find($request->payout);
        if($request->status == 1){ //approved
            $payout->action_type = 1;
            $payout->action_taken_by = Auth::user()->id;
            $payout->action_taken_date = now();
            $payout->action_comment = "Payout request of ".$payout->amount." approved.";
            $payout->save();
            #Update wallet
            $wallet = new Wallet();
            $wallet->debit = $payout->amount;
            $wallet->narration = "Payout request of ".$payout->amount." approved.";
            $wallet->user_id = $payout->user_id;
            $wallet->save();
        }else{ //declined
            $payout->action_type = 2; //declined
            $payout->action_taken_by = Auth::user()->id;
            $payout->action_taken_date = now();
            $payout->action_comment = "Payout request of ".$payout->amount." declined.";
            $payout->save();
        }
    }


}
