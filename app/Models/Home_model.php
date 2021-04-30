<?php

namespace App\Models;

use CodeIgniter\Model;

class Home_model extends Model
{



    public function getPasien()
    {
        return $this->db->table('pasien')->countAll();
    }
    public function getDokter()
    {
        return $this->db->table('dokter')->countAll();
    }
    public function getObat()
    {
        return $this->db->table('obat')->countAll();
    }
    public function getRekam_medis()
    {
        return $this->db->table('rekam_medis')->countAll();
    }
}