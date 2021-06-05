<?php

namespace App\Controllers;

use App\Models\Kunjungan_model;
use App\Models\Pasien_model;
use App\Models\Poli_model;

class Kunjungan extends BaseController
{
    protected $Kunjungan_model;
    protected $Pasien_model;
    protected $Poli_model;

    public function __construct()
    {
        $this->Kunjungan_model = new Kunjungan_model();
        $this->Pasien_model = new Pasien_model();
        $this->Poli_model = new Poli_model();
    }

    public function index()
    {
        $data = [
            'judul' => 'Data Kunjungan',
            'kunjungan' => $this->Kunjungan_model->getDataKunjungan(),
        ];
        return view('kunjungan/data_view', $data);
    }
    public function form_kunjungan()
    {
        session();
        $data = [
            'judul' => 'Input Obat',
            'pasien' => $this->Pasien_model->getDataPasien(),
            'poli' => $this->Poli_model->getDataPoli(),
            'validation' => \Config\Services::validation(),
        ];
        return view('kunjungan/form_view', $data);
    }
    public function callPasien()
    {

        $id_pasien = $this->request->getPost('id');
        $data = $this->Pasien_model->getNamaPasien($id_pasien);
        echo json_encode($data);
    }
    public function callPasienPoli()
    {

        $id_pasien = $this->request->getPost('id');
        $data = $this->Kunjungan_model->getPasienPoli($id_pasien);
        echo json_encode($data);
    }
    public function form_ubah($id_kunjungan)
    {
        session();
        $data = [
            'judul' => 'Input Obat',
            'kunjungan' => $this->Kunjungan_model->getDataKunjungan($id_kunjungan),
            'poli' => $this->Poli_model->getDataPoli(),
            'pasien' => $this->Pasien_model->getDataPasien(),
            'validation' => \Config\Services::validation(),
        ];
        return view('kunjungan/form_ubah', $data);
    }
    public function add_data()
    {
        //validasi input tidak kosong
        //jika tidak tervalidasi
        if (!$this->validate([
            //is_unique=sebuah rule yg mengharuskan isi dari field tidak boleh sama
            //penggunaan is_unique harus beserta nama tabel dan field yg bersangkutan
            'no_rm' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'pilih no rekam medis',

                ]
            ],
            'poli' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'sediaan harus diisi '

                ]
            ],
            'keluhan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'dosis anak harus di isi'

                ]
            ],
        ])) {
            //jika kondisi di atas terpenuhi maka
            // ketika redirect ke formtambah bawa inputan dan pesan validasinya(di simpan di session)
            return redirect()->to('/kunjungan/form_kunjungan')->withInput();
        }
        $this->Kunjungan_model->save([
            'id_pasien' => $this->request->getVar('no_rm'),
            'nama_pasien' => $this->request->getVar('nama_pasien'),
            'id_poli' => $this->request->getVar('poli'),
            'keluhan' => $this->request->getVar('keluhan'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil di SIMPAN');
        return redirect()->to('/kunjungan');
    }
    public function ubah($id_kunjungan)
    {
        //validasi input tidak kosong
        //jika tidak tervalidasi
        if (!$this->validate([
            //is_unique=sebuah rule yg mengharuskan isi dari field tidak boleh sama
            //penggunaan is_unique harus beserta nama tabel dan field yg bersangkutan
            'no_rm' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih No rekam Medis',

                ]
            ],
            'nama_pasien' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'isi nama pasien'

                ]
            ],
            'poli' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'pilih poli'

                ]
            ],
            'keluhan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'isi keluhan'

                ]
            ],


        ])) {
            //jika kondisi di atas terpenuhi maka
            // ketika redirect ke formtambah bawa inputan dan pesan validasinya(di simpan di session)
            return redirect()->to('/kunjungan/form_ubah/' . $id_kunjungan)->withInput();
        }
        $this->Kunjungan_model->save([
            'id_kunjungan' => $id_kunjungan,
            'id_pasien' => $this->request->getVar('no_rm'),
            'nama_pasien' => $this->request->getVar('nama_pasien'),
            'id_poli' => $this->request->getVar('poli'),
            'keluhan' => $this->request->getVar('keluhan'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil di Ubah');
        return redirect()->to('/kunjungan');
    }
    public function hapus($id_kunjungan)
    {
        $this->Kunjungan_model->delete($id_kunjungan);
        session()->setFlashdata('pesan', 'Data berhasil di HAPUS');
        return redirect()->to('/kunjungan');
    }


    //--------------------------------------------------------------------

}
