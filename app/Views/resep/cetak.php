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
                <h2 class=" text-center mb-5 text-muted"> Resep / Terapi Pasien </h2>
                <div class="rm">
                    <table border="1">
                        <tr style="height: 30px;font-weight: bold;">
                            <td> NO.RM</td>
                            <td style="width: 25px;"> :</td>
                            <td><?= $cetak['no_rekam_medis'] ?></td>
                        </tr>
                    </table>
                    <table border="1">
                        <tr style="height: 30px;font-weight: bold;">
                            <td>Tanggal Pemeriksaan</td>
                            <td style="width: 25px;"> :</td>
                            <td><?= date_format(new DateTime($cetak['created_at']), "d-m-Y") ?></td>
                        </tr>
                    </table>
                </div>
                <table class="table mt-3">
                    <tr>

                    </tr>
                    <tr>
                        <td>Nama Pasien</td>
                        <td>:</td>
                        <td><?= $cetak['nama_pasien'] ?></td>
                    </tr>
                    <tr>
                        <td>Diagnosa</td>
                        <td>:</td>
                        <td><?= $cetak['diagnosa'] ?></td>
                    </tr>
                    <tr>
                        <td>Obat</td>
                        <td>:</td>
                        <td><?= $cetak['obat'] ?></td>
                    </tr>
                </table>
                <table class="table mt-3">
                    <tr>
                        <td colspan="3" class="text-center">
                            <h4>RESEP/TERAPI</h4>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $cetak['resep'] ?></td>
                    </tr>
                </table>
                <table class="mt-5">
                    <tr>
                        <td>Dokter Pemeriksa</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: underline; font-weight: bold;">( <?= $cetak['dokter'] ?> )</td>
                    </tr>
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