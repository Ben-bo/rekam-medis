<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div id="konten">
    <div class="row" id="baris">
        <div class="jumbotron jumbotron-fluid mt-3">
            <div class="container bg-light shadow-sm p-3">
                <h1 class="display-4 text-center">Helo <?= session('nama_users') ?></h1>
                <p class="lead text-center">saat ini anda sedang login sebagai <strong> <?= strtoupper(session('hak_akses')) ?></strong></p>

            </div>
        </div>
        <?php if (session('hak_akses') == 'petugas_medis') : ?>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="mt-5 bg-light py-3 konten-card">
                    <div class="row">
                        <div class="col-4 col-sm-4 col-md-4 col-lg-4 text-muted">
                            <div class="container-fluid">
                                <a href="/pasien/">
                                    <i class="fas fa-user-injured fa-4x text-success"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-8 col-sm-8 col-md-8 col-lg-8">
                            <div class="container-fluid">
                                <a href="/pasien/">
                                    <h4 class="">Data Pasien</h4>
                                    <h4 class="text-success"><?= $pasien ?></h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 ">
                <div class="mt-5 bg-light py-3 konten-card">
                    <div class="row">
                        <div class="col-4  text-muted">
                            <div class="container-fluid">
                                <a href="/rekam_medis/">

                                    <i class="fas fa-file-medical-alt fa-4x text-success"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="container-fluid">
                                <a href="/rekam_medis/">
                                    <h4 class="">Rekam Medis</h4>
                                    <h4 class="text-success"><?= $rekam_medis ?></h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 ">
                <div class="mt-5 bg-light py-3 konten-card">
                    <div class="row">
                        <div class="col-4  text-muted">
                            <div class="container-fluid">
                                <a href="/obat/">
                                    <i class="fas fa-receipt fa-4x text-success"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="container-fluid">
                                <a href="/poli/">
                                    <h4 class="">Resep</h4>
                                    <h4 class="text-success"><?= $resep ?></h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <?php if (session('hak_akses') === 'admin') : ?>
            <div class="col-sm-12 col-md-6 col-lg-4 ">
                <div class="mt-5 bg-light py-3 konten-card">
                    <div class="row">
                        <div class="col-4  text-muted">
                            <div class="container-fluid">
                                <a href="/dokter/">
                                    <i class="fas fa-user-nurse fa-4x text-success"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="container-fluid">
                                <a href="/dokter/">
                                    <h4 class=""> Dokter</h4>
                                    <h4 class="text-success"><?= $dokter ?></h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 ">
                <div class="mt-5 bg-light py-3 konten-card">
                    <div class="row">
                        <div class="col-4  text-muted">
                            <div class="container-fluid">
                                <a href="/obat/">
                                    <i class="fas fa-pills fa-4x text-success"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="container-fluid">
                                <a href="/obat/">
                                    <h4 class="">Obat</h4>
                                    <h4 class="text-success"><?= $obat ?></h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 ">
                <div class="mt-5 bg-light py-3 konten-card">
                    <div class="row">
                        <div class="col-4  text-muted">
                            <div class="container-fluid">
                                <a href="/obat/">
                                    <i class="fas fa-hand-holding-medical fa-4x text-success"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="container-fluid">
                                <a href="/poli/">
                                    <h4 class="">Poli</h4>
                                    <h4 class="text-success"><?= $poli ?></h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif ?>
    </div>
    <hr class="mt-4">
    <div class="row" id="baris">
        <?php if (session('hak_akses') == 'petugas_medis') : ?>
            <div class="col-sm-12 col-md-6 col-lg-4 ">
                <div class="mt-2 bg-light py-3 konten-card">
                    <div class="row">
                        <div class="col-4  text-muted">
                            <div class="container-fluid">
                                <a href="/pasien/form_pasien/">
                                    <i class="fas fa-plus-square fa-4x text-success"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="container-fluid">
                                <a href="/pasien/form_pasien/">
                                    <h4 class="">Pendaftaran Pasien</h4>
                                    <h6 class="text-muted">Form Pendaftaran Pasien, Klik jika ingin menambahkan data pasien baru</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <?php if (session('hak_akses') == 'admin') : ?>
            <div class="col-sm-12 col-md-6 col-lg-4 ">
                <div class="mt-2 bg-light py-3 konten-card">
                    <div class="row">
                        <div class="col-4  text-muted">
                            <div class="container-fluid">
                                <a href="/dokter/form_dokter/">
                                    <i class="fas fa-file fa-4x text-success"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="container-fluid">
                                <a href="/laporan">
                                    <h4 class="">Laporan</h4>
                                    <h6 class="text-muted">Buat Laporan Bulanan Aplikasi Rekam Medis</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 ">
                <div class="mt-2 bg-light py-3 konten-card">
                    <div class="row">
                        <div class="col-4  text-muted">
                            <div class="container-fluid">
                                <a href="/obat/form_obat/">
                                    <i class="fas fa-users fa-4x text-success"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="container-fluid">
                                <a href="/users">
                                    <h4 class="">User</h4>
                                    <h6 class="text-muted">Kelola Data User atau buat Akun baru</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </div>
</div>

<?= $this->endSection() ?>