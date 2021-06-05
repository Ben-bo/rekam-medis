<?php

namespace App\Controllers;

use App\Models\Obat_model;
use App\Models\Rekam_medis_model;
use App\Models\Resep_model;

class Resep extends BaseController
{
    protected $resepM;
    protected $rmM;
    protected $obatM;
    function __construct()
    {
        $this->resepM = new Resep_model();
        $this->obatM = new Obat_model();
        $this->rmM = new Rekam_medis_model();
    }
    public function index()
    {

        $data = [
            'judul' => 'Resep',
            'resep' => $this->resepM->getDataResep(),
        ];
        return view('resep/data_view', $data);
    }
    public function resep($id_rm)
    {
        session();

        $data = [
            'judul' => 'Resep',
            'rekam_medis' => $this->rmM->getDataRekamMedis($id_rm),
            'validation' => \Config\Services::validation(),


        ];
        return view('resep/form_view', $data);
    }
    public function form_ubah($id_resep)
    {
        session();
        $data = [
            'judul' => 'ubah',
            'resep' => $this->resepM->getDataResep($id_resep),
            'validation' => \Config\Services::validation(),
        ];
        return view('resep/form_ubah', $data);
    }
    public function add_data($id)
    {

        //validasi input tidak kosong
        //jika tidak tervalidasi
        if (!$this->validate([
            //is_unique=sebuah rule yg mengharuskan isi dari field tidak boleh sama
            //penggunaan is_unique harus beserta nama tabel dan field yg bersangkutan
            'resep' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'resep harus diisi'

                ]
            ],



        ])) {
            //jika kondisi di atas terpenuhi maka
            // ketika redirect ke formtambah bawa inputan dan pesan validasinya(di simpan di session)
            return redirect()->to('/resep/resep/' . $id . '')->withInput();
        }
        $this->resepM->save([
            'no_rekam_medis' => $this->request->getVar('no_rekam_medis'),
            'nama_pasien' => $this->request->getVar('pasien'),
            'dokter' => $this->request->getVar('dokter'),
            'obat' => $this->request->getVar('obat'),
            'diagnosa' => $this->request->getVar('diagnosa'),
            'resep' => $this->request->getVar('resep'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil di SIMPAN');
        return redirect()->to('/resep');
    }
    public function ubah($id_resep)
    {
        $this->resepM->save([
            'id_resep' => $id_resep,
            'no_rekam_medis' => $this->request->getVar('no_rekam_medis'),
            'nama_pasien' => $this->request->getVar('pasien'),
            'dokter' => $this->request->getVar('dokter'),
            'obat' => $this->request->getVar('obat'),
            'diagnosa' => $this->request->getVar('diagnosa'),
            'resep' => $this->request->getVar('resep'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil di Ubah');
        return redirect()->to('/resep');
    }
    public function hapus($id_resep)
    {
        $this->resepM->delete($id_resep);
        session()->setFlashdata('pesan', 'Data berhasil di HAPUS');
        return redirect()->to('/resep');
    }
    public function buatResep()
    {
        session()->setFlashdata('pesanResep', 'Pilih salah satu rekam medis pasien, Kemuidan klik detail.!');
        return redirect()->to('/rekam_medis');
    }
    public function resepDetail($id, $id_pasien)
    {
        session()->setFlashdata('pesanResep', 'Klik tombol Buat Resep');
        return redirect()->to('/rekam_medis/detail_rm/' . $id . '/' . $id_pasien . '');
    }
    public function cetak($id_resep)
    {
        $data = [
            'cetak' => $this->resepM->getDataResep($id_resep)
        ];
        return view('resep/cetak', $data);
    }


    //--------------------------------------------------------------------

}
