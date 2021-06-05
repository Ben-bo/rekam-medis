<?php

namespace App\Models;

use CodeIgniter\Model;

class Resep_model extends Model
{
    protected $table      = 'resep';
    protected $primaryKey = 'id_resep';

    protected $allowedFields = ['no_rekam_medis', 'nama_pasien', 'dokter', 'obat', 'diagnosa', 'resep'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField = false;

    public function getDataResep($id_resep = false)
    {
        if ($id_resep == false) {
            return $this->orderBy('id_resep', 'DESC')->get()->getResultArray();;
        }
        return $this
            ->where(['id_resep' => $id_resep])->first();
    }
}
