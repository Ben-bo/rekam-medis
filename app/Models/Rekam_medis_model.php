<?php

namespace App\Models;

use CodeIgniter\Model;


class Rekam_medis_model extends Model
{
    protected $table      = 'rekam_medis';
    protected $primaryKey = 'id';

    protected $allowedFields = ['no_rekam_medis', 'id_pasien', 'id_kunjungan', 'anamnese/diagnosa', 'id_poli', 'id_dokter', 'id_obat'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at_rm';
    protected $updatedField = false;

    public function getDataRekamMedis($id = false)
    {
        if ($id == false) {
            return $this->db->table('rekam_medis')
                ->join('pasien', 'pasien.id_pasien=rekam_medis.id_pasien')
                ->join('dokter', 'dokter.id_dokter=rekam_medis.id_dokter')
                ->join('kunjungan', 'kunjungan.id_kunjungan=rekam_medis.id_kunjungan')
                ->join('poli', 'poli.id_poli=rekam_medis.id_poli')
                ->orderBy('id', 'DESC')
                ->get()->getResultArray();
        }
        return $this
            ->join('pasien', 'pasien.id_pasien=rekam_medis.id_pasien')
            ->join('dokter', 'dokter.id_dokter=rekam_medis.id_dokter')
            ->join('kunjungan', 'kunjungan.id_kunjungan=rekam_medis.id_kunjungan')
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
                ->join('kunjungan', 'kunjungan.id_kunjungan=rekam_medis.id_kunjungan')
                ->join('poli', 'poli.id_poli=rekam_medis.id_poli')
                ->orderBy('id', 'DESC')
                ->get()->getResultArray();
        }
        return $this->db->table('rekam_medis')
            ->join('pasien', 'pasien.id_pasien=rekam_medis.id_pasien')
            ->join('dokter', 'dokter.id_dokter=rekam_medis.id_dokter')
            ->join('kunjungan', 'kunjungan.id_kunjungan=rekam_medis.id_kunjungan')
            ->join('poli', 'poli.id_poli=rekam_medis.id_poli')
            ->orderBy('id', 'DESC')
            ->where(['pasien.id_pasien' => $id_pasien])->get()->getResultArray();
    }
    public function getFromPoli($id_poli = false)
    {
        if ($id_poli == false) {
            return $this->db->table('rekam_medis')
                ->join('pasien', 'pasien.id_pasien=rekam_medis.id_pasien')
                ->join('dokter', 'dokter.id_dokter=rekam_medis.id_dokter')
                ->join('kunjungan', 'kunjungan.id_kunjungan=rekam_medis.id_kunjungan')
                ->join('poli', 'poli.id_poli=rekam_medis.id_poli')
                ->orderBy('id', 'DESC')
                ->get()->getResultArray();
        }
        return $this->db->table('rekam_medis')
            ->join('pasien', 'pasien.id_pasien=rekam_medis.id_pasien')
            ->join('dokter', 'dokter.id_dokter=rekam_medis.id_dokter')
            ->join('kunjungan', 'kunjungan.id_kunjungan=rekam_medis.id_kunjungan')
            ->join('poli', 'poli.id_poli=rekam_medis.id_poli')
            ->orderBy('id', 'DESC')
            ->where(['poli.id_poli' => $id_poli])->get()->getResultArray();
    }
    public function getDataRMf($id_pasien = false)
    {
        if ($id_pasien == false) {
            return $this->db->table('rekam_medis')
                ->join('pasien', 'pasien.id_pasien=rekam_medis.id_pasien')
                ->join('dokter', 'dokter.id_dokter=rekam_medis.id_dokter')
                ->join('kunjungan', 'kunjungan.id_kunjungan=rekam_medis.id_kunjungan')
                ->join('poli', 'poli.id_poli=rekam_medis.id_poli')
                ->get()->getResultArray();
        }
        return $this
            ->join('pasien', 'pasien.id_pasien=rekam_medis.id_pasien')
            ->join('dokter', 'dokter.id_dokter=rekam_medis.id_dokter')
            ->join('kunjungan', 'kunjungan.id_kunjungan=rekam_medis.id_kunjungan')
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

    public function filterKunjungan($bulan, $tahun)
    {
        return $this->db->table('kunjungan')
            ->join('poli', 'poli.id_poli=kunjungan.id_poli')
            ->where('YEAR(created_at_kunjungan)', $tahun)->where('MONTH(created_at_kunjungan)', $bulan)->get()->getResultArray();
    }
    public function totalkunjungan($bulan, $tahun)
    {
        return
            $this->db->table('kunjungan')->where('YEAR(created_at_kunjungan)', $tahun)->where('MONTH(created_at_kunjungan)', $bulan)->countAllResults();
    }
    public function totalPasienKunjungan($bulan, $tahun)
    {
        return
            $this->db->table('kunjungan')->select('*,COUNT(*) as total')->where('YEAR(created_at_kunjungan)', $tahun)->where('MONTH(created_at_kunjungan)', $bulan)->groupBy('id_pasien')->get()->getResultArray();
    }

    public function getDataCetak($no_rekam_medis)
    {
        return $this
            ->join('pasien', 'pasien.id_pasien=rekam_medis.id_pasien')
            ->join('dokter', 'dokter.id_dokter=rekam_medis.id_dokter')
            ->join('kunjungan', 'kunjungan.id_kunjungan=rekam_medis.id_kunjungan')
            ->join('poli', 'poli.id_poli=rekam_medis.id_poli')
            ->where(['no_rekam_medis' => $no_rekam_medis])->first();
    }
}
