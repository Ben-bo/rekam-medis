<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;

class Pasien_model extends Model
{
    protected $table      = 'pasien';
    protected $primaryKey = 'id_pasien';

    protected $allowedFields = ['nama_pasien', 'no_ktp', 'jenis_kelamin', 'agama', 'pendidikan_terakhir', 'status_perkawinan', 'ttl', 'pekerjaan', 'alamat', 'no_hp', 'kota/kabupaten', 'desa/kelurahan'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at_pasien';
    protected $updatedField = false;

    public function getDataPasien($id_pasien = false)
    {
        if ($id_pasien == false) {
            return $this->findAll();
        }
        return $this->where(['id_pasien' => $id_pasien])->first();
    }
    public function umur($id_pasien)
    {
        //menseleksi tahun lahir dari field ttl
        $data = $this->where('id_pasien', $id_pasien)->get()->getRow();
        $data = $data->ttl;
        $data = explode(',', $data); //pecah hasil berdasarkan tanda koma
        $tanggalLahir = $data[1];
        $tahunLahir = explode(' ', $tanggalLahir); //pecah hasil berdasarkan spasi
        $tahun = $tahunLahir[3]; //tampilkan tahun nya saja
        $tahun = date_format(new DateTime($tahun), "Y");
        $tahun = intval($tahun);
        $tahunSekarang = date_format(new DateTime('today'), "Y");
        $tahunSekarang = intval($tahunSekarang);
        //menghitung umur
        $hasil = $tahunSekarang - $tahun;
        return $hasil;
    }
    public function tanggalLahir($id_pasien)
    {
        $data = $this->where('id_pasien', $id_pasien)->get()->getRow();
        $data = $data->ttl;
        $data = explode(',', $data); //pecah hasil berdasarkan tanda koma
        $tanggalLahir = $data[1];
        return $tanggalLahir;
    }
}
