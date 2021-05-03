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


    <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    <link rel="stylesheet" href="/assets/css/dataTables.bootstrap5.min.css">


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


    <!-- <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> -->

    <script src="/assets/js/jquery.dataTables.min.js"></script>
    <script src="/assets/js/dataTables.bootstrap5.min.js"></script>
    <!-- <script src="/assets/js/dataTables.bootstrap5.min"></script> -->

    <script type="text/javascript">
        $(document).ready(function() {
            $('#mytable').DataTable();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#poli').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo base_url('rekam_medis/callDokter'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {

                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].id_dokter + '>' + data[i].nama_dokter + '</option>';
                        }
                        $('#nama_dokter').html(html);

                    }
                });
                return false;
            });

        });
    </script>


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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#nama_pasien').select2({
                theme: 'bootstrap4',
            });
        });
    </script>



</body>

</html>