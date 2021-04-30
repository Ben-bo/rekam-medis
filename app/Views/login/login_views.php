<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/assets/img/favicon.ico" type="image/gif">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.css" integrity="sha512-f73UKwzP1Oia45eqHpHwzJtFLpvULbhVpEJfaWczo/ZCV5NWSnK4vLDnjTaMps28ocZ05RbI83k2RlQH92zy7A==" crossorigin="anonymous" />
    <link rel="stylesheet" href="/assets/css/style.css">

    <title>Hello, world!</title>
</head>

<body>
    <div class=" d-flex align-items-center justify-content-center vh-100">

        <div class="card kartu-login shadow px-5 py-5" style="width: 30rem; height:30rem;">
            <?php if (session()->GetFlashdata('msg')) : ?>
                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                    <strong><?= session()->getFlashdata('msg') ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>
            <div class="card-body">
                <h5 class="card-header bg-success text-center text-white mb-5">FORM LOGIN</h5>
                <form action="/login/login/" method="post">
                    <div class="mb-3">
                        <i class="fas fa-user"></i> <label for="exampleFormControlInput1" class="form-label">Username</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_users" value="<?= set_value('nama_users') ?>">
                    </div>
                    <div class="mb-3">
                        <i class="fas fa-lock"></i> <label for="exampleFormControlInput2" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleFormControlInput2" name="password">
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-sign-in-alt"></i> Login</button>
                    <hr>
                    <p class="text-muted"> Belum Punya akun.? Silahkan kontak Admin untuk membuat Akun baru</p>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>