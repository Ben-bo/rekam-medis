<?php

namespace App\Controllers;

use App\Models\Poli_model;

class Poli extends BaseController
{
    public function index()
    {
        session();
        $Poli_model = new Poli_model();
        $data = [
            'judul' => 'Data Poli',
            'poli' => $Poli_model->getDataPoli(),
            'validation' => \Config\Services::validation(),
        ];
        return view('poli/data_poli_view', $data);
    }
    public function add_data()
    {
        $Poli_model = new Poli_model();
        //validasi input tidak kosong
        //jika tidak tervalidasi
        if (!$this->validate([
            //is_unique=sebuah rule yg mengharuskan isi dari field tidak boleh sama
            //penggunaan is_unique harus beserta nama tabel dan field yg bersangkutan
            'nama_poli' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Poli harus di isi',

                ]
            ],
            'deskripsi_poli' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Poli harus di isi'

                ]
            ],

        ])) {
            //jika kondisi di atas terpenuhi maka
            // ketika redirect ke formtambah bawa inputan dan pesan validasinya(di simpan di session)
            return redirect()->to('/poli')->withInput();
        }
        $Poli_model->save([
            'nama_poli' => $this->request->getVar('nama_poli'),
            'deskripsi_poli' => $this->request->getVar('deskripsi_poli'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil di SIMPAN');
        return redirect()->to('/poli');
    }
    public function form_ubah($id_poli)
    {
        session();
        $Poli_model = new Poli_model();
        $data = [
            'judul' => 'Form Ubah Data',
            'poli' => $Poli_model->getDataPoli(),
            'poliPersonel' => $Poli_model->getDataPoli($id_poli),
            'validation' => \Config\Services::validation(),
        ];
        return view('poli/form_ubah_poli', $data);
    }

    public function ubahData($id_poli)
    {
        $Poli_model = new Poli_model();
        //validasi input tidak kosong
        //jika tidak tervalidasi
        if (!$this->validate([
            //is_unique=sebuah rule yg mengharuskan isi dari field tidak boleh sama
            //penggunaan is_unique harus beserta nama tabel dan field yg bersangkutan
            'nama_poli' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama poli harus di isi',

                ]
            ],
            'deskripsi_poli' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi poli harus diisi'

                ]
            ],


        ])) {
            //jika kondisi di atas terpenuhi maka
            // ketika redirect ke formtambah bawa inputan dan pesan validasinya(di simpan di session)
            return redirect()->to('/poli/form_ubah/' . $id_poli)->withInput();
        }
        $Poli_model->save([
            'id_poli' => $id_poli,
            'nama_poli' => $this->request->getVar('nama_poli'),
            'deskripsi_poli' => $this->request->getVar('deskripsi_poli'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil di Ubah');
        return redirect()->to('/poli');
    }
    public function hapus($id_poli)
    {
        $Poli_model = new Poli_model();
        $Poli_model->delete($id_poli);
        session()->setFlashdata('pesan', 'Data berhasil di HAPUS');
        return redirect()->to('/obat');
    }
}
