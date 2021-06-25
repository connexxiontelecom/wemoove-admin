<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SupportCategory;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->supportcategory = new SupportCategory();
    }


    public function showSupportCategories(){
        return view('support.categories', ['categories'=>$this->supportcategory->getAllCategories()]);
    }

    public function setSupportName(Request $request){
        $this->validate($request,[
            'category_name'=>'required'
        ]);
        $this->supportcategory->setSupportName($request);
        session()->flash("success", "<strong>Success!</strong> New support category name set.");
        return back();
    }

    public function updateSupportName(Request $request){
        $this->validate($request,[
            'category_name'=>'required'
        ]);
        $this->supportcategory->updateSupportName($request);
        session()->flash("success", "<strong>Success!</strong> Changes saved.");
        return back();
    }
}
