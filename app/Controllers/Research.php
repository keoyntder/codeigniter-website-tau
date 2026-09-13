<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ResearchModel;

class Research extends BaseController
{
    public function index()
    {
        $researchModel = new ResearchModel();
        
        // Fetch all research items from database, ordered newest first
        $data['researchList'] = $researchModel->orderBy('id', 'DESC')->findAll();

        // Load your public research view file
        return view('research', $data); // Adjust path if located in a subfolder like 'public/research'
    }
}