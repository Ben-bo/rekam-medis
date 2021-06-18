<?php

namespace App\Controllers;

use App\Models\Home_model;

class Home extends BaseController
{
	public function index()
	{
		$model = new Home_model();
		$data = [
			'judul' => 'Dashboard',
			'pasien' => $model->getPasien(),
			'dokter' => $model->getDokter(),
			'obat' => $model->getObat(),
			'kunjungan' => $model->getKunjungan(),
			'rekam_medis' => $model->getRekam_medis(),
			'poli' => $model->getPoli(),
			'resep' => $model->getResep(),

		];
		return view('home/home_views', $data);
	}

	//--------------------------------------------------------------------

}
