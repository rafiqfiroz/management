<?php
namespace App\Services;
use Illuminate\Support\Facades\Session;
use Image;
Class InsertQuery{

    public function Insert($ModelName,$request){
        $tmpArray = array_keys($request->input());
        $array_new = array_diff($tmpArray, array("EditId"));

        // $string =  array_shift($tmpArray);
        foreach (@$array_new as $key=>$tmp){
                $store = $ModelName;
                $store->$tmp = $request->$tmp;
                $store->save();
                Session::put('StoreId',$store->id);
        }
    }

    public function InsertImage($ModelName,$path,$width,$height,$request){

        $update= $ModelName::where('id',\Illuminate\Support\Facades\Session::get('StoreId'))->first();

        $len = strlen($request->image);
        if($len>100){
            $exp = explode(';',$request->image);
            $exp1 = explode('/',$exp[0]);
            $fullName = time().'.'.$exp1[1];
            @unlink('upload/'.$path.'/'.$update->image);
            Image::make($request->image)->resize($width,$height)->save('upload/'.$path.'/'.$fullName);
             $update->image = $fullName;
            $update->save();
        }else{

            $update->image = $request->image;
            $update->save();
        }
    
        \Illuminate\Support\Facades\Session::forget('StoreId');

    }

    public function MultiDelete($ModelName,$path=null){

        foreach($ModelName as $key=>$mult_data){
            @unlink('upload/'.$path.'/'.$mult_data->image);
            $mult_data->delete();
        }

       
    }

    public function MultiActive($ModelName){

        foreach($ModelName as $key=>$mult_data){
            $mult_data->status = 1;
            $mult_data->save();
        }
    }

    public function MultiDeactive($ModelName){
        foreach($ModelName as $key=>$mult_data){
            $mult_data->status = 0;
            $mult_data->save();
        }
    }

 
    
}