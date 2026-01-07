<?php

namespace App\Controllers;

use App\Models\M_user;
use CodeIgniter\HTTP\RedirectResponse;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function aksi_login()
    {
        $email = trim($this->request->getPost('email'));
        $password = $this->request->getPost('pswd');
        $recaptcha_response = $this->request->getPost('g-recaptcha-response');
        $math_answer = $this->request->getPost('math_answer');
        $correct_answer = $this->request->getPost('correct_answer');

        $session = session();
        
        $connected = @fsockopen("www.google.com", 80);
        if ($connected) {
            fclose($connected);

            $recaptcha_secret = "6LdWfJErAAAAABHx5sgGMak8bbbHi9ulD9DVIc5d";
            $verify_url = "https://www.google.com/recaptcha/api/siteverify";
            $response = file_get_contents(
                $verify_url . "?secret=" . $recaptcha_secret . "&response=" . $recaptcha_response
            );
            $response_keys = json_decode($response, true);

            if (empty($response_keys["success"])) {
                $session->setFlashdata('error', 'Verifikasi reCAPTCHA gagal.');
                return redirect()->back()->withInput();
            }
        } else {
            if (
                $math_answer === null ||
                $correct_answer === null ||
                (int)$math_answer !== (int)$correct_answer
            ) {
                $session->setFlashdata('error', 'Verifikasi matematika salah.');
                return redirect()->back()->withInput();
            }
        }

        $M_user = new \App\Models\M_user();
        $user = $M_user->where('email', $email)->first();

        if (!$user) {
            $session->setFlashdata('error', 'Email tidak ditemukan!');
            return redirect()->back()->withInput();
        }

        if (md5($password) !== $user['password']) {
            $session->setFlashdata('error', 'Password salah!');
            return redirect()->back()->withInput();
        }

        session()->regenerate();

        $session->set([
            'id_user'        => (int) $user['id_user'],
            'email'          => $user['email'],
            'nama'           => $user['nama'],
            'role'           => $user['role'],
            'isLoggedIn'     => true,
            'last_activity' => time()
        ]);

        if ($user['role'] === 'admin') {
            return redirect()->to('home');
        } elseif ($user['role'] === 'user') {
            return redirect()->to('home/user');
        } else {
            $session->destroy();
            $session->setFlashdata('error', 'Akses ditolak.');
            return redirect()->to('login');
        }
    }

}