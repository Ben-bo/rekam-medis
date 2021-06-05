<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Hello, world!</title>
</head>

<body class="d-flex justify-content-center">
    <div class="card mt-5" style="width: 35rem;">
        <div class="card-body">
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
            <table class="table">

                <tr>
                    <td>No Rekam Medis</td>
                    <td>:</td>
                    <td>RM000<?= $pasien['id_pasien'] ?></td>
                </tr>
                <tr>
                    <td>Nama Pasien</td>
                    <td>:</td>
                    <td><?= $pasien['nama_pasien'] ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?= $pasien['jenis_kelamin'] ?></td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td>:</td>
                    <td><?= $umur ?></td>
                </tr>
                <tr>
                    <td>TTL</td>
                    <td>:</td>
                    <td><?= $pasien['ttl'] ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?= $pasien['alamat'] ?></td>
                </tr>
            </table>
            <p class="text-muted text-center">SETIAP BEROBAT KARTU INI WAJIB DIBAWA</p>
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script>
        window.print()
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>