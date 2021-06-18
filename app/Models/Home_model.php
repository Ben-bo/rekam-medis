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
    public function getKunjungan()
    {
        return $this->db->table('kunjungan')->countAll();
    }
    public function getRekam_medis()
    {
        return $this->db->table('rekam_medis')->countAll();
    }
    public function getPoli()
    {
        return $this->db->table('poli')->countAll();
    }
    public function getResep()
    {
        return $this->db->table('resep')->countAll();
    }
}
