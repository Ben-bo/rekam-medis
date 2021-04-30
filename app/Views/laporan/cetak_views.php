<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="/assets/css/style.css">
    <title>&nbsp;</title>
</head>

<body>

    <div class="wrapper">
        <div class="row">
            <div class="col-2">
                <img src="/assets/img/icon-rs.png" alt="logo" style="width: 80px; background-color: teal;">
            </div>
            <div class="col-10">
                <h2>Nama Instansi Layanan Kesehatan</h2>
                <p>Jl. ContohJalan Contoh Kota no 32.</p>
            </div>
        </div>
        <hr class="hr-laporan">
        <div class="card kartu-cetak">
            <div class="rm">
                <table border="1">
                    <tr style="height: 30px;font-weight: bold;">
                        <td>Tanggal </td>
                        <td style="width: 25px;"> :</td>
                        <td><?= date_format(new DateTime('today'), "d-m-Y") ?></td>
                    </tr>
                </table>
            </div>
            <div class="card-body">
                <h4 class="card-header">Data Pasien</h4>
                <table class="table" id="MyTable">
                    <thead>
                        <tr>
                            <th scope=" col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">No KTP</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">TTL</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">NO HP</th>
                            <th scope="col">Kota/Kabupaten</th>

                            <th scope="col">Desa/kelurahan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        <?php foreach ($pasien as $pasien) : ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $pasien['nama_pasien'] ?></td>
                                <td><?= $pasien['no_ktp'] ?></td>
                                <td><?= $pasien['jenis_kelamin'] ?></td>
                                <td><?= $pasien['ttl'] ?></td>
                                <td><?= $pasien['alamat'] ?></td>
                                <td><?= $pasien['no_hp'] ?></td>
                                <td><?= $pasien['kota/kabupaten'] ?></td>

                                <td><?= $pasien['desa/kelurahan'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

                <h4 class="card-header">Data Dokter</h4>
                <table class="table" id="MyTable">
                    <thead>
                        <tr>
                            <th scope=" col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Spesialis</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">TTL</th>
                            <th scope="col">NO HP</th>
                            <th scope="col">Email</th>
                            <th scope="col">Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        <?php foreach ($dokter as $dokter) : ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $dokter['nama_dokter'] ?></td>
                                <td><?= $dokter['spesialis'] ?></td>
                                <td><?= $dokter['jenis_kelamin_dokter'] ?></td>
                                <td><?= $dokter['ttl'] ?></td>
                                <td><?= $dokter['no_hp_dokter'] ?></td>
                                <td><?= $dokter['email'] ?></td>
                                <td><?= $dokter['alamat'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

                <h4 class="card-header">Data Obat</h4>
                <table class="table" id="MyTable">
                    <thead>
                        <tr>
                            <th scope=" col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Obat</th>
                            <th scope="col">Sediaan</th>
                            <th scope="col">Dosis Anak</th>
                            <th scope="col">Dosis Dewasa</th>
                            <th scope="col">STOK</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        <?php foreach ($obat as $obat) : ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $obat['nama_obat'] ?></td>
                                <td><?= $obat['jenis_obat'] ?></td>
                                <td><?= $obat['sediaan'] ?></td>
                                <td><?= $obat['dosis_anak'] ?></td>
                                <td><?= $obat['dosis_dewasa'] ?></td>
                                <td><?= $obat['stok'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

                <h4 class="card-header">Data Rekam Medis</h4>
                <table class="table" id="MyTable">
                    <thead>
                        <tr>
                            <th scope=" col">#</th>
                            <th scope="col">NO Rekam Medis</th>
                            <th scope="col">Nama Pasien</th>
                            <th scope="col">Keluhan</th>
                            <th scope="col">Anamnese/Diagnosa</th>
                            <th scope="col">Nama Dokter</th>
                            <th scope="col">Nama Obat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        <?php foreach ($rekam_medis as $rekam_medis) : ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $rekam_medis['no_rekam_medis'] ?></td>
                                <td><?= $rekam_medis['nama_pasien'] ?></td>
                                <td><?= $rekam_medis['keluhan'] ?></td>
                                <td><?= $rekam_medis['anamnese/diagnosa'] ?></td>
                                <td><?= $rekam_medis['nama_dokter'] ?></td>
                                <td><?= $rekam_medis['nama_obat'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <footer>&nbsp;</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script>
        window.print();
    </script>
</body>


</html>