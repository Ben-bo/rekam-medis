<?php

namespace App\Models;

use CodeIgniter\Model;

class Poli_model extends Model
{
    protected $table      = 'poli';
    protected $primaryKey = 'id_poli';

    protected $allowedFields = ['nama_poli', 'deskripsi_poli'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at_poli';
    protected $updatedField = false;

    public function getDataPoli($id_poli = false)
    {
        if ($id_poli == false) {
            return $this->findAll();
        }
        return $this->where(['id_poli' => $id_poli])->first();
    }
}
