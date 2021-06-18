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
    <?php if (session('hak_akses') !== 'admin' && session('hak_akses') !== 'pendaftaran') : ?>
        <h1>Konten hanya bisa diakses oleh admin dan bagian pendaftaran</h1>
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
        <h3 class="text-center">LAPORAN KUNJUNGAN</h3>
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="text-center">Data Count :</h5>
                <hr style="border: 1px solid grey;">
                <div class="kontainer">
                    <div class="wrap">
                        <div class="wrapDalam">
                            <table class="table table-bordered">

                                <?php foreach ($pasienTotal as $data) : ?>
                                    <tr>
                                        <td><?= $data['nama_pasien'] ?></td>
                                        <td> : </td>
                                        <td><b><?= $data['total'] ?></b> KUNJUNGAN </td>
                                    </tr>
                                <?php endforeach ?>
                            </table>
                        </div>
                    </div>

                    <div class="wrapt">
                        <table class="table table-bordered">
                            <tr>
                                <td>Tanggal </td>
                                <td> : </td>
                                <td><?= date_format(new DateTime('today'), 'd-m-Y') ?> </td>
                            </tr>
                            <tr>
                                <td>TOTAL DATA</td>
                                <td> : </td>
                                <td><b><?= $kunjunganTotal ?></b> DATA </td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div class="card kartu-cetak">
            <div class="card-body">
                <h4 class="card-header">DATA KUNJUNGAN PASIEN</h4>
                <table class="table table-bordered" id="MyTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">No Rekam Medis</th>
                            <th scope="col">Nama Pasien</th>
                            <th scope="col">Poli</th>
                            <th scope="col">Keluhan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        <?php foreach ($kunjungan as $kunjungan) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $kunjungan['created_at_kunjungan'] ?></td>
                                <td>RM000<?= $kunjungan['id_pasien'] ?></td>
                                <td><?= $kunjungan['nama_pasien'] ?></td>
                                <td><?= $kunjungan['nama_poli'] ?></td>
                                <td><?= $kunjungan['keluhan'] ?></td>
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