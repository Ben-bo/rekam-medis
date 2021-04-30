<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <form action="/testing/" method="post" id="myform">
        <div style="width: 200px;" class="my-5 mx-5">
            <select class="form-select" aria-label="Default select example" name="pasien" onchange="change()">
                <option value="" hidden>PILIH</option>
                <?php if ($norm) : ?>
                    <?php foreach ($pasien as $row) : ?>
                        <?php if ($rm['id_pasien'] == $row['id_pasien']) : ?>
                            <option value="<?= $row['id_pasien']; ?>" selected><?= $row['nama_pasien']; ?></option>
                        <?php else : ?>
                            <option value="<?= $row['id_pasien'] ?>"><?= $row['nama_pasien']; ?></option>
                        <?php endif ?>
                    <?php endforeach; ?>
                <?php else : ?>

                    <?php foreach ($pasien as $row) : ?>
                        <option value="<?php echo $row['id_pasien']; ?>"><?php echo $row['nama_pasien']; ?></option>
                    <?php endforeach; ?>
                <?php endif ?>
            </select>
        </div>
        <div style="width: 200px;" class="my-5 mx-5">
            <select class="form-select" aria-label="Default select example" name="no_rekam_medis">
                <option selected hidden>pilih data</option>
                <?php if ($norm) : ?>
                    <?php foreach ($norm as $row) : ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['no_rekam_medis']; ?></option>
                    <?php endforeach; ?>
                <?php else : ?>
                    <option value="" selected hidden>Tidak ada data</option>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <p>Pilih Dokter</p>
                    </div>
                <?php endif ?>
            </select>
        </div>
        <div style="width: 200px;" class="my-5 mx-5">
            <input type="submit" class="btn btn-success" value="Filter">
        </div>
    </form>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script>
        function change() {
            document.getElementById("myform").submit();
        }
    </script>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>