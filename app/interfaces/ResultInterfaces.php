<?php

namespace App\interfaces;

use Illuminate\Http\Request;

interface ResultInterfaces
{

    public function Store(Request $request);
    public function AllResult();
    public function ViewData();
    public function Edit($id);
    public function Delete($id);
    public function Update(Request $request);
}
