<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ResearchModel;

class Research extends BaseController
{
    protected $researchModel;

    public function __construct()
    {
        $this->researchModel = new ResearchModel();
    }

    // List all research items
    public function index()
    {
        $data['research_items'] = $this->researchModel->findAll();
        return view('admin/research', $data);
    }

    // Show edit form for a specific item
    public function edit($id)
    {
        $data['item'] = $this->researchModel->find($id);

        if (!$data['item']) {
            return redirect()->to('/admin/research')->with('error', 'Research record not found.');
        }

        return view('admin/research', $data);
    }

    // Process update request
    public function update($id)
    {
        $updateData = [
            'title'         => $this->request->getPost('title'),
            'category'      => $this->request->getPost('category'),
            'description'   => $this->request->getPost('description'),
            'overlay_badge' => $this->request->getPost('overlay_badge'),
            'overlay_title' => $this->request->getPost('overlay_title'),
            'overlay_desc'  => $this->request->getPost('overlay_desc'),
        ];

        // Optional image upload handler
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/research', $newName);
            $updateData['image'] = $newName;
        }

        $this->researchModel->update($id, $updateData);

        return redirect()->to('/admin/research')->with('success', 'Research updated successfully!');
    }

    
}