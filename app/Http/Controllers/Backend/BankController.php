<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->bank = new Bank();
    }

    public function bankSetup(){
        return view('policy.bank-setup',['banks'=>$this->bank->getAllBanks()]);
    }

    public function storeBank(Request $request){
        $this->validate($request, [
            'bank_name'=>'required'
        ]);
        $this->bank->setBankName($request);
        session()->flash("success", "<strong>Success!</strong> New bank registered.");
        return back();
    }
    public function updateBank(Request $request){
        $this->validate($request, [
            'bank_name'=>'required',
            'bank'=>'required'
        ]);
        $this->bank->updateBankName($request);
        session()->flash("success", "<strong>Success!</strong> Changes saved.");
        return back();
    }
}
