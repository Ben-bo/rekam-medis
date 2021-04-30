<?php

namespace App\Controllers;

use App\Models\Pasien_model;
use App\Models\TestingM;

class Testing extends BaseController
{
    public function index($norm = false, $rm = false)
    {

        $id_pasien = $this->request->getVar('pasien');
        if ($id_pasien !== null) {
            $modelP = new Pasien_model();
            $modelT = new TestingM();
            $data = [
                'pasien' => $modelP->getDataPasien(),
                'norm' => $modelT->getRm($id_pasien),
                'rm' => $modelT->getRm1($id_pasien),
            ];
            return view('testing/testing_view', $data);
        } else {
            $modelP = new Pasien_model();
            $data = [
                'pasien' => $modelP->getDataPasien(),
                'norm' => $norm,
                'rm' => $rm,
            ];
            return view('testing/testing_view', $data);
        }
    }
    public function getrm()
    {
        $modelT = new TestingM();
        $idrm = $this->request->getPost('pasien');
        $data = $modelT->getRm($idrm);
        // dd($data);
        echo json_encode($data);
    }
    public function filter()
    {
        $id_pasien = $this->request->getVar('pasien');
        $modelP = new Pasien_model();
        $modelT = new TestingM();
        $data = [
            'pasien' => $modelP->getDataPasien(),
            'norm' => $modelT->getRm($id_pasien),
            'rm' => $modelT->getRm1($id_pasien),
        ];
        return view('testing/testing_view', $data);
    }
}
