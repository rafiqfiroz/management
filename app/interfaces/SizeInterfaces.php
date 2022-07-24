<?php

namespace App\interfaces;

use Illuminate\Http\Request;

interface SizeInterfaces
{

    public function Store(Request $request);
    public function AllSize();
    public function ViewData();
    public function Edit($id);
    public function Delete($id);
    public function Update(Request $request);
    public function MultiDelete(Request $request);
    public function MultiActive(Request $request);
    public function MultiDeactive(Request $request);
}
