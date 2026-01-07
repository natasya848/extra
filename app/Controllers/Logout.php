<?php

namespace App\Controllers;

class Logout extends BaseController
{
    public function index()
    {
        session()->destroy();

        // Jika request AJAX, return JSON
        if ($this->request->isAJAX()) {
            return $this->response->setJSON(['status' => 'logged_out']);
        }

        return redirect()->to('login');
    }
}
