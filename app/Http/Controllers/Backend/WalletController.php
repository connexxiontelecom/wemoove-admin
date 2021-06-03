<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    //

    public function __construct(){
        $this->users = new User();
        $this->wallet = new Wallet();
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
        $this->wallet->creditWallet($request);
        session()->flash("success", "<strong>Success!</strong> Account credited.");
        return back();
    }
}
