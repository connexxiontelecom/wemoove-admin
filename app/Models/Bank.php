<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Bank extends Model
{
    use HasFactory;


    /*
     * use-case methods
     */

    public function getAllBanks(){
        return Bank::orderBy('bank_name', 'ASC')->get();
    }

    public function setBankName(Request $request){
        $bank = new Bank();
        $bank->bank_name = $request->bank_name;
        $bank->save();
    }

    public function updateBankName(Request $request){
        $bank = Bank::find($request->bank);
        $bank->bank_name = $request->bank_name;
        $bank->save();
    }
}
