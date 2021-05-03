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

    function bulan($bulan)
    {
        if ($bulan == 'January' || $bulan == 'Januari' || $bulan == 'januari' || $bulan == 'january') {
            return $bulan = 1;
        } else if ($bulan == 'February' || $bulan == 'february' || $bulan == 'Februari' || $bulan == 'februari') {
            return $bulan = 2;
        } else if ($bulan == 'March' || $bulan == 'march' || $bulan == 'Maret' || $bulan == 'maret') {
            return $bulan = 3;
        } else if ($bulan == 'April' || $bulan == 'april') {
            return $bulan = 4;
        } else if ($bulan == 'May' || $bulan == 'may' || $bulan == 'Mei' || $bulan == 'mei') {
            return $bulan = 5;
        } else if ($bulan == 'June' || $bulan == 'june' || $bulan == 'Juni' || $bulan == 'juni') {
            return $bulan = 6;
        } else if ($bulan == 'July' || $bulan == 'july' || $bulan == 'Juli' || $bulan == 'juli') {
            return $bulan = 7;
        } else if ($bulan == 'August' || $bulan == 'august' || $bulan == 'Agustus' || $bulan == 'agustus') {
            return $bulan = 8;
        } else if ($bulan == 'September' || $bulan == 'september') {
            return $bulan = 9;
        } else if ($bulan == 'October' || $bulan == 'october' || $bulan == 'Oktober' || $bulan == 'oktober') {
            return $bulan = 10;
        } else if ($bulan == 'November' || $bulan == 'november' || $bulan == 'Nopember' || $bulan == 'nopember') {
            return $bulan = 11;
        } else if ($bulan == 'December' || $bulan == 'december' || $bulan == 'Desember' || $bulan == 'desember') {
            return $bulan = 12;
        }
    }
    public function umur($id_pasien)
    {
        //menseleksi tahun lahir dari field ttl
        $data = $this->where('id_pasien', $id_pasien)->get()->getRow();
        $data = $data->ttl;
        $data = explode(',', $data); //pecah hasil berdasarkan tanda koma
        $tanggalLahir = $data[1];
        $tahunLahir = explode(' ', $tanggalLahir); //pecah hasil berdasarkan spasi

        $bulan = $this->bulan($tahunLahir[2]); //ambil bulannya
        $tanggal = intval($tahunLahir[1]); //ambil tanggalnya
        $tahun = intval($tahunLahir[3]); //tampilkan tahun nya saja

        $tahunSekarang = intval(date_format(new DateTime('today'), "Y")); //ambil tahun sekarang
        $bulanSekarang = intval(date_format(new DateTime('today'), 'm')); //ambil bulan
        $tanggalSekarang = intval(date_format(new DateTime('today'), 'd')); //ambil tanggal
        //jika tanggal dan bulan sekarang melewati/sama tanggal dan bulan user
        if ($tanggalSekarang >= $tanggal   && $bulanSekarang  >= $bulan) {
            $hasil = ($tahunSekarang - $tahun);
            return $hasil;
        } else {
            $hasil = ($tahunSekarang - $tahun) - 1;
            return $hasil;
        }
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
