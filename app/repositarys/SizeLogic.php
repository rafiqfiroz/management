<?php

namespace App\repositarys;

use App\interfaces\SizeInterfaces;
use App\SizeManage;
use Illuminate\Http\Request;
use App\Facades\QuqeryB;
use App\Models\Department;
use App\Models\Student;
use Illuminate\Support\Facades\Session;
use Image;

class SizeLogic implements SizeInterfaces
{

    public function Store(Request $request)
    {

        $store = new Student();
        $this->save($store, $request);
    }

    public function Update(Request $request)
    {

        $store = Student::where('id', $request->EditId)->first();
        $this->save($store, $request);
    }

    protected function save(Student $store, Request $request)
    {

        $ModelName = $store;
        QuqeryB::Insert($ModelName, $request);
        // QuqeryB::InsertImage($ModelName,'Size',100,100,$request);
        // Session::forget('StoreId');

    }

    public function AllSize()
    {

        $size = Student::with(['Department'])->get();
        return $size;
    }

    public function ViewData()
    {

        $all = Department::get();
        return $all;
    }

    public function Edit($id)
    {

        $edit = Student::where('id', $id)->first();
        return $edit;
    }

    public function Delete($id)
    {

        $dele = Student::where('id', $id)->first();

        if ($dele) {
            @unlink('upload/Size/' . $dele->image);
            Student::where('id', $id)->delete();
        }
    }
    public function MultiDelete(Request $request)
    {
    }
    public function MultiActive(Request $request)
    {
    }
    public function MultiDeactive(Request $request)
    {
    }
}
