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

    <title><?= $judul ?></title>

</head>

<body>
    <div class="container-fluid">
        <div class="row min-vh-100 flex-column flex-md-row">

            <?= $this->include('layout/sidebar') ?>
            <main class=" col-md-9 col-lg-9 flex-grow-1">
                <div class="container py-3">
                    <?= $this->include('layout/navbar') ?>
                    <?= $this->renderSection('content') ?>
                </div>
            </main>

        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <!-- file sampul preview -->
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#img-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#foto").change(function() {
            readURL(this);
        });
    </script>
    <script>
        function change() {
            document.getElementById("myform").submit();
        }
    </script>

</body>

</html>