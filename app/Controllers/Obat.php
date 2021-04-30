<?php

namespace App\Controllers;

use App\Models\Obat_model;

class Obat extends BaseController
{
    protected $Obat_model;

    public function __construct()
    {
        $this->Obat_model = new Obat_model();
    }

    public function index()
    {
        $data = [
            'judul' => 'Data Obat',
            'obat' => $this->Obat_model->getDataObat(),
        ];
        return view('obat/data_obat', $data);
    }
    public function form_obat()
    {
        session();
        $data = [
            'judul' => 'Input Obat',
            'validation' => \Config\Services::validation(),
        ];
        return view('obat/form_obat', $data);
    }
    public function form_ubah($id_obat)
    {
        session();
        $data = [
            'judul' => 'Input Obat',
            'obat' => $this->Obat_model->getDataObat($id_obat),
            'validation' => \Config\Services::validation(),
        ];
        return view('obat/form_ubah', $data);
    }
    public function add_data()
    {
        //validasi input tidak kosong
        //jika tidak tervalidasi
        if (!$this->validate([
            //is_unique=sebuah rule yg mengharuskan isi dari field tidak boleh sama
            //penggunaan is_unique harus beserta nama tabel dan field yg bersangkutan
            'nama_obat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Obat harus di isi',

                ]
            ],
            'jenis_obat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jenis obat harus di isi'

                ]
            ],
            'sediaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'sediaan harus diisi '

                ]
            ],
            'dosis_anak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'dosis anak harus di isi'

                ]
            ],
            'dosis_dewasa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'dosis dewasa harus diisi'

                ]
            ],
            'stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'stok harus di isi'

                ]
            ],


        ])) {
            //jika kondisi di atas terpenuhi maka
            // ketika redirect ke formtambah bawa inputan dan pesan validasinya(di simpan di session)
            return redirect()->to('/obat/form_obat')->withInput();
        }
        $this->Obat_model->save([
            'nama_obat' => $this->request->getVar('nama_obat'),
            'jenis_obat' => $this->request->getVar('jenis_obat'),
            'sediaan' => $this->request->getVar('sediaan'),
            'dosis_anak' => $this->request->getVar('dosis_anak'),
            'dosis_dewasa' => $this->request->getVar('dosis_dewasa'),
            'stok' => $this->request->getVar('stok'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil di SIMPAN');
        return redirect()->to('/obat');
    }
    public function ubah($id_obat)
    {
        //validasi input tidak kosong
        //jika tidak tervalidasi
        if (!$this->validate([
            //is_unique=sebuah rule yg mengharuskan isi dari field tidak boleh sama
            //penggunaan is_unique harus beserta nama tabel dan field yg bersangkutan
            'nama_obat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Obat harus di isi',

                ]
            ],
            'jenis_obat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jenis obat harus di isi'

                ]
            ],
            'sediaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'sediaan harus diisi'

                ]
            ],
            'dosis_anak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'dosis anak harus di isi'

                ]
            ],
            'dosis_dewasa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'dosis dewasa harus diisi'

                ]
            ],
            'stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'stok harus di isi'

                ]
            ],


        ])) {
            //jika kondisi di atas terpenuhi maka
            // ketika redirect ke formtambah bawa inputan dan pesan validasinya(di simpan di session)
            return redirect()->to('/obat/form_ubah/' . $id_obat)->withInput();
        }
        $this->Obat_model->save([
            'id_obat' => $id_obat,
            'nama_obat' => $this->request->getVar('nama_obat'),
            'jenis_obat' => $this->request->getVar('jenis_obat'),
            'sediaan' => $this->request->getVar('sediaan'),
            'dosis_anak' => $this->request->getVar('dosis_anak'),
            'dosis_dewasa' => $this->request->getVar('dosis_dewasa'),
            'stok' => $this->request->getVar('stok'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil di Ubah');
        return redirect()->to('/obat');
    }
    public function hapus($id_obat)
    {
        $this->Obat_model->delete($id_obat);
        session()->setFlashdata('pesan', 'Data berhasil di HAPUS');
        return redirect()->to('/obat');
    }


    //--------------------------------------------------------------------

}
