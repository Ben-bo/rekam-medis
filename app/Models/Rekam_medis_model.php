<?php

namespace App\Models;

use CodeIgniter\Model;


class Rekam_medis_model extends Model
{
    protected $table      = 'rekam_medis';
    protected $primaryKey = 'id';

    protected $allowedFields = ['no_rekam_medis', 'id_pasien', 'keluhan', 'anamnese/diagnosa', 'id_poli', 'id_dokter', 'id_obat'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at_rm';
    protected $updatedField = false;

    public function getDataRekamMedis($id = false)
    {
        if ($id == false) {
            return $this->db->table('rekam_medis')
                ->join('pasien', 'pasien.id_pasien=rekam_medis.id_pasien')
                ->join('dokter', 'dokter.id_dokter=rekam_medis.id_dokter')
                ->join('poli', 'poli.id_poli=rekam_medis.id_poli')
                ->orderBy('id', 'DESC')
                ->get()->getResultArray();
        }
        return $this
            ->join('pasien', 'pasien.id_pasien=rekam_medis.id_pasien')
            ->join('dokter', 'dokter.id_dokter=rekam_medis.id_dokter')
            ->join('poli', 'poli.id_poli=rekam_medis.id_poli')
            ->where(['id' => $id])->first();
    }
    public function idPoli($id)
    {
        return $this->select('id_poli')->where('id', $id)->first();
    }
    public function getDataRM($id_pasien = false)
    {
        if ($id_pasien == false) {
            return $this->db->table('rekam_medis')
                ->join('pasien', 'pasien.id_pasien=rekam_medis.id_pasien')
                ->join('dokter', 'dokter.id_dokter=rekam_medis.id_dokter')
                ->join('poli', 'poli.id_poli=rekam_medis.id_poli')
                ->orderBy('id', 'DESC')
                ->get()->getResultArray();
        }
        return $this->db->table('rekam_medis')
            ->join('pasien', 'pasien.id_pasien=rekam_medis.id_pasien')
            ->join('dokter', 'dokter.id_dokter=rekam_medis.id_dokter')

            ->join('poli', 'poli.id_poli=rekam_medis.id_poli')
            ->orderBy('id', 'DESC')
            ->where(['pasien.id_pasien' => $id_pasien])->get()->getResultArray();
    }
    public function getDataRMf($id_pasien = false)
    {
        if ($id_pasien == false) {
            return $this->db->table('rekam_medis')
                ->join('pasien', 'pasien.id_pasien=rekam_medis.id_pasien')
                ->join('dokter', 'dokter.id_dokter=rekam_medis.id_dokter')

                ->join('poli', 'poli.id_poli=rekam_medis.id_poli')
                ->get()->getResultArray();
        }
        return $this
            ->join('pasien', 'pasien.id_pasien=rekam_medis.id_pasien')
            ->join('dokter', 'dokter.id_dokter=rekam_medis.id_dokter')

            ->join('poli', 'poli.id_poli=rekam_medis.id_poli')
            ->where(['pasien.nama_pasien' => $id_pasien])->first();
    }

    public function stokObat($obat)
    {
        $data = $this->db->table('obat')->where('nama_obat', $obat)->get()->getRowObject();
        return $data->stok;
    }
    public function idobat($obat)
    {
        $data = $this->db->table('obat')->where('nama_obat', $obat)->get()->getRowObject();
        return $data->id_obat;
    }

    public function namaObatRM($id)
    {
        $data = $this->where('id', $id)->get()->getRowObject();
        return $data->id_obat;
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
        return $this->db->table('pasien')->where('YEAR(created_at_pasien)', $tahun)->where('MONTH(created_at_pasien)', $bulan)->get()->getResultArray();
    }
    public function filterDokter($bulan, $tahun)
    {
        return $this->db->table('dokter')->where('YEAR(created_at_dokter)', $tahun)->where('MONTH(created_at_dokter)', $bulan)->get()->getResultArray();
    }
    public function filterObat($bulan, $tahun)
    {
        return $this->db->table('obat')->where('YEAR(created_at_obat)', $tahun)->where('MONTH(created_at_obat)', $bulan)->get()->getResultArray();
    }
    public function filterPoli($bulan, $tahun)
    {
        return $this->db->table('poli')->where('YEAR(created_at_poli)', $tahun)->where('MONTH(created_at_poli)', $bulan)->get()->getResultArray();
    }
    public function filterResep($bulan, $tahun)
    {
        return $this->db->table('resep')->where('YEAR(created_at)', $tahun)->where('MONTH(created_at)', $bulan)->get()->getResultArray();
    }
    public function filterRekamMedis($bulan, $tahun)
    {
        return $this->db->table('rekam_medis')
            ->join('pasien', 'pasien.id_pasien=rekam_medis.id_pasien')
            ->join('dokter', 'dokter.id_dokter=rekam_medis.id_dokter')

            ->join('poli', 'poli.id_poli=rekam_medis.id_poli')
            ->where('YEAR(rekam_medis.created_at_rm)', $tahun)->where('MONTH(rekam_medis.created_at_rm)', $bulan)->get()->getResultArray();
    }

    public function totalPasien($bulan, $tahun)
    {
        return
            $this->db->table('pasien')->where('YEAR(created_at_pasien)', $tahun)->where('MONTH(created_at_pasien)', $bulan)->countAllResults();
    }
    public function totalObat($bulan, $tahun)
    {
        return
            $this->db->table('obat')->where('YEAR(created_at_obat)', $tahun)->where('MONTH(created_at_obat)', $bulan)->countAllResults();
    }
    public function totalDokter($bulan, $tahun)
    {
        return
            $this->db->table('dokter')->where('YEAR(created_at_dokter)', $tahun)->where('MONTH(created_at_dokter)', $bulan)->countAllResults();
    }
    public function totalPoli($bulan, $tahun)
    {
        return
            $this->db->table('poli')->where('YEAR(created_at_poli)', $tahun)->where('MONTH(created_at_poli)', $bulan)->countAllResults();
    }
    public function totalRM($bulan, $tahun)
    {
        return
            $this->db->table('rekam_medis')->where('YEAR(created_at_rm)', $tahun)->where('MONTH(created_at_rm)', $bulan)->countAllResults();
    }
    public function totalResep($bulan, $tahun)
    {
        return
            $this->db->table('resep')->where('YEAR(created_at)', $tahun)->where('MONTH(created_at)', $bulan)->countAllResults();
    }

    public function getDataCetak($no_rekam_medis)
    {
        return $this
            ->join('pasien', 'pasien.id_pasien=rekam_medis.id_pasien')
            ->join('dokter', 'dokter.id_dokter=rekam_medis.id_dokter')

            ->join('poli', 'poli.id_poli=rekam_medis.id_poli')
            ->where(['no_rekam_medis' => $no_rekam_medis])->first();
    }
}
