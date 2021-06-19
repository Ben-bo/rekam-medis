<?php

namespace App\Controllers;

use App\Models\Pasien_model;
use DateTime;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Backup extends BaseController
{
    protected $Pasien_model;

    public function __construct()
    {
        $this->Pasien_model = new Pasien_model();
    }

    public function pasienBackup($tahun = false)
    {
        $data = [
            'judul' => 'Data Pasien',
            'pasien' => $this->Pasien_model->getDataPasien(),
            'tahun' => $tahun
        ];
        return view('backup/pasienBackup', $data);
    }
    public function filterData()
    {

        $tanggal = $this->request->getVar('tanggal');
        $tahun = date_format(new DateTime($tanggal), 'Y');
        $filterPasien = $this->Pasien_model->filterPasien($tahun);
        $data = [
            'judul' => 'Laporan',
            'pasien' => $filterPasien,
            'tahun' => $tahun,
        ];
        return view('backup/pasienBackup', $data);
    }
    public function export($tahun = false)

    {
        if ($tahun == true) {
            $filterPasien = $this->Pasien_model->filterPasien($tahun);

            $spreadsheet = new Spreadsheet();
            // tulis header/nama kolom 
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Nama Pasien')
                ->setCellValue('B1', 'No Ktp')
                ->setCellValue('C1', 'jenis kelamin')
                ->setCellValue('D1', 'agama')
                ->setCellValue('E1', 'pendidikan terakhir')
                ->setCellValue('F1', 'Status Perkawianan')
                ->setCellValue('G1', 'TTL')
                ->setCellValue('H1', 'Pekerjaan')
                ->setCellValue('I1', 'Alamat')
                ->setCellValue('J1', 'No HP')
                ->setCellValue('K1', 'Kota/Kabupaten')
                ->setCellValue('L1', 'Desa/kelurahan');

            $column = 2;
            // tulis data mobil ke cell
            foreach ($filterPasien as $data) {
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A' . $column, $data['nama_pasien'])
                    ->setCellValueExplicit('B' . $column, $data['no_ktp'], DataType::TYPE_STRING)
                    ->setCellValue('C' . $column, $data['jenis_kelamin'])
                    ->setCellValue('D' . $column, $data['agama'])
                    ->setCellValue('E' . $column, $data['pendidikan_terakhir'])
                    ->setCellValue('F' . $column, $data['status_perkawinan'])
                    ->setCellValue('G' . $column, $data['ttl'])
                    ->setCellValue('H' . $column, $data['pekerjaan'])
                    ->setCellValue('I' . $column, $data['alamat'])
                    ->setCellValueExplicit('J' . $column, $data['no_hp'], DataType::TYPE_STRING)
                    ->setCellValue('K' . $column, $data['kota/kabupaten'])
                    ->setCellValue('L' . $column, $data['desa/kelurahan']);
                $column++;
            }
            // tulis dalam format .xlsx
            $writer = new Xlsx($spreadsheet);
            $fileName = "Data Pasien";

            // Redirect hasil generate xlsx ke web client
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header("Content-Disposition: attachment;filename=" . $fileName . " - " . $tahun . ".xlsx");
            header('Cache-Control: max-age=0');
            $writer->save('php://output');
        } else {
            $pasien = $this->Pasien_model->getDataPasien();
            $spreadsheet = new Spreadsheet();
            // tulis header/nama kolom 
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Nama Pasien')
                ->setCellValue('B1', 'No Ktp')
                ->setCellValue('C1', 'jenis kelamin')
                ->setCellValue('D1', 'agama')
                ->setCellValue('E1', 'pendidikan terakhir')
                ->setCellValue('F1', 'Status Perkawianan')
                ->setCellValue('G1', 'TTL')
                ->setCellValue('H1', 'Pekerjaan')
                ->setCellValue('I1', 'Alamat')
                ->setCellValue('J1', 'No HP')
                ->setCellValue('K1', 'Kota/Kabupaten')
                ->setCellValue('L1', 'Desa/kelurahan');

            $column = 2;
            // tulis data mobil ke cell
            foreach ($pasien as $data) {
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A' . $column, $data['nama_pasien'])
                    ->setCellValueExplicit('B' . $column, $data['no_ktp'], DataType::TYPE_STRING)
                    ->setCellValue('C' . $column, $data['jenis_kelamin'])
                    ->setCellValue('D' . $column, $data['agama'])
                    ->setCellValue('E' . $column, $data['pendidikan_terakhir'])
                    ->setCellValue('F' . $column, $data['status_perkawinan'])
                    ->setCellValue('G' . $column, $data['ttl'])
                    ->setCellValue('H' . $column, $data['pekerjaan'])
                    ->setCellValue('I' . $column, $data['alamat'])
                    ->setCellValueExplicit('J' . $column, $data['no_hp'], DataType::TYPE_STRING)
                    ->setCellValue('K' . $column, $data['kota/kabupaten'])
                    ->setCellValue('L' . $column, $data['desa/kelurahan']);

                $column++;
            }
            // tulis dalam format .xlsx
            $writer = new Xlsx($spreadsheet);
            $fileName = 'Data Pasien';

            // Redirect hasil generate xlsx ke web client
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
            header('Cache-Control: max-age=0');
            $writer->save('php://output');
        }
    }

    public function importPasien()
    {
        $data = [
            'judul' => 'import pasien',
        ];
        return view('backup/importPasien', $data);
    }
    public function prosesImport()
    {
        $validation =  \Config\Services::validation();

        $file = $this->request->getFile('import');



        // ambil extension dari file excel
        $extension = $file->getClientExtension();

        // format excel 2007 ke bawah
        if ('xls' == $extension) {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            // format excel 2010 ke atas
        } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $spreadsheet = $reader->load($file);
        $data = $spreadsheet->getActiveSheet()->toArray();

        foreach ($data as $idx => $row) {

            // lewati baris ke 0 pada file excel
            // dalam kasus ini, array ke 0 adalahpara title
            if ($idx == 0) {
                continue;
            }

            // get product_id from excel
            $nama_pasien     = $row[0];
            $no_ktp     = $row[1];
            $jenis_kelamin     = $row[2];
            $agama     = $row[3];
            $pendidikan_terakhir     = $row[4];
            $status_perkawinan     = $row[5];
            $ttl     = $row[6];
            $pekerjaan     = $row[7];
            $alamat     = $row[8];
            $no_hp     = $row[9];
            $kotaKabupaten     = $row[10];
            $desaKelurahan     = $row[11];
            // get trx_date from excel
            // tampilkan harga product berdasarkan product_id menggunakan function getTrxPrice()

            $data = [
                "nama_pasien"    => $nama_pasien,
                "no_ktp"      => $no_ktp,
                "jenis_kelamin"     => $jenis_kelamin,
                "agama"     => $agama,
                "pendidikan_terakhir"     => $pendidikan_terakhir,
                "status_perkawinan"     => $status_perkawinan,
                "ttl"     => $ttl,
                "pekerjaan"     => $pekerjaan,
                "alamat"     => $alamat,
                "no_hp"     => $no_hp,
                "kota/kabupaten"     => $kotaKabupaten,
                "desa/kelurahan"     => $desaKelurahan,
            ];

            $simpan = $this->Pasien_model->insertImport($data);
        }

        if ($simpan) {
            session()->setFlashdata('pesan', 'Imported Data successfully');
            return redirect()->to('/backup/importPasien');
        }
    }
}
