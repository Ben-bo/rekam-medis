<?php

namespace App\Controllers;

use App\Models\Dokter_model;
use App\Models\Obat_model;
use App\Models\Pasien_model;
use App\Models\Poli_model;
use App\Models\Rekam_medis_model;


class Rekam_medis extends BaseController
{
    protected $Rekam_medis_model;
    protected $obatM;
    protected $pasienM;
    protected $poliM;
    protected $dokterM;
    public function __construct()
    {
        $this->Rekam_medis_model = new Rekam_medis_model();
        $this->obatM = new Obat_model();
        $this->pasienM = new Pasien_model();
        $this->poliM = new Poli_model();
        $this->dokterM = new Dokter_model();
    }
    public function index()
    {
        session();

        $data = [
            'judul' => 'Rekam-Medis',
            'rekam_medis' => $this->Rekam_medis_model->getDataRekamMedis(),
            'pasien' => $this->pasienM->getDataPasien(),
            'dokter' => $this->dokterM->getDataDokter(),
            'obat' => $this->obatM->getDataObat(),
            'poli' => $this->poliM->getDataPoli(),
            'no_rekam_medis' => $this->Rekam_medis_model->no_rekam_medis(),
            'validation' => \Config\Services::validation(),
        ];
        return view('rekam_medis/data_rekam_medis', $data);
    }
    public function callDokter()
    {
        $dokterM = new Dokter_model();
        $id_poli = $this->request->getPost('id');
        $data = $dokterM->getDataDokterFormPoli($id_poli);
        echo json_encode($data);
    }
    public function add_data()
    {
        //validasi input tidak kosong
        //validate ngambil dari name form input.
        //jika tidak tervalidasi
        if (!$this->validate([
            //is_unique=sebuah rule yg mengharuskan isi dari field tidak boleh sama
            //penggunaan is_unique harus beserta nama tabel dan field yg bersangkutan
            'nama_pasien' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Pasien',

                ]
            ],
            'keluhan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'isi keluhan',

                ]
            ],
            'anamnese/diagnosa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi Diagnosa'

                ]
            ],
            'poli' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'pilih poli'

                ]
            ],
            'nama_dokter' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Dokter'

                ]
            ],
            'nama_obat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Obat'

                ]
            ],

        ])) {
            //jika kondisi di atas terpenuhi maka
            // ketika redirect ke formtambah bawa inputan dan pesan validasinya(di simpan di session)
            return redirect()->to('/rekam_medis')->withInput();
        }

        $obat = $this->request->getVar('nama_obat');
        $no = 1;
        $queryObat = $this->Rekam_medis_model->stokObat($obat);
        $stok = $queryObat->stok;
        $stok = $stok - $no;
        $db = \Config\Database::connect();
        $db->query("UPDATE obat SET stok = '" . $stok . "' WHERE id_obat= " . $obat);

        $this->Rekam_medis_model->save([
            'no_rekam_medis' => $this->request->getVar('no_rekam_medis'),
            'id_pasien' => $this->request->getVar('nama_pasien'),
            'keluhan' => $this->request->getVar('keluhan'),
            'anamnese/diagnosa' => $this->request->getVar('anamnese/diagnosa'),
            'id_poli' => $this->request->getVar('poli'),
            'id_dokter' => $this->request->getVar('nama_dokter'),
            'id_obat' => $obat,

        ]);
        session()->setFlashdata('pesan', 'Data berhasil di SIMPAN');
        return redirect()->to('/rekam_medis');
    }

    public function hapus($id_rekam_medis)
    {
        $this->Rekam_medis_model->delete($id_rekam_medis);
        session()->setFlashdata('pesan', 'Data berhasil di HAPUS');
        return redirect()->to('/rekam_medis');
    }
    public function cetak($no_rekam_medis)
    {
        $rekam_medis = new Rekam_medis_model();
        $cetak = ['cetak' => $rekam_medis->getDataCetak($no_rekam_medis)];
        return view('rekam_medis/cetak', $cetak);
    }

    public function form_ubah($id)
    {
        session();
        $data = $this->Rekam_medis_model->idPoli($id);
        $data = $this->dokterM->getDataDokterFormPoli($data);
        $data = [
            'judul' => 'Form Ubah',
            'rekam_medis' => $this->Rekam_medis_model->getDataRekamMedis($id),
            'pasien' => $this->pasienM->getDataPasien(),
            'dokter' => $this->dokterM->getDataDokter(),
            'obat' => $this->obatM->getDataObat(),
            'poli' => $this->poliM->getDataPoli(),
            'dataRekamMedis' => $this->Rekam_medis_model->getDataRekamMedis(),
            'validation' => \Config\Services::validation(),
            'namaDokter' => $data,
        ];

        return view('rekam_medis/form_ubah', $data);
    }
    public function ubah($id)
    {
        //validasi input tidak kosong
        //validate ngambil dari name form input.
        //jika tidak tervalidasi
        if (!$this->validate([
            //is_unique=sebuah rule yg mengharuskan isi dari field tidak boleh sama
            //penggunaan is_unique harus beserta nama tabel dan field yg bersangkutan
            'nama_pasien' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Pasien',

                ]
            ],
            'keluhan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'isi keluhan',

                ]
            ],
            'anamnese/diagnosa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi Diagnosa'

                ]
            ],
            'poli' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'pilih poli'

                ]
            ],
            'nama_dokter' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Dokter'

                ]
            ],
            'nama_obat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Obat'

                ]
            ],

        ])) {
            //jika kondisi di atas terpenuhi maka
            // ketika redirect ke formtambah bawa inputan dan pesan validasinya(di simpan di session)
            return redirect()->to('/rekam_medis/form_ubah/' . $id)->withInput();
        }

        session();
        $data = $this->Rekam_medis_model->save([
            'id' => $id,
            'no_rekam_medis' => $this->request->getVar('no_rekam_medis'),
            'id_pasien' => $this->request->getVar('nama_pasien'),
            'keluhan' => $this->request->getVar('keluhan'),
            'anamnese/diagnosa' => $this->request->getVar('anamnese/diagnosa'),
            'id_poli' => $this->request->getVar('poli'),
            'id_dokter' => $this->request->getVar('nama_dokter'),
            'id_obat' => $this->request->getVar('nama_obat'),

        ]);
        if ($data) {

            session()->setFlashdata('pesan', 'Data Berhasil DIUBAH');
            return redirect()->to('/rekam_medis');
        }
        session()->setFlashdata('pesan', 'GAGAL');
        return redirect()->to('/rekam_medis/form_ubah/' . $id . '');
    }

    public function detail_rm($id, $id_pasien)
    {
        $data  = [
            'judul' => 'Catan Rekam Medis',
            'rekam_medis' => $this->Rekam_medis_model->getDataRekamMedis($id),
            'history' => $this->Rekam_medis_model->getDataRM($id_pasien),

        ];
        return view('rekam_medis/detail_rm', $data);
    }


    //--------------------------------------------------------------------

}
