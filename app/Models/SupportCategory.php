<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SupportCategory extends Model
{
    use HasFactory;


    /*
     * Use-case methods
     */

    public function getAllCategories(){
        return SupportCategory::orderBy('category_name', 'ASC')->get();
    }

    public function setSupportName(Request $request){
        $support = new SupportCategory();
        $support->category_name = $request->category_name;
        $support->save();
    }

    public function updateSupportName(Request $request){
        $support = SupportCategory::find($request->support);
        $support->category_name = $request->category_name;
        $support->save();
    }
}
