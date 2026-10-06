<?php

namespace App\Controllers;

class President extends BaseController
{
    public function index()
    {
        return view('president');
    }

    // Planning and Development  →  app/Views/planning_development.php
    // (replaces the old under_pres.php view)
    public function planningDevelopment()
    {
        return view('planning_development');
    }

    // Office of External Linkages and International Affairs  →  app/Views/elia.php
    public function elia()
    {
        return view('elia');
    }
}