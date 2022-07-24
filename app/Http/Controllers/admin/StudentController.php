<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\repositarys\SizeLogic;
use App\SizeManage;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public $SizeLogic;
    function __construct(SizeLogic $SizeLogic)
    {
        $this->SizeLogic = $SizeLogic;
    }

    public function StudentPost(Request $request){

        $request->validate([
             'name'=>'required',
             'department_id'=>'required',
             'batch_name'=>'required',
             'status'=>'required'
        ]);

        $this->SizeLogic->Store($request);
    }

    public function StudentAll(){
        
       $size=$this->SizeLogic->AllSize();
        return response()->json(['size'=>$size]);
    }

    public function StudentDelete($Id){
        
        $this->SizeLogic->Delete($Id);
    }

    public function StudentEdit($id){

        $edit = $this->SizeLogic->Edit($id);

        return response()->json(['edit'=>$edit]);
    }

    public function StudentUpdate(Request $request){

        $this->SizeLogic->Update($request);
    }

    public function DepartmentDataView(){
       $all = $this->SizeLogic->ViewData();
        return response()->json(['all'=>$all]);
    }
}
