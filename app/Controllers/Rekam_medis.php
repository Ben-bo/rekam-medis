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
            'obat1' => $this->obatM->getDataObat(),
            'obat2' => $this->obatM->getDataObat(),
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
        $obat = $this->request->getVar('nama_obat');
        $obat1 = $this->request->getVar('nama_obat1');
        $obat2 = $this->request->getVar('nama_obat2');

        $Obatarr = '' . $obat . ',' . $obat1 . ',' . $obat2 . '';

        //validasi input tidak kosong
        //validate ngambil dari name form input.
        //jika tidak tervalidasi

        if ($obat == "" && $obat1 == "" && $obat2 == "") {
            if (!$this->validate([
                // is_unique=sebuah rule yg mengharuskan isi dari field tidak boleh sama
                // penggunaan is_unique harus beserta nama tabel dan field yg bersangkutan
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
                'nama_obat1' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pilih Obat'

                    ]
                ],
                'nama_obat2' => [
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
        } else {
            if (!$this->validate([
                // is_unique=sebuah rule yg mengharuskan isi dari field tidak boleh sama
                // penggunaan is_unique harus beserta nama tabel dan field yg bersangkutan
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

            ])) {
                //jika kondisi di atas terpenuhi maka
                // ketika redirect ke formtambah bawa inputan dan pesan validasinya(di simpan di session)
                return redirect()->to('/rekam_medis')->withInput();
            }
        }

        $no = 1;


        if ($obat !== "" && $obat1 !== "" && $obat2 !== "") {

            $queryObat = $this->Rekam_medis_model->stokObat($obat);
            $queryObat1 = $this->Rekam_medis_model->stokObat($obat1);
            $queryObat2 = $this->Rekam_medis_model->stokObat($obat2);
            $id_obat = $this->Rekam_medis_model->idobat($obat);
            $id_obat1 = $this->Rekam_medis_model->idobat($obat1);
            $id_obat2 = $this->Rekam_medis_model->idobat($obat2);

            $stok = intval($queryObat) - $no;
            $stok1 = intval($queryObat1) - $no;
            $stok2 = intval($queryObat2) - $no;
            $db = \Config\Database::connect();
            $db->query("UPDATE obat SET stok = '" . $stok . "' WHERE id_obat= " . $id_obat);
            $db->query("UPDATE obat SET stok = '" . $stok1 . "' WHERE id_obat= " . $id_obat1);
            $db->query("UPDATE obat SET stok = '" . $stok2 . "' WHERE id_obat= " . $id_obat2);
        } else if ($obat !== "" && $obat1 !== "") {
            $queryObat = $this->Rekam_medis_model->stokObat($obat);
            $queryObat1 = $this->Rekam_medis_model->stokObat($obat1);
            $id_obat = $this->Rekam_medis_model->idobat($obat);
            $id_obat1 = $this->Rekam_medis_model->idobat($obat1);

            $stok = intval($queryObat) - $no;
            $stok1 = intval($queryObat1) - $no;
            $db = \Config\Database::connect();
            $db->query("UPDATE obat SET stok = '" . $stok . "' WHERE id_obat= " . $id_obat);
            $db->query("UPDATE obat SET stok = '" . $stok1 . "' WHERE id_obat= " . $id_obat1);
        } else if ($obat !== "") {
            $queryObat = $this->Rekam_medis_model->stokObat($obat);
            $id_obat = $this->Rekam_medis_model->idobat($obat);
            $stok = intval($queryObat) - $no;
            $db = \Config\Database::connect();
            $db->query("UPDATE obat SET stok = '" . $stok . "' WHERE id_obat= " . $id_obat);
        } else if ($obat1 !== "" && $obat2 !== "") {
            $queryObat1 = $this->Rekam_medis_model->stokObat($obat1);
            $queryObat2 = $this->Rekam_medis_model->stokObat($obat2);
            $id_obat1 = $this->Rekam_medis_model->idobat($obat1);
            $id_obat2 = $this->Rekam_medis_model->idobat($obat2);


            $stok1 = intval($queryObat1) - $no;
            $stok2 = intval($queryObat2) - $no;
            $db = \Config\Database::connect();
            $db->query("UPDATE obat SET stok = '" . $stok1 . "' WHERE id_obat= " . $id_obat1);
            $db->query("UPDATE obat SET stok = '" . $stok2 . "' WHERE id_obat= " . $id_obat2);
        } else if ($obat1 !== "") {
            $id_obat1 = $this->Rekam_medis_model->idobat($obat1);
            $queryObat1 = $this->Rekam_medis_model->stokObat($obat1);
            $stok1 = intval($queryObat1) - $no;
            $db = \Config\Database::connect();
            $db->query("UPDATE obat SET stok = '" . $stok1 . "' WHERE id_obat= " . $id_obat1);
        } else if ($obat2 !== "") {
            $id_obat2 = $this->Rekam_medis_model->idobat($obat2);
            $queryObat2 = $this->Rekam_medis_model->stokObat($obat2);
            $stok2 = intval($queryObat2) - $no;
            $db = \Config\Database::connect();
            $db->query("UPDATE obat SET stok = '" . $stok2 . "' WHERE id_obat= " . $id_obat2);
        } else if ($obat !== "" && $obat2 !== '') {
            $queryObat = $this->Rekam_medis_model->stokObat($obat);
            $queryObat2 = $this->Rekam_medis_model->stokObat($obat2);
            $id_obat = $this->Rekam_medis_model->idobat($obat);
            $id_obat2 = $this->Rekam_medis_model->idobat($obat2);

            $stok = intval($queryObat) - $no;
            $stok2 = intval($queryObat2) - $no;
            $db = \Config\Database::connect();
            $db->query("UPDATE obat SET stok = '" . $stok . "' WHERE id_obat= " . $id_obat);
            $db->query("UPDATE obat SET stok = '" . $stok2 . "' WHERE id_obat= " . $id_obat2);
        }

        $this->Rekam_medis_model->save([
            'no_rekam_medis' => $this->request->getVar('no_rekam_medis'),
            'id_pasien' => $this->request->getVar('nama_pasien'),
            'keluhan' => $this->request->getVar('keluhan'),
            'anamnese/diagnosa' => $this->request->getVar('anamnese/diagnosa'),
            'id_poli' => $this->request->getVar('poli'),
            'id_dokter' => $this->request->getVar('nama_dokter'),
            'id_obat' => $Obatarr,

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
        $obat = $this->Rekam_medis_model->namaObatRM($id);
        $obat = explode(",", $obat);

        session();
        $data = $this->Rekam_medis_model->idPoli($id);
        $data = $this->dokterM->getDataDokterFormPoli($data);
        $data = [
            'judul' => 'Form Ubah',
            'rekam_medis' => $this->Rekam_medis_model->getDataRekamMedis($id),
            'pasien' => $this->pasienM->getDataPasien(),
            'dokter' => $this->dokterM->getDataDokter(),
            'namaObatRM0' => $obat[0],
            'namaObatRM1' => $obat[1],
            'namaObatRM2' => $obat[2],

            'obat' => $this->obatM->getDataObat(),
            'obat1' => $this->obatM->getDataObat(),
            'obat2' => $this->obatM->getDataObat(),
            'poli' => $this->poliM->getDataPoli(),
            'poli' => $this->poliM->getDataPoli(),
            'dataRekamMedis' => $this->Rekam_medis_model->getDataRekamMedis(),
            'validation' => \Config\Services::validation(),
            'namaDokter' => $data,
        ];

        return view('rekam_medis/form_ubah', $data);
    }
    public function ubah($id)
    {
        $obat = $this->request->getVar('nama_obat');
        $obat1 = $this->request->getVar('nama_obat1');
        $obat2 = $this->request->getVar('nama_obat2');

        $Obatarr = '' . $obat . ',' . $obat1 . ',' . $obat2 . '';

        //validasi input tidak kosong
        //validate ngambil dari name form input.
        //jika tidak tervalidasi

        if ($obat == "" && $obat1 == "" && $obat2 == "") {
            if (!$this->validate([
                // is_unique=sebuah rule yg mengharuskan isi dari field tidak boleh sama
                // penggunaan is_unique harus beserta nama tabel dan field yg bersangkutan
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
                'nama_obat1' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pilih Obat'

                    ]
                ],
                'nama_obat2' => [
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
        } else {
            if (!$this->validate([
                // is_unique=sebuah rule yg mengharuskan isi dari field tidak boleh sama
                // penggunaan is_unique harus beserta nama tabel dan field yg bersangkutan
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

            ])) {
                //jika kondisi di atas terpenuhi maka
                // ketika redirect ke formtambah bawa inputan dan pesan validasinya(di simpan di session)
                return redirect()->to('/rekam_medis')->withInput();
            }
        }

        $db = \Config\Database::connect();
        $no = 1;
        $obatLama = $this->request->getVar('obatLama');
        $obatLama1 = $this->request->getVar('obatLama1');
        $obatLama2 = $this->request->getVar('obatLama2');



        $queryObat = $this->Rekam_medis_model->stokObat($obat);
        $queryObat1 = $this->Rekam_medis_model->stokObat($obat1);
        $queryObat2 = $this->Rekam_medis_model->stokObat($obat2);







        if ($obat !== $obatLama && $obat1 !== $obatLama1 && $obat2 !== $obatLama2) {
            if ($obatLama !== "" && $obatLama1 !== "" && $obatLama2 !== "") {
                $id_obat = $this->Rekam_medis_model->idobat($obat);
                $id_obat1 = $this->Rekam_medis_model->idobat($obat1);
                $id_obat2 = $this->Rekam_medis_model->idobat($obat2);

                $id_obatLama = $this->Rekam_medis_model->idobat($obatLama);
                $id_obatLama1 = $this->Rekam_medis_model->idobat($obatLama1);
                $id_obatLama2 = $this->Rekam_medis_model->idobat($obatLama2);

                $queryObatLama = $this->Rekam_medis_model->stokObat($obatLama);
                $queryObatLama1 = $this->Rekam_medis_model->stokObat($obatLama1);
                $queryObatLama2 = $this->Rekam_medis_model->stokObat($obatLama2);

                $stokLama = intval($queryObatLama) + $no;
                $stokLama1 = intval($queryObatLama1) + $no;
                $stokLama2 = intval($queryObatLama2) + $no;
                $db->query("UPDATE obat SET stok = '" . $stokLama . "' WHERE id_obat= " . $id_obatLama);
                $db->query("UPDATE obat SET stok = '" . $stokLama1 . "' WHERE id_obat= " . $id_obatLama1);
                $db->query("UPDATE obat SET stok = '" . $stokLama2 . "' WHERE id_obat= " . $id_obatLama2);

                $stok = intval($queryObat) - $no;
                $stok1 = intval($queryObat1) - $no;
                $stok2 = intval($queryObat2) - $no;
                $db->query("UPDATE obat SET stok = '" . $stok . "' WHERE id_obat= " . $id_obat);
                $db->query("UPDATE obat SET stok = '" . $stok1 . "' WHERE id_obat= " . $id_obat1);
                $db->query("UPDATE obat SET stok = '" . $stok2 . "' WHERE id_obat= " . $id_obat2);
            } else {
                $id_obat = $this->Rekam_medis_model->idobat($obat);
                $id_obat1 = $this->Rekam_medis_model->idobat($obat1);
                $id_obat2 = $this->Rekam_medis_model->idobat($obat2);

                $id_obatLama = $this->Rekam_medis_model->idobat($obatLama);
                $id_obatLama1 = $this->Rekam_medis_model->idobat($obatLama1);
                $id_obatLama2 = $this->Rekam_medis_model->idobat($obatLama2);
                $stok = intval($queryObat) - $no;
                $stok1 = intval($queryObat1) - $no;
                $stok2 = intval($queryObat2) - $no;
                $db->query("UPDATE obat SET stok = '" . $stok . "' WHERE id_obat= " . $id_obat);
                $db->query("UPDATE obat SET stok = '" . $stok1 . "' WHERE id_obat= " . $id_obat1);
                $db->query("UPDATE obat SET stok = '" . $stok2 . "' WHERE id_obat= " . $id_obat2);
            }
        } else if ($obat1 !== $obatLama1) {
            if ($obatLama1 !== "") {

                $id_obat1 = $this->Rekam_medis_model->idobat($obat1);



                $id_obatLama1 = $this->Rekam_medis_model->idobat($obatLama1);


                $queryObatLama1 = $this->Rekam_medis_model->stokObat($obatLama1);
                $stokLama1 = intval($queryObatLama1) + $no;
                $db->query("UPDATE obat SET stok = '" . $stokLama1 . "' WHERE id_obat= " . $id_obatLama1);

                $stok1 = intval($queryObat1) - $no;
                $db->query("UPDATE obat SET stok = '" . $stok1 . "' WHERE id_obat= " . $id_obat1);
            } else {

                $id_obat1 = $this->Rekam_medis_model->idobat($obat1);


                $stok1 = intval($queryObat1) - $no;
                $db->query("UPDATE obat SET stok = '" . $stok1 . "' WHERE id_obat= " . $id_obat1);
            }
        } else if ($obat2 !== $obatLama2) {
            if ($obatLama2 !== "") {

                $id_obat2 = $this->Rekam_medis_model->idobat($obat2);


                $id_obatLama2 = $this->Rekam_medis_model->idobat($obatLama2);

                $queryObatLama2 = $this->Rekam_medis_model->stokObat($obatLama2);
                $stokLama2 = intval($queryObatLama2) + $no;
                $db->query("UPDATE obat SET stok = '" . $stokLama2 . "' WHERE id_obat= " . $id_obatLama2);

                $stok2 = intval($queryObat2) - $no;
                $db->query("UPDATE obat SET stok = '" . $stok2 . "' WHERE id_obat= " . $id_obat2);
            } else {

                $id_obat2 = $this->Rekam_medis_model->idobat($obat2);

                $stok2 = intval($queryObat2) - $no;
                $db->query("UPDATE obat SET stok = '" . $stok2 . "' WHERE id_obat= " . $id_obat2);
            }
        } else if ($obat !== $obatLama) {
            if ($obatLama !== "") {

                $id_obat = $this->Rekam_medis_model->idobat($obat);


                $id_obatLama = $this->Rekam_medis_model->idobat($obatLama);


                $queryObatLama = $this->Rekam_medis_model->stokObat($obatLama);

                $stokLama = intval($queryObatLama) + $no;
                $db->query("UPDATE obat SET stok = '" . $stokLama . "' WHERE id_obat= " . $id_obatLama);

                $stok = intval($queryObat) - $no;
                $db->query("UPDATE obat SET stok = '" . $stok . "' WHERE id_obat= " . $id_obat);
            } else {
                $id_obat = $this->Rekam_medis_model->idobat($obat);
                $stok = intval($queryObat) - $no;
                $db->query("UPDATE obat SET stok = '" . $stok . "' WHERE id_obat= " . $id_obat);
            }
        } else if ($obat !== $obatLama && $obat1 !== $obatLama1) {
            if ($obatLama !== "" && $obatLama1 !== "") {

                $id_obat = $this->Rekam_medis_model->idobat($obat);
                $id_obat1 = $this->Rekam_medis_model->idobat($obat1);


                $id_obatLama = $this->Rekam_medis_model->idobat($obatLama);
                $id_obatLama1 = $this->Rekam_medis_model->idobat($obatLama1);

                $queryObatLama = $this->Rekam_medis_model->stokObat($obatLama);
                $queryObatLama1 = $this->Rekam_medis_model->stokObat($obatLama1);

                $stokLama = intval($queryObatLama) + $no;
                $stokLama1 = intval($queryObatLama1) + $no;

                $db->query("UPDATE obat SET stok = '" . $stokLama . "' WHERE id_obat= " . $id_obatLama);
                $db->query("UPDATE obat SET stok = '" . $stokLama1 . "' WHERE id_obat= " . $id_obatLama1);


                $stok = intval($queryObat) - $no;
                $stok1 = intval($queryObat1) - $no;

                $db->query("UPDATE obat SET stok = '" . $stok . "' WHERE id_obat= " . $id_obat);
                $db->query("UPDATE obat SET stok = '" . $stok1 . "' WHERE id_obat= " . $id_obat1);
            } else {

                $id_obat = $this->Rekam_medis_model->idobat($obat);
                $id_obat1 = $this->Rekam_medis_model->idobat($obat1);


                $stok = intval($queryObat) - $no;
                $stok1 = intval($queryObat1) - $no;
                $db->query("UPDATE obat SET stok = '" . $stok . "' WHERE id_obat= " . $id_obat);
                $db->query("UPDATE obat SET stok = '" . $stok1 . "' WHERE id_obat= " . $id_obat1);
            }
        } else if ($obat !== $obatLama && $obat2 !== $obatLama2) {
            if ($obatLama !== "" && $obatLama2 !== "") {
                $id_obat = $this->Rekam_medis_model->idobat($obat);

                $id_obat2 = $this->Rekam_medis_model->idobat($obat2);

                $id_obatLama = $this->Rekam_medis_model->idobat($obatLama);

                $id_obatLama2 = $this->Rekam_medis_model->idobat($obatLama2);
                $queryObatLama = $this->Rekam_medis_model->stokObat($obatLama);

                $queryObatLama2 = $this->Rekam_medis_model->stokObat($obatLama2);
                $stokLama = intval($queryObatLama) + $no;

                $stokLama2 = intval($queryObatLama2) + $no;
                $db->query("UPDATE obat SET stok = '" . $stokLama . "' WHERE id_obat= " . $id_obatLama);

                $db->query("UPDATE obat SET stok = '" . $stokLama2 . "' WHERE id_obat= " . $id_obatLama2);

                $stok = intval($queryObat) - $no;

                $stok2 = intval($queryObat2) - $no;
                $db->query("UPDATE obat SET stok = '" . $stok . "' WHERE id_obat= " . $id_obat);

                $db->query("UPDATE obat SET stok = '" . $stok2 . "' WHERE id_obat= " . $id_obat2);
            } else {

                $id_obat = $this->Rekam_medis_model->idobat($obat);

                $id_obat2 = $this->Rekam_medis_model->idobat($obat2);

                $stok = intval($queryObat) - $no;

                $stok2 = intval($queryObat2) - $no;
                $db->query("UPDATE obat SET stok = '" . $stok . "' WHERE id_obat= " . $id_obat);

                $db->query("UPDATE obat SET stok = '" . $stok2 . "' WHERE id_obat= " . $id_obat2);
            }
        } else if ($obat1 !== $obatLama1 && $obat2 !== $obatLama2) {
            if (!$obatLama1 && !$obatLama2) {
                $id_obat1 = $this->Rekam_medis_model->idobat($obat1);
                $id_obat2 = $this->Rekam_medis_model->idobat($obat2);

                $id_obatLama1 = $this->Rekam_medis_model->idobat($obatLama1);
                $id_obatLama2 = $this->Rekam_medis_model->idobat($obatLama2);

                $queryObatLama1 = $this->Rekam_medis_model->stokObat($obatLama1);
                $queryObatLama2 = $this->Rekam_medis_model->stokObat($obatLama2);
                $stokLama1 = intval($queryObatLama1) + $no;
                $stokLama2 = intval($queryObatLama2) + $no;

                $db->query("UPDATE obat SET stok = '" . $stokLama1 . "' WHERE id_obat= " . $id_obatLama1);
                $db->query("UPDATE obat SET stok = '" . $stokLama2 . "' WHERE id_obat= " . $id_obatLama2);


                $stok1 = intval($queryObat1) - $no;
                $stok2 = intval($queryObat2) - $no;

                $db->query("UPDATE obat SET stok = '" . $stok1 . "' WHERE id_obat= " . $id_obat1);
                $db->query("UPDATE obat SET stok = '" . $stok2 . "' WHERE id_obat= " . $id_obat2);
            } else {

                $id_obat1 = $this->Rekam_medis_model->idobat($obat1);
                $id_obat2 = $this->Rekam_medis_model->idobat($obat2);

                $stok1 = intval($queryObat1) - $no;
                $stok2 = intval($queryObat2) - $no;

                dd($stok2);

                $db->query("UPDATE obat SET stok = '" . $stok1 . "' WHERE id_obat= " . $id_obat1);
                $db->query("UPDATE obat SET stok = '" . $stok2 . "' WHERE id_obat= " . $id_obat2);
            }
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
            'id_obat' => $Obatarr

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
