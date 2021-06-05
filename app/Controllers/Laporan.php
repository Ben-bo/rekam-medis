<?php

namespace App\Controllers;

use App\Models\Dokter_model;
use App\Models\Kunjungan_model;
use App\Models\Obat_model;
use App\Models\Pasien_model;
use App\Models\Poli_model;
use App\Models\Rekam_medis_model;
use App\Models\Resep_model;
use DateTime;

class Laporan extends BaseController
{
    protected $pasienM;
    protected $dokterM;
    protected $rekamM;
    protected $obatM;
    protected $poliM;
    protected $resepM;
    function __construct()
    {
        $this->pasienM = new Pasien_model();
        $this->dokterM = new Dokter_model();
        $this->rekamM = new Rekam_medis_model();
        $this->obatM = new Obat_model();
        $this->poliM = new Poli_model();
        $this->resepM = new Resep_model();
    }
    public function index($bulan = false, $tahun = false)
    {
        $data = [
            'judul' => 'Laporan',
            'pasien' => $this->pasienM->getDataPasien(),
            'dokter' => $this->dokterM->getDataDokter(),
            'obat' => $this->obatM->getDataObat(),
            'poli' => $this->poliM->getDataPoli(),
            'resep' => $this->resepM->getDataResep(),
            'rekam_medis' => $this->rekamM->getDataRekamMedis(),
            'pasienTotal' => $this->pasienM->countAllResults(),
            'dokterTotal' => $this->dokterM->countAllResults(),
            'rekam_medisTotal' => $this->rekamM->countAllResults(),
            'obatTotal' => $this->obatM->countAllResults(),
            'poliTotal' => $this->poliM->countAllResults(),
            'resepTotal' => $this->resepM->countAllResults(),
            'bulan' => $bulan,
            'tahun' => $tahun,

        ];
        return view('laporan/laporan_views', $data);
    }

    public function filterData()
    {
        $model = new Rekam_medis_model();
        $tanggal = $this->request->getVar('tanggal');
        $tahun =  date_format(new DateTime($tanggal), "Y");
        $bulan = date_format(new DateTime($tanggal), "m");
        $pasien = $model->filterPasien($bulan, $tahun);
        $dokter = $model->filterDokter($bulan, $tahun);
        $obat = $model->filterObat($bulan, $tahun);
        $poli = $model->filterPoli($bulan, $tahun);
        $resep = $model->filterResep($bulan, $tahun);
        $rekam_medis = $model->filterRekamMedis($bulan, $tahun);
        $data = [
            'judul' => 'Laporan',
            'pasien' => $pasien,
            'dokter' => $dokter,
            'obat' => $obat,
            'resep' => $resep,
            'poli' => $poli,
            'rekam_medis' => $rekam_medis,
            'pasienTotal' => $model->totalPasien($bulan, $tahun),
            'dokterTotal' => $model->totalDokter($bulan, $tahun),
            'obatTotal' => $model->totalObat($bulan, $tahun),
            'rekam_medisTotal' => $model->totalRM($bulan, $tahun),
            'poliTotal' => $model->totalPoli($bulan, $tahun),
            'resepTotal' => $model->totalResep($bulan, $tahun),
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];
        return view('laporan/laporan_views', $data);
    }

    public function cetakData($bulan = false, $tahun = false)
    {
        $tanggal = new DateTime('today');
        $model = new Rekam_medis_model();
        if ($bulan && $tahun == true) {

            $pasien = $model->filterPasien($bulan, $tahun);
            $dokter = $model->filterDokter($bulan, $tahun);
            $obat = $model->filterObat($bulan, $tahun);
            $poli = $model->filterPoli($bulan, $tahun);
            $resep = $model->filterResep($bulan, $tahun);
            $rekam_medis = $model->filterRekamMedis($bulan, $tahun);
            $data = [
                'judul' => 'Laporan',
                'pasien' => $pasien,
                'dokter' => $dokter,
                'obat' => $obat,
                'poli' => $poli,
                'resep' => $resep,
                'rekam_medis' => $rekam_medis,
                'pasienTotal' => $model->totalPasien($bulan, $tahun),
                'dokterTotal' => $model->totalDokter($bulan, $tahun),
                'obatTotal' => $model->totalObat($bulan, $tahun),
                'rekam_medisTotal' => $model->totalRM($bulan, $tahun),
                'poliTotal' => $model->totalPoli($bulan, $tahun),
                'resepTotal' => $model->totalResep($bulan, $tahun),

            ];
            return view('laporan/cetak_views', $data);
        }
        $data = [
            'judul' => 'kosong',
            'pasien' => $this->pasienM->getDataPasien(),
            'dokter' => $this->dokterM->getDataDokter(),
            'obat' => $this->obatM->getDataObat(),
            'poli' => $this->poliM->getDataPoli(),
            'resep' => $this->resepM->getDataResep(),
            'rekam_medis' => $this->rekamM->getDataRekamMedis(),
            'pasienTotal' => $this->pasienM->countAllResults(),
            'dokterTotal' => $this->dokterM->countAllResults(),
            'rekam_medisTotal' => $this->rekamM->countAllResults(),
            'obatTotal' => $this->obatM->countAllResults(),
            'poliTotal' => $this->poliM->countAllResults(),
            'resepTotal' => $this->resepM->countAllResults(),

        ];
        return view('laporan/cetak_views', $data);
    }
    public function lap()
    {
        $model = new Rekam_medis_model();
        $data = $model->lapp();
        dd($data);
    }

    public function laporanPoli()
    {
        $poliM = new Poli_model();
        $data = [
            'judul' => 'laporan poli',
            'poli' => $poliM->getDataPoli()
        ];
        return view('laporan/laporanPoli', $data);
    }
    public function cetakPoli($id_poli)
    {
        $poliM = new Poli_model();
        $kunjunganM = new Kunjungan_model();
        $dokterM = new Dokter_model();
        $rekam_medisM = new Rekam_medis_model();
        $data = [
            'poli' => $poliM->getDataPoli($id_poli),
            'rekam_medis' => $rekam_medisM->getFromPoli($id_poli),
        ];
        return view('laporan/cetakPoli', $data);
    }
    public function laporanPasien()
    {
        $pasienM = new Pasien_model();
        $data = [
            'judul' => 'laporan pasien',
            'pasien' => $pasienM->getDataPasien()
        ];
        return view('laporan/laporanPasien', $data);
    }

    public function cetakPasien($id_pasien)
    {
        $rekam_medisM = new Rekam_medis_model();
        $pasienM = new Pasien_model();
        $data = [
            'rekam_medis' => $rekam_medisM->getDataRM($id_pasien),
            'pasien' => $pasienM->getDataPasien($id_pasien),
        ];
        return view('laporan/cetakPasien', $data);
    }

    //--------------------------------------------------------------------

}
