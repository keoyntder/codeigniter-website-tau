<?php

namespace App\Controllers;

class DepartmentController extends BaseController
{
    public function cet() { return view('departments/cet'); }
    public function cas() { return view('departments/cas'); }
    public function caf() { return view('departments/caf'); }
    public function cbm() { return view('departments/cbm'); }
    public function cvm() { return view('departments/cvm'); }
    public function ced() { return view('departments/ced'); }
}