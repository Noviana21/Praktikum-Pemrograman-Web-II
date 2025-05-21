<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{
    public function index()
    {
        // req dari form login
        if($this->request->getMethod() === 'POST') {
            $rules = [
                'username' => 'required',
                'password' => 'required',
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            // Cek user di database perpustakaan
            $userModel = new \App\Models\UserModel();
            $user = $userModel->where('username', $username)->first();

            if ($user && password_verify($password, $user->password)) {
                session()->set([
                    'username' => $user->username,
                    'email' => $user->email,
                    'login' => true,
                ]);
                $redirectUrl = session()->get('redirect_url') ?? '/';
                session()->remove('redirect_url');
                return redirect()->to($redirectUrl)->with('success', 'Login berhasil.');
            }

            session()->setFlashdata('error', 'Username atau password salah.');
            return redirect()->back();
        }
        return view('login/index');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/')->with('success', 'Anda telah berhasil logout.');
    }
}