<?php

namespace App\Controllers;

use App\Models\Users_model;

class Login extends BaseController
{
    public function index()
    {
        helper(['form']);
        $data = [
            'judul' => 'Login',

        ];
        return view('login/login_views', $data);
    }

    public function login()
    {
        $session = session();
        $model = new Users_model();
        $nama_users = strtolower($this->request->getVar('nama_users'));
        $password = $this->request->getVar('password');
        $data = $model->where('nama_users', $nama_users)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id_users'      => $data['id_users'],
                    'foto'          => $data['foto'],
                    'nama_users'    => $data['nama_users'],
                    'hak_akses'     => $data['hak_akses'],
                    'email'         => $data['email'],
                    'logged_in'     => TRUE,
                ];
                $session->set($ses_data);
                return redirect()->to('/');
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'User not Found');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

    //--------------------------------------------------------------------

}
