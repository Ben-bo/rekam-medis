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
			'rekam_medis' => $model->getRekam_medis(),

		];
		return view('home/home_views', $data);
	}

	//--------------------------------------------------------------------

}