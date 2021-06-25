<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SupportRequest extends Model
{
    use HasFactory;


    /*
     * Use-case methods
     */

  /*  public function setNewSupportRequest(Request $request){

        $support = new SupportRequest();
        $support->user_id = $request
    }*/

    public function getAllSupportRequests(){
        return SupportRequest::orderBy('id', 'DESC')->get();
    }

    public function getSupportRequestById($id){
        return SupportRequest::find($id);
    }

    public function updateSupportRequestStatus(Request $request){
        $support = SupportRequest::find($request->id);
        $support->status = $request->status;
        $support->save();
    }
}
