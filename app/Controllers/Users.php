<?php

namespace App\Controllers;

use App\Models\Users_model;

class Users extends BaseController
{
    protected $Users_model;

    public function __construct()
    {
        $this->Users_model = new Users_model();
    }
    public function index()
    {
        $data = [
            'judul' => 'Data Pengguna',
            'users' => $this->Users_model->getDataUsers(),
            'session' => session(),
        ];
        return view('users/users_views', $data);
    }
    public function hapus($id)
    {
        $this->Users_model->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect()->to('/users');
    }
    public function form_users()
    {
        $data = [
            'judul' => 'Form User',
        ];
        return view('users/form_users', $data);
    }
    public function add_data()
    {
        //ambil gambar dari form input
        $foto  = $this->request->getFile('foto');
        //cek apakah ada file yg di upload
        //4= tidak ada file 
        if ($foto->getError() == 4) {

            $namaFoto = 'default.jpg';
        } else {
            //pindahkan file ke folder img
            $foto->move('assets/img');
            //ambil nama file untuk di simpan dalam database
            $namaFoto = $foto->getName();
        }

        //INSERT INTO table VALUE()
        $this->Users_model->save([
            //getVar = mengambil data dari form method apa pun(bisa berupa get ataupun post)
            //bisa juga menggunaka getPost atau getGet
            'foto' => $namaFoto,
            'nama_users' => $this->request->getVar('nama_users'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'email' => $this->request->getVar('email'),
            'hak_akses' => $this->request->getVar('hak_akses'),

        ]);

        //sebelum redirect set FlashData dulu
        session()->setFlashdata('pesan', 'Data berhasil di SIMPAN');
        return redirect()->to('/users');
    }
}
