<?php

namespace App\Models;

use CodeIgniter\Model;

class Dokter_model extends Model
{
    protected $table      = 'dokter';
    protected $primaryKey = 'id_dokter';

    protected $allowedFields = ['nama_dokter', 'spesialis', 'id_poli', 'jenis_kelamin_dokter', 'ttl', 'no_hp_dokter', 'email', 'alamat', 'foto'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at_dokter';
    protected $updatedField = false;

    public function getDataDokter($id_dokter = false)
    {
        if ($id_dokter == false) {
            return $this
                ->join('poli', 'poli.id_poli=dokter.id_poli')
                ->get()->getResultArray();
        }
        return $this
            ->join('poli', 'poli.id_poli=dokter.id_poli')
            ->where(['id_dokter' => $id_dokter])->first();
    }
    public function getDataDokterFormPoli($id_poli)
    {
        return $this->where('id_poli', $id_poli)->get()->getResultArray();
    }
}
