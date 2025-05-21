<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Register extends Controller
{
    public function index()
    {
        helper(['form']);

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'username' => 'required|min_length[3]|is_unique[users.username]',
                'email'    => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[6]',
            ];

            if (!$this->validate($rules, [
                'username' => [
                    'is_unique' => 'Username sudah digunakan.',
                    'required'  => 'Username wajib diisi.',
                    'min_length' => 'Username minimal 3 karakter.'
                ],
                'email' => [
                    'is_unique' => 'Email sudah digunakan.',
                    'required'  => 'Email wajib diisi.',
                    'valid_email' => 'Format email tidak valid.'
                ],
                'password' => [
                    'required' => 'Password wajib diisi.',
                    'min_length' => 'Password minimal 6 karakter.'
                ]
            ])) {
                return view('register/index', [
                    'validation' => $this->validator
                ]);
            }


            $userModel = new UserModel();
            $userModel->save([
                'username' => $this->request->getPost('username'),
                'email'    => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ]);

            return redirect()->to('/login')->with('success', 'Akun berhasil dibuat. Silakan login.');
        }

        return view('register/index');
    }
}