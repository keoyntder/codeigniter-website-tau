<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }
        return view('admin/login'); 
    }

    public function authenticate()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

      
        if ($email === 'admin@tau.edu.ph' && $password === 'admin123') {
            session()->set([
                'admin_name' => 'TAU Admin',
                'logged_in'  => true
            ]);

            return redirect()->to('/dashboard');
        }

        return redirect()->to('/admin')->with('error', 'Invalid Email or Password');
    }

    public function dashboard()
    {
        
        if (!session()->get('logged_in')) {
            return redirect()->to('/admin');
        }

        return view('admin/dashboard'); 
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin');
    }
}