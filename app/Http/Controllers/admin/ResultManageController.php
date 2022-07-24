<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\repositarys\ResultLogic;
use Illuminate\Http\Request;

class ResultManageController extends Controller
{
    public $ResultLogic;
    function __construct(ResultLogic $ResultLogic)
    {
        $this->ResultLogic = $ResultLogic;
    }

    public function ResultPost(Request $request){

        $request->validate([
             'student_id'=>'required',
             'gpa'=>'required',
             'dates'=>'required'
        ]);

        $this->ResultLogic->Store($request);
    }

    public function ResultAll(){
        
       $size=$this->ResultLogic->AllResult();
        return response()->json(['size'=>$size]);
    }

    public function ResultDelete($Id){
        
        $this->ResultLogic->Delete($Id);
    }

    public function ResultEdit($id){

        $edit = $this->ResultLogic->Edit($id);

        return response()->json(['edit'=>$edit]);
    }

    public function ResultUpdate(Request $request){

        $this->ResultLogic->Update($request);
    }

    public function StudentDataView(){
       $all = $this->ResultLogic->ViewData();
        return response()->json(['all'=>$all]);
    }
}
