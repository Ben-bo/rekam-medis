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
    <?php if (session('hak_akses') !== 'admin' && session('hak_akses') !== 'rekam_medis') : ?>
        <h1>Konten hanya bisa diakses oleh admin dan bagian rekam medis</h1>
        <?php return 0 ?>
    <?php endif ?>
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
            <div class="card-body">
                <h2 class=" text-center mb-3 text-muted"> LAPORAN REKAM MEDIS PASIEN </h2>
                <hr style="border: solid 1px grey;">
                <hr>
                <div class="row">
                    <div class="col-6">
                        <table class="table table-bordered">
                            <tr>
                                <td>No Rekam Medis</td>
                                <td>:</td>
                                <td><b>RM000<?= $pasien['id_pasien'] ?></b></td>
                            </tr>

                        </table>
                    </div>
                    <div class="col-6">
                        <table class="table table-bordered">
                            <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td><?= date_format(new DateTime('today'), 'd-m-Y') ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered">
                            <tr>
                                <td colspan="7" class="text-center">Data Lengkap</td>

                            </tr>
                            <tr>

                                <td>Nama</td>
                                <td>:</td>
                                <td><?= $pasien['nama_pasien'] ?></td>

                                <td>NoHp</td>
                                <td>:</td>
                                <td><?= $pasien['no_hp'] ?></td>
                            </tr>
                            <tr>

                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td><?= $pasien['jenis_kelamin'] ?></td>

                                <td>No KTP</td>
                                <td>:</td>
                                <td><?= $pasien['no_ktp'] ?></td>
                            </tr>
                            <tr>

                                <td>status pernikahan</td>
                                <td>:</td>
                                <td><?= $pasien['status_perkawinan'] ?></td>

                                <td>Pekerjaan</td>
                                <td>:</td>
                                <td><?= $pasien['pekerjaan'] ?></td>
                            </tr>
                            <tr>

                                <td>Alamat lengkap</td>
                                <td>:</td>
                                <td><?= $pasien['alamat'] ?>,<?= $pasien['desa/kelurahan'] ?>,<?= $pasien['kota/kabupaten'] ?></td>

                                <td>TTL</td>
                                <td>:</td>
                                <td><?= $pasien['ttl'] ?></td>
                            </tr>

                        </table>
                    </div>
                </div>
                <h5 class="card-header mb-2 bg-success text-center mt-3">RECORD MEDIS PASIEN</h5>
                <table class="table table-bordered " id="MyTable">
                    <thead>
                        <tr>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Keluhan</th>
                            <th scope="col">Diagnosa</th>
                            <th scope="col">Poli</th>
                            <th scope="col">Obat</th>
                            <th scope="col">Dokter</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($rekam_medis as $rekam_medis) : ?>
                            <tr>
                                <td><b><?= $rekam_medis['created_at_rm'] ?></b></td>
                                <td><?= $rekam_medis['keluhan'] ?></td>
                                <td><?= $rekam_medis['anamnese/diagnosa'] ?></td>
                                <td><?= $rekam_medis['nama_poli'] ?></td>
                                <td><?= $rekam_medis['id_obat'] ?></td>
                                <td><?= $rekam_medis['nama_dokter'] ?></td>
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