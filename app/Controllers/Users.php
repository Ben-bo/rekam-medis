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
            'validation' => \Config\Services::validation(),
        ];
        return view('users/form_users', $data);
    }
    public function add_data()
    {
        //validasi input tidak kosong
        //jika tidak tervalidasi
        if (!$this->validate([
            //is_unique=sebuah rule yg mengharuskan isi dari field tidak boleh sama
            //penggunaan is_unique harus beserta nama tabel dan field yg bersangkutan


            'hak_akses' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Hak_akses'

                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'isi Password'

                ]
            ],
            'nama_users' => [
                'rules' => 'required|is_unique[users.nama_users]',
                'errors' => [
                    'required' => 'Nama user harus di isi',
                    'is_unique' => 'Username sudah terdaftar'

                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'email harus di isi '

                ]
            ],
        ])) {
            //jika kondisi di atas terpenuhi maka
            // ketika redirect ke formtambah bawa inputan dan pesan validasinya(di simpan di session)
            return redirect()->to('/users/form_users')->withInput();
        }

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
            'nama_users' => strtolower($this->request->getVar('nama_users')),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'email' => $this->request->getVar('email'),
            'hak_akses' => $this->request->getVar('hak_akses'),

        ]);

        //sebelum redirect set FlashData dulu
        session()->setFlashdata('pesan', 'Data berhasil di SIMPAN');
        return redirect()->to('/users');
    }
    public function form_ubah($id_user)
    {
        session();
        $userM = new Users_model();
        $data = [
            'judul' => 'form Ubah',
            'user' => $userM->getDataUsers($id_user),
            'validation' => \Config\Services::validation(),
            'hak_akses' => [
                'admin',
                'rekam_medis',
                'pendaftaran',
            ]
        ];
        return view('users/form_ubah', $data);
    }

    public function update($id_user)
    {
        //validasi input tidak kosong
        //jika tidak tervalidasi
        if (!$this->validate([
            //is_unique=sebuah rule yg mengharuskan isi dari field tidak boleh sama
            //penggunaan is_unique harus beserta nama tabel dan field yg bersangkutan
            'nama_users' => [
                'rules' => 'required|is_unique[users.nama_users,id_users,' . $id_user . ']',
                'errors' => [
                    'required' => 'Nama user harus di isi',
                    'is_unique' => 'Username sudah terdaftar'

                ]
            ],
            'hak_akses' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Hak_akses'

                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'email harus di isi '

                ]
            ],



        ])) {
            //jika kondisi di atas terpenuhi maka
            // ketika redirect ke formtambah bawa inputan dan pesan validasinya(di simpan di session)
            return redirect()->to('/users/form_ubah/' . $id_user)->withInput();
        }

        //ambil gambar dari form input
        $foto  = $this->request->getFile('foto');
        $fotoDefault = $this->request->getVar('fotoLama');

        //cek gambar apakah mau ubah, atau tetap gambar lama
        //4= tidak ada file 
        if ($foto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');;
        } else {
            //pindahkan file ke folder img
            $foto->move('assets/img');
            //ambil nama file untuk di simpan dalam database
            $namaFoto = $foto->getName();
            //jika fotoLama bukan foto default hapus foto lama
            if ($fotoDefault !== 'default.jpg') {
                //hapus file gambar lama
                unlink('assets/img/' . $this->request->getVar('fotoLama'));
            }
        }
        $password = $this->request->getVar('password');
        $passwordLama = $this->request->getVar('passwordLama');
        if ($password === "") {
            $this->Users_model->save([
                'id_users' => $id_user,
                'foto' => $namaFoto,
                'nama_users' => strtolower($this->request->getVar('nama_users')),
                'password' => $passwordLama,
                'email' => $this->request->getVar('email'),
                'hak_akses' => $this->request->getVar('hak_akses'),
            ]);
        } else {
            $this->Users_model->save([
                'id_users' => $id_user,
                'foto' => $namaFoto,
                'nama_users' => strtolower($this->request->getVar('nama_users')),
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'email' => $this->request->getVar('email'),
                'hak_akses' => $this->request->getVar('hak_akses'),
            ]);
        }





        //sebelum redirect set FlashData dulu
        session()->setFlashdata('pesan', 'Data berhasil di UBAH');
        return redirect()->to('/users');
    }
}
