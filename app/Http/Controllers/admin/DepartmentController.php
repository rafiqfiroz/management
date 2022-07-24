<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\repositarys\CategoryLogic;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public $CategoryLogic;
    function __construct(CategoryLogic $CategoryLogic)
    {
        $this->CategoryLogic = $CategoryLogic;
    }

    public function DepartmentPost(Request $request)
    {

        // return $request->all();
        $request->validate([
            'name' => 'required',

            'status' => 'required'
        ]);

        $this->CategoryLogic->Store($request);
    }

    public function DepartmentUpdate(Request $request)
    {

        $this->CategoryLogic->Update($request);
    }

    public function DepartmentDelete($id)
    {

        $this->CategoryLogic->Delete($id);
    }

    public function DepartmentAll()
    {

        $category = $this->CategoryLogic->AllCategory();

        return response()->json(['category' => $category]);
    }



    public function DepartmentEdit($id)
    {

        $edit = $this->CategoryLogic->Edit($id);

        return response()->json(['edit' => $edit]);
    }
}
