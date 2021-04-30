<?php

namespace App\Models;

use CodeIgniter\Model;

class Kartu_berobat_model extends Model
{
    protected $table      = 'kartu_berobat';
    protected $primaryKey = 'id_kartu';

    protected $allowedFields = ['no_rekam_medis', 'id_pasien'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at_kartu';
    protected $updatedField = false;

    public function getDataKartu($id_pasien = false)
    {
        if ($id_pasien == false) {
            return $this
                ->join('pasien', 'pasien.id_pasien=kartu_berobat.id_pasien')
                ->get()->getResultArray();
        }
        return $this
            ->join('pasien', 'pasien.id_pasien=kartu_berobat.id_pasien')
            ->where(['pasien.id_pasien' => $id_pasien])->get()->getRow();
    }
}
