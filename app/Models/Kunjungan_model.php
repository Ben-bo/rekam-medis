<?php

namespace App\Models;

use CodeIgniter\Model;

class Kunjungan_model extends Model
{
    protected $table      = 'kunjungan';
    protected $primaryKey = 'id_kunjungan';

    protected $allowedFields = ['id_pasien', 'nama_pasien', 'id_poli', 'keluhan'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at_kunjungan';
    protected $updatedField = false;

    public function getDataKunjungan($id_kunjungan = false)
    {
        if ($id_kunjungan == false) {
            return $this
                ->join('poli', 'poli.id_poli=kunjungan.id_poli')
                ->get()->getResultArray();
        }
        return $this
            ->join('poli', 'poli.id_poli=kunjungan.id_poli')
            ->where(['id_kunjungan' => $id_kunjungan])->first();
    }

    public function getPasienPoli($id_pasien)
    {
        return $this->join('poli', 'poli.id_poli=kunjungan.id_poli')
            ->where('id_pasien', $id_pasien)->get()->getResultArray();
    }
}
