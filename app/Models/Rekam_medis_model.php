<?php

namespace App\Models;

use CodeIgniter\Model;


class Rekam_medis_model extends Model
{
    protected $table      = 'rekam_medis';
    protected $primaryKey = 'id';

    protected $allowedFields = ['no_rekam_medis', 'id_pasien', 'keluhan', 'anamnese/diagnosa', 'id_dokter', 'id_obat'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at_rm';
    protected $updatedField = false;

    public function getDataRekamMedis($id = false)
    {
        if ($id == false) {
            return $this->db->table('rekam_medis')
                ->join('pasien', 'pasien.id_pasien=rekam_medis.id_pasien')
                ->join('dokter', 'dokter.id_dokter=rekam_medis.id_dokter')
                ->join('obat', 'obat.id_obat=rekam_medis.id_obat')
                ->get()->getResultArray();
        }
        return $this
            ->join('pasien', 'pasien.id_pasien=rekam_medis.id_pasien')
            ->join('dokter', 'dokter.id_dokter=rekam_medis.id_dokter')
            ->join('obat', 'obat.id_obat=rekam_medis.id_obat')
            ->where(['id' => $id])->first();
    }
    public function getDataRM($id_pasien = false)
    {
        if ($id_pasien == false) {
            return $this->db->table('rekam_medis')
                ->join('pasien', 'pasien.id_pasien=rekam_medis.id_pasien')
                ->join('dokter', 'dokter.id_dokter=rekam_medis.id_dokter')
                ->join('obat', 'obat.id_obat=rekam_medis.id_obat')
                ->get()->getResultArray();
        }
        return $this->db->table('rekam_medis')
            ->join('pasien', 'pasien.id_pasien=rekam_medis.id_pasien')
            ->join('dokter', 'dokter.id_dokter=rekam_medis.id_dokter')
            ->join('obat', 'obat.id_obat=rekam_medis.id_obat')
            ->where(['pasien.id_pasien' => $id_pasien])->get()->getResultArray();
    }
    public function getDataRMf($id_pasien = false)
    {
        if ($id_pasien == false) {
            return $this->db->table('rekam_medis')
                ->join('pasien', 'pasien.id_pasien=rekam_medis.id_pasien')
                ->join('dokter', 'dokter.id_dokter=rekam_medis.id_dokter')
                ->join('obat', 'obat.id_obat=rekam_medis.id_obat')
                ->get()->getResultArray();
        }
        return $this
            ->join('pasien', 'pasien.id_pasien=rekam_medis.id_pasien')
            ->join('dokter', 'dokter.id_dokter=rekam_medis.id_dokter')
            ->join('obat', 'obat.id_obat=rekam_medis.id_obat')
            ->where(['pasien.nama_pasien' => $id_pasien])->first();
    }

    public function stokObat($obat)
    {
        return $this->db->table('obat')->where(['id_obat' => $obat])->get()->getRow();
    }

    public function no_rekam_medis()
    {
        $query =  $this->db->table('rekam_medis')->select('RIGHT(rekam_medis.no_rekam_medis,2) as no_rekam_medis', FALSE)->orderBy('no_rekam_medis', 'DESC')->limit(1)->get();

        //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->getRow()) {
            //cek kode jika telah tersedia    
            $data = $query->getRow();
            $kode = intval($data->no_rekam_medis) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }

        $tgl = date('dmY');
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = "RM" . "5" . $tgl . $batas;  //format kode
        return $kodetampil;
    }

    public function filterPasien($bulan, $tahun)
    {
        $db = \Config\Database::connect();
        $data = $db->query("SELECT * FROM pasien WHERE YEAR(created_at)= '" . $tahun . "' AND MONTH(created_at)=" . $bulan);
        return $data->getResultArray();
    }
    public function filterDokter($bulan, $tahun)
    {
        $db = \Config\Database::connect();
        $data = $db->query("SELECT * FROM dokter WHERE YEAR(created_at)= '" . $tahun . "' AND MONTH(created_at)=" . $bulan);
        return $data->getResultArray();
    }
    public function filterObat($bulan, $tahun)
    {
        $db = \Config\Database::connect();
        $data = $db->query("SELECT * FROM obat WHERE YEAR(created_at)= '" . $tahun . "' AND MONTH(created_at)=" . $bulan);
        return $data->getResultArray();
    }
    public function filterRekamMedis($bulan, $tahun)
    {
        return $this->db->table('rekam_medis')
            ->join('pasien', 'pasien.id_pasien=rekam_medis.id_pasien')
            ->join('dokter', 'dokter.id_dokter=rekam_medis.id_dokter')
            ->join('obat', 'obat.id_obat=rekam_medis.id_obat')
            ->where('YEAR(rekam_medis.created_at)', $tahun)->where('MONTH(rekam_medis.created_at)', $bulan)->get()->getResultArray();
    }
    public function getDataCetak($no_rekam_medis)
    {
        return $this
            ->join('pasien', 'pasien.id_pasien=rekam_medis.id_pasien')
            ->join('dokter', 'dokter.id_dokter=rekam_medis.id_dokter')
            ->join('obat', 'obat.id_obat=rekam_medis.id_obat')
            ->where(['no_rekam_medis' => $no_rekam_medis])->first();
    }
}
