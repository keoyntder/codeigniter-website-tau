<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    // Render News Management Page
    public function news()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/admin');
        }

        $db = \Config\Database::connect();
        $data['newsList'] = $db->table('news')->get()->getResultArray();

        return view('admin/news', $data);
    }

    // Create News
    public function createNews()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/admin');
        }

        $imageName = null;
        $file = $this->request->getFile('news_image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imageName = $file->getRandomName();
            $file->move(FCPATH . 'assets/Images', $imageName);
        }

        $db = \Config\Database::connect();
        $db->table('news')->insert([
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'image'   => $imageName
        ]);

        return redirect()->to('admin/news')->with('success', 'News article published successfully!');
    }

    // Update News
    public function updateNews($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/admin');
        }

        $db = \Config\Database::connect();
        $updateData = [
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content')
        ];

        $file = $this->request->getFile('news_image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imageName = $file->getRandomName();
            $file->move(FCPATH . 'assets/Images', $imageName);
            $updateData['image'] = $imageName;
        }

        $db->table('news')->where('id', $id)->update($updateData);

        return redirect()->to('admin/news')->with('success', 'Article updated successfully!');
    }

    // Delete News
    public function deleteNews($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/admin');
        }

        $db = \Config\Database::connect();
        $db->table('news')->where('id', $id)->delete();

        return redirect()->to('admin/news')->with('success', 'Article deleted!');
    }
}