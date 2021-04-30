<?php

namespace App\Models;

use CodeIgniter\Model;

class Obat_model extends Model
{
    protected $table      = 'obat';
    protected $primaryKey = 'id_obat';

    protected $allowedFields = ['nama_obat', 'jenis_obat', 'sediaan', 'dosis_anak', 'dosis_dewasa', 'stok'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at_obat';
    protected $updatedField = false;

    public function getDataObat($id_obat = false)
    {
        if ($id_obat == false) {
            return $this->findAll();
        }
        return $this->where(['id_obat' => $id_obat])->first();
    }
}
