<?php
namespace App\interfaces;

use Illuminate\Http\Request;

interface CategoryInterface{

    public function Store(Request $request);
    public function AllCategory();
    public function Edit($id);
    public function Delete($id);
    public function Update(Request $request);
    public function MultiDelete(Request $request);
    public function MultiActive(Request $request);
    public function MultiDeactive(Request $request);
}