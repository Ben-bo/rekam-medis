<?php

namespace App\Controllers;

use App\Models\Rekam_medis_model;
use DateTime;

class Laporan extends BaseController
{
    public function index($bulan = false, $tahun = false)
    {
        $model = new Rekam_medis_model();
        $data = [
            'judul' => 'Laporan',
            'pasien' => $model->dataPasien(),
            'dokter' => $model->dataDokter(),
            'obat' => $model->dataObat(),
            'rekam_medis' => $model->getDataRekamMedis(),
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
        $rekam_medis = $model->filterRekamMedis($bulan, $tahun);
        $data = [
            'judul' => 'Laporan',
            'pasien' => $pasien,
            'dokter' => $dokter,
            'obat' => $obat,
            'rekam_medis' => $rekam_medis,
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
            $rekam_medis = $model->filterRekamMedis($bulan, $tahun);
            $data = [
                'judul' => 'Laporan',
                'pasien' => $pasien,
                'dokter' => $dokter,
                'obat' => $obat,
                'rekam_medis' => $rekam_medis,
            ];
            return view('laporan/cetak_views', $data);
        }
        $model = new Rekam_medis_model();
        $data = [
            'judul' => 'kosong',
            'pasien' => $model->dataPasien(),
            'dokter' => $model->dataDokter(),
            'obat' => $model->dataObat(),
            'rekam_medis' => $model->getDataRekamMedis(),

        ];
        return view('laporan/cetak_views', $data);
    }
    public function lap()
    {
        $model = new Rekam_medis_model();
        $data = $model->lapp();
        dd($data);
    }

    //--------------------------------------------------------------------

}
