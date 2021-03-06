<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PayoutRequest;
use App\Models\PolicySetting;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    //

    public function __construct(){
        $this->users = new User();
        $this->wallet = new Wallet();
        $this->payout = new PayoutRequest();
        $this->policysettings = new PolicySetting();
        $this->middleware('auth');
    }

    public function walletDashboard(){
        $wallet = Wallet::whereYear('created_at', date('Y'))->orderBy('id', 'DESC')->get();
        return view('wallet.dashboard', ['wallet'=>$wallet]);
    }

    public function creditWallet(){
        return view('wallet.credit-wallet',['users'=>$this->users->getAllDrivers()]);
    }

    public function storeCreditWallet(Request $request){
        $this->validate($request,[
            'account'=>'required',
            'amount'=>'required'
        ]);
        $this->wallet->creditWallet($request, $this->users->getUserByPhoneNumber($request->account));
        session()->flash("success", "<strong>Success!</strong> Account credited.");
        return back();
    }


    public function showPayoutRequests(){
        return view('wallet.payout-requests', ['payouts'=>$this->payout->getAllPayoutRequests()]);
    }


    public function viewPayoutRequest($id){
        $payout = $this->payout->getPayoutRequestById($id);
        if(!empty($payout)){

            $wallet = $this->wallet->getUserWalletTransactionsByUserId($payout->user_id);
            return view('wallet.view-payout-request',[
                'payout'=>$payout,
                'wallet'=>$wallet,
                'thismonth'=>$this->wallet->getThisMonthsEarningsByUserId($id),
                'thisyear'=>$this->wallet->getThisYearsEarningsByUserId($id),
                'policysettings'=>$this->policysettings->getPolicySettings()
                ]);
        }else{
            session()->flash("error", "<strong>Whoops!</strong> No record found.");
            return back();
        }
    }

    public function processPayoutRequest(Request $request){
        $this->validate($request,[
            'payout'=>'required',
            'status'=>'required'
        ]);
        $this->payout->updatePayoutRequest($request);
        session()->flash("success", "<strong>Success!</strong> Payout request status updated.");
        return back();
    }

    public function wallet(){

        return view('wallet.wallet',['users'=>$this->users->getAllDrivers()]);
    }

    public function customerLedger($id){
        $user = $this->users->getUserOnlyById($id);
        if(!empty($user)){
            $wallet = $this->wallet->getUserWalletTransactionsByUserId($id);
            return view('wallet.customer-ledger',[
                'wallet'=>$wallet,
                'thismonth'=>$this->wallet->getThisMonthsEarningsByUserId($id),
                'thisyear'=>$this->wallet->getThisYearsEarningsByUserId($id),
                'user'=>$user
                ]);
        }else{
            session()->flash("error", "<strong>Whoops!</strong> No record found.");
            return back();
        }
    }

    public function checkAccount(Request $request){
        $this->validate($request,[
            'account'=>'required'
        ]);
        $status = $this->users->checkUserAccountByPhoneNumber($request);
        if($status == 0){
            //$account = $this->users->checkUserAccountByPhoneNumber($request);
            return response()->json(['error'=>'No record found.']);
        }else{
            return response()->json(['success'=>'Account does exist.'],200);
        }

    }
}
