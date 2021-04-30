<?php

namespace App\Models;

use CodeIgniter\Model;

class TestingM extends Model
{
    protected $table      = 'rekam_medis';
    protected $primaryKey = 'id';

    protected $allowedFields = ['no_rekam_medis', 'id_pasien', 'keluhan', 'anamnese/diagnosa', 'id_dokter', 'id_obat'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at_rm';
    protected $updatedField = false;

    public function getRm($id_pasien)
    {
        $query = $this->db->table('rekam_medis')->where('id_pasien',  $id_pasien)->get()->getResultArray();
        return $query;
    }
    public function getRm1($id_pasien)
    {
        $query = $this->where(['id_pasien' => $id_pasien])->first();
        return $query;
    }
}
