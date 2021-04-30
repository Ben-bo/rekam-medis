<?php

namespace App\Controllers;

use App\Models\Pasien_model;
use App\Models\Rekam_medis_model;

class Pasien extends BaseController
{
    protected $Pasien_model;

    public function __construct()
    {
        $this->Pasien_model = new Pasien_model();
    }

    public function index()
    {
        session();
        $data = [
            'judul' => 'Data Pasien',
            'pasien' => $this->Pasien_model->getDataPasien(),
        ];
        return view('pasien/data_pasien', $data);
    }
    public function detail($id_pasien)
    {

        $data = [
            'judul' => 'detail Pasien',
            'pasien' => $this->Pasien_model->getDataPasien($id_pasien),
        ];
        return view('pasien/detail_pasien', $data);
    }
    public function form_pasien()
    {
        session();
        $data = [
            'judul' => 'Pendaftaran Pasien',
            'validation' => \Config\Services::validation(),

        ];
        return view('pasien/form_pasien', $data);
    }
    public function add_data()
    {
        //validasi input tidak kosong
        //jika tidak tervalidasi
        if (!$this->validate([
            //is_unique=sebuah rule yg mengharuskan isi dari field tidak boleh sama
            //penggunaan is_unique harus beserta nama tabel dan field yg bersangkutan
            'nama_pasien' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Pasien harus di isi',

                ]
            ],
            'no_ktp' => [
                'rules' => 'required|is_unique[pasien.no_ktp]',
                'errors' => [
                    'required' => 'NO. KTP harus di isi',
                    'is_unique' => 'NO. KTP sudah ada'

                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih jenis kelamin'

                ]
            ],
            'agama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih {field}'

                ]
            ],
            'pendidikan_terakhir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih {field}'

                ]
            ],
            'status_perkawinan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih {field}'

                ]
            ],
            'ttl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat Tanggal Lahir harus di isi'

                ]
            ],
            'pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Lahir harus di isi'

                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' {field} harus di isi'

                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'

                ]
            ],
            'kota/kabupaten' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'

                ]
            ],
            'desa/kelurahan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'

                ]
            ],

        ])) {
            //jika kondisi di atas terpenuhi maka
            // ketika redirect ke formtambah bawa inputan dan pesan validasinya(di simpan di session)
            return redirect()->to('/pasien/form_pasien')->withInput();
        }
        $this->Pasien_model->save([
            'nama_pasien' => $this->request->getVar('nama_pasien'),
            'no_ktp' => $this->request->getVar('no_ktp'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'agama' => $this->request->getVar('agama'),
            'pendidikan_terakhir' => $this->request->getVar('pendidikan_terakhir'),
            'status_perkawinan' => $this->request->getVar('status_perkawinan'),
            'ttl' => $this->request->getVar('ttl'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'alamat' => $this->request->getVar('alamat'),
            'no_hp' => $this->request->getVar('no_hp'),
            'kota/kabupaten' => $this->request->getVar('kota/kabupaten'),
            'desa/kelurahan' => $this->request->getVar('desa/kelurahan'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil di SIMPAN');
        return redirect()->to('/pasien');
    }
    public function form_ubah($id_pasien)
    {
        session();
        $data = [
            'judul' => 'form Ubah',
            'pasien' => $this->Pasien_model->getDataPasien($id_pasien),
            'validation' => \Config\Services::validation(),
            'status_perkawinan' => [
                'Sudah Menikah',
                'Belum Menikah'
            ],
            'jenis_kelamin' => [
                'laki laki',
                'perempuan',
            ],
            'agama' => [
                'Islam',
                'Hindu',
                'Budha',
                'Kristen',
                'Khatolik',
            ],
            'pendidikan_terakhir' => [
                'SD',
                'SMP/MTs',
                'SMA/SMK/MA',
                'S1/Sarjana',
                'S2/Megister',
                'S3/Doktor',
            ],
        ];
        return view('pasien/form_ubah', $data);
    }
    public function ubah_data($id_pasien)
    {
        //validasi input tidak kosong
        //jika tidak tervalidasi
        if (!$this->validate([
            //is_unique=sebuah rule yg mengharuskan isi dari field tidak boleh sama
            //penggunaan is_unique harus beserta nama tabel dan field yg bersangkutan
            'nama_pasien' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Pasien harus di isi',

                ]
            ],
            'no_ktp' => [
                'rules' => 'required|is_unique[pasien.no_ktp,id_pasien,' . $id_pasien . ']',
                'errors' => [
                    'required' => 'NO. KTP harus di isi',
                    'is_unique' => 'NO. KTP sudah ada'

                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih jenis kelamin'

                ]
            ],
            'agama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih {field}'

                ]
            ],
            'pendidikan_terakhir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih {field}'

                ]
            ],
            'status_perkawinan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih {field}'

                ]
            ],
            'ttl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat Tanggal Lahir harus di isi'

                ]
            ],
            'pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Lahir harus di isi'

                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' {field} harus di isi'

                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'

                ]
            ],
            'kota/kabupaten' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'

                ]
            ],
            'desa/kelurahan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'

                ]
            ],

        ])) {
            //jika kondisi di atas terpenuhi maka
            // ketika redirect ke formtambah bawa inputan dan pesan validasinya(di simpan di session)
            return redirect()->to('/pasien/form_ubah/' . $id_pasien)->withInput();
        }
        $this->Pasien_model->save([
            'id_pasien' => $id_pasien,
            //getVar = mengambil data dari form method apa pun(bisa berupa get ataupun post)
            //bisa juga menggunaka getPost atau getGet
            'nama_pasien' => $this->request->getVar('nama_pasien'),
            'no_ktp' => $this->request->getVar('no_ktp'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'agama' => $this->request->getVar('agama'),
            'pendidikan_terakhir' => $this->request->getVar('pendidikan_terakhir'),
            'status_perkawinan' => $this->request->getVar('status_perkawinan'),
            'ttl' => $this->request->getVar('ttl'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'alamat' => $this->request->getVar('alamat'),
            'no_hp' => $this->request->getVar('no_hp'),
            'kota/kabupaten' => $this->request->getVar('kota/kabupaten'),
            'desa/kelurahan' => $this->request->getVar('desa/kelurahan'),

        ]);

        //sebelum redirect set FlashData dulu
        session()->setFlashdata('pesan', 'Data berhasil di Ubah');
        return redirect()->to('/pasien');
    }
    public function hapus($id_pasien)
    {
        $this->Pasien_model->delete($id_pasien);
        session()->setFlashdata('pesan', 'Data berhasil di HAPUS');
        return redirect()->to('/pasien');
    }
    public function cetakKartu($id_pasien)
    {
        $pasienModel = new Pasien_model();

        $umur = $pasienModel->umur($id_pasien);
        $tanggalLahir = $pasienModel->tanggalLahir($id_pasien);
        $no_rekam_medis = new Rekam_medis_model();
        $data = [
            'judul' => 'Kartu Berobat',
            'pasien' => $pasienModel->getDataPasien($id_pasien),
            'no_rekam_medis' => $no_rekam_medis->no_rekam_medis(),
            'umur' => $umur,
            'tanggalLahir' => $tanggalLahir,
        ];
        return view('kartuBerobat/cetakKartu', $data);
    }

    //--------------------------------------------------------------------

}
