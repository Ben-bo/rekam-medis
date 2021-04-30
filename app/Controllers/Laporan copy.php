<?php

namespace App\Controllers;

use App\Models\Rekam_medis_model;

class Laporan extends BaseController
{
    public function index($tanggal = false)
    {
        $model = new Rekam_medis_model();
        $data = [
            'judul' => 'Laporan',
            'pasien' => $model->dataPasien(),
            'dokter' => $model->dataDokter(),
            'obat' => $model->dataObat(),
            'rekam_medis' => $model->getDataRekamMedis(),
            'tanggal' => $tanggal,

        ];
        return view('laporan/laporan_views', $data);
    }

    public function filterData()
    {
        $model = new Rekam_medis_model();
        $tanggal = $this->request->getVar('tanggal');
        $pasien = $model->filter($tanggal);
        $data = [
            'judul' => 'Laporan',
            'pasien' => $pasien,
            'dokter' => $model->dataDokter(),
            'obat' => $model->dataObat(),
            'rekam_medis' => $model->getDataRekamMedis(),
            'tanggal' => $tanggal,
        ];
        return view('laporan/laporan_views', $data);
    }

    public function cetakData($tanggal = false)
    {
        $model = new Rekam_medis_model();
        if ($tanggal == true) {

            $pasien = $model->filter($tanggal);
            $data = [
                'judul' => 'Laporan',
                'pasien' => $pasien,
                'dokter' => $model->dataDokter(),
                'obat' => $model->dataObat(),
                'rekam_medis' => $model->getDataRekamMedis(),
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

    //--------------------------------------------------------------------

}
