<?php
namespace App\repositarys;

use App\CategoryManage;
use App\Models\Department;
use App\interfaces\CategoryInterface;
use Illuminate\Http\Request;
use App\Facades\QuqeryB;
use Illuminate\Support\Facades\Session;
use Image;
Class CategoryLogic implements CategoryInterface{

    public function Store(Request $request){
         
          $store = new Department();
          $this->save($store,$request);
    }
    public function Update(Request $request){

    
        $store = Department::where('id',$request->EditId)->first();
        $this->save($store,$request);
    }

    protected function save(Department $store,Request $request){

        $ModelName = $store;
        QuqeryB::Insert($ModelName,$request);
        // QuqeryB::InsertImage($ModelName,'Category',100,100,$request);
        // Session::forget('StoreId');

    }

    public function AllCategory(){

        $category = Department::get();
        return $category;
    }

    public function Edit($id){

        $edit = Department::where('id',$id)->first();
        return $edit;
    }

    public function Delete($id){
        $ModelFind = Department::where('id',$id)->first();
        if($ModelFind){
            @unlink('upload/Category/'.$ModelFind->image);
            Department::where('id',$id)->delete();
        }

        return $ModelFind;
    }

    public function MultiDelete(Request $request){
       
        $ModelName = Department::whereIn('id',$request->data)->get();
        QuqeryB::MultiDelete($ModelName,'Category');
        
    }   
    
    public function MultiActive(Request $request){
       
        $ModelName = Department::whereIn('id',$request->data)->get();
        QuqeryB::MultiActive($ModelName);
       

    }

    public function MultiDeactive(Request $request){

        $ModelName = Department::whereIn('id',$request->data)->get();
        QuqeryB::MultiDeactive($ModelName);
       
    }
   
}