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
    public function index($bulan = false, $tahun = false)
    {
        $kunjunganM = new Kunjungan_model();
        $totalPasien = $kunjunganM->pasienTotal();
        $data = [
            'judul' => 'Laporan',
            'kunjungan' => $kunjunganM->getDataKunjungan(),
            'kunjunganTotal' => $kunjunganM->kunjunganTotal(),
            'pasienTotal' => $totalPasien,
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
        $kunjungan = $model->filterKunjungan($bulan, $tahun);
        $totalPasienKunjungan = $model->totalPasienKunjungan($bulan, $tahun);
        $data = [
            'judul' => 'Laporan',
            'kunjungan' => $kunjungan,
            'kunjunganTotal' => $model->totalkunjungan($bulan, $tahun),
            'pasienTotal' => $totalPasienKunjungan,
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];
        return view('laporan/laporan_views', $data);
    }

    public function cetakData($bulan = false, $tahun = false)
    {
        $kunjunganM = new Kunjungan_model();
        $model = new Rekam_medis_model();
        $totalPasienKunjungan = $model->totalPasienKunjungan($bulan, $tahun);
        $totalPasien = $kunjunganM->pasienTotal();
        if ($bulan && $tahun == true) {
            $kunjungan = $model->filterKunjungan($bulan, $tahun);
            $data = [
                'judul' => 'Laporan',
                'kunjungan' => $kunjungan,
                'kunjunganTotal' => $model->totalkunjungan($bulan, $tahun),
                'pasienTotal' => $totalPasienKunjungan,

            ];
            return view('laporan/cetak_views', $data);
        }
        $data = [
            'judul' => 'kosong',
            'kunjungan' => $kunjunganM->getDataKunjungan(),
            'kunjunganTotal' => $kunjunganM->kunjunganTotal(),
            'pasienTotal' => $totalPasien,


        ];
        return view('laporan/cetak_views', $data);
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
