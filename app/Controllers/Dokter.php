<?php

namespace App\Controllers;

use App\Models\Dokter_model;
use App\Models\Poli_model;

class Dokter extends BaseController
{
    protected $Dokter_model;

    public function __construct()
    {
        $this->Dokter_model = new Dokter_model();
    }

    public function index()
    {
        $data = [
            'judul' => 'Data Dokter',
            'dokter' => $this->Dokter_model->getDataDokter(),
        ];
        return view('dokter/data_dokter', $data);
    }
    public function detail($id_dokter)
    {

        $data = [
            'judul' => 'detail Dokter',
            'dokter' => $this->Dokter_model->getDataDokter($id_dokter),
        ];
        return view('dokter/detail_dokter', $data);
    }
    public function form_dokter()
    {
        session();
        $Poli_model = new Poli_model();
        $data = [
            'judul' => 'Input Data Dokter',
            'poli' => $Poli_model->getDataPoli(),
            'validation' => \Config\Services::validation(),
        ];
        return view('dokter/form_dokter', $data);
    }
    public function form_ubah($id_dokter)
    {
        session();
        $Poli_model = new Poli_model();
        $data = [
            'judul' => 'form Ubah',
            'dokter' => $this->Dokter_model->getDataDokter($id_dokter),
            'poli' => $Poli_model->getDataPoli(),
            'validation' => \Config\Services::validation(),
            'jenis_kelamin' => [
                'laki laki',
                'perempuan',
            ]
        ];
        return view('dokter/form_ubah', $data);
    }
    public function ubah_data($id_dokter)
    {
        //validasi input tidak kosong
        //jika tidak tervalidasi
        if (!$this->validate([
            //is_unique=sebuah rule yg mengharuskan isi dari field tidak boleh sama
            //penggunaan is_unique harus beserta nama tabel dan field yg bersangkutan
            'nama_dokter' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama dokter harus di isi',

                ]
            ],
            'spesialis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Spesialis dokter harus di isi',

                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih jenis kelamin'

                ]
            ],
            'no_hp_dokter' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No HP harus di isi '

                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'email harus diisi'

                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'alamat harus di isi'

                ]
            ],
            'ttl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat Tanggal Lahir harus di isi'

                ]
            ],


        ])) {
            //jika kondisi di atas terpenuhi maka
            // ketika redirect ke formtambah bawa inputan dan pesan validasinya(di simpan di session)
            return redirect()->to('/dokter/form_ubah/' . $id_dokter)->withInput();
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


        $this->Dokter_model->save([
            'id_dokter' => $id_dokter,
            //getVar = mengambil data dari form method apa pun(bisa berupa get ataupun post)
            //bisa juga menggunaka getPost atau getGet
            'nama_dokter' => $this->request->getVar('nama_dokter'),
            'spesialis' => $this->request->getVar('spesialis'),
            'id_poli' => $this->request->getVar('nama_poli'),
            'jenis_kelamin_dokter' => $this->request->getVar('jenis_kelamin'),
            'ttl' => $this->request->getVar('ttl'),
            'no_hp_dokter' => $this->request->getVar('no_hp_dokter'),
            'email' => $this->request->getVar('email'),
            'alamat' => $this->request->getVar('alamat'),
            'foto' => $namaFoto,


        ]);

        //sebelum redirect set FlashData dulu
        session()->setFlashdata('pesan', 'Data berhasil di UBAH');
        return redirect()->to('/dokter');
    }
    public function add_data()
    {
        //validasi input tidak kosong
        //jika tidak tervalidasi
        if (!$this->validate([
            //is_unique=sebuah rule yg mengharuskan isi dari field tidak boleh sama
            //penggunaan is_unique harus beserta nama tabel dan field yg bersangkutan
            'nama_dokter' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama dokter harus di isi',

                ]
            ],
            'spesialis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Spesialis dokter harus di isi',

                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih jenis kelamin'

                ]
            ],
            'no_hp_dokter' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No HP harus di isi '

                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'email harus diisi'

                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'alamat harus di isi'

                ]
            ],
            'ttl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat Tanggal Lahir harus di isi'

                ]
            ],


        ])) {
            //jika kondisi di atas terpenuhi maka
            // ketika redirect ke formtambah bawa inputan dan pesan validasinya(di simpan di session)
            return redirect()->to('/dokter/form_dokter')->withInput();
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
        $this->Dokter_model->save([
            'nama_dokter' => $this->request->getVar('nama_dokter'),
            'spesialis' => $this->request->getVar('spesialis'),
            'id_poli' => $this->request->getVar('nama_poli'),
            'jenis_kelamin_dokter' => $this->request->getVar('jenis_kelamin'),
            'ttl' => $this->request->getVar('ttl'),
            'no_hp_dokter' => $this->request->getVar('no_hp_dokter'),
            'email' => $this->request->getVar('email'),
            'alamat' => $this->request->getVar('alamat'),
            'foto' => $namaFoto,
        ]);
        session()->setFlashdata('pesan', 'Data berhasil di SIMPAN');
        return redirect()->to('/dokter');
    }
    public function hapus($id_dokter)
    {
        $this->Dokter_model->delete($id_dokter);
        session()->setFlashdata('pesan', 'Data berhasil di HAPUS');
        return redirect()->to('/dokter');
    }

    //--------------------------------------------------------------------

}
