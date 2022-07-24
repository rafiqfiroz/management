<?php
namespace App\repositarys;

use App\interfaces\SizeInterfaces;
use App\SizeManage;
use Illuminate\Http\Request;
use App\Facades\QuqeryB;
use App\interfaces\ResultInterfaces;
use App\Models\Department;
use App\Models\Result as ModelsResult;
use App\Models\Student;
use Illuminate\Support\Facades\Session;
use Image;


Class ResultLogic implements ResultInterfaces{


    public function Store(Request $request){
        $store = new ModelsResult();
        $this->save($store, $request);
    }

    public function AllResult(){
        $size = ModelsResult::with(['Student'])->get();
        return $size;
    }
    public function ViewData(){

        $all = Student::get();
        return $all;
    }
    public function Edit($id){
        $edit = ModelsResult::where('id', $id)->first();
        return $edit;
    }
    public function Delete($id){

        $dele = ModelsResult::where('id', $id)->delete();

        
    }

    protected function save(ModelsResult $store, Request $request)
    {

        $ModelName = $store;
        QuqeryB::Insert($ModelName, $request);
        // QuqeryB::InsertImage($ModelName,'Size',100,100,$request);
        // Session::forget('StoreId');

    }

    public function Update(Request $request){
        $store = ModelsResult::where('id', $request->EditId)->first();
        $this->save($store, $request);
    }

}