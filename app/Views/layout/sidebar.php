<aside class="col-xs-12 col-md-3 col-lg-2  bg-light shadow" id="sidebar">
    <nav class="navbar navbar-expand-md navbar-light bg-light flex-md-column flex-row align-items-center sticky-top" id="sidebar">
        <a href="/" class="navbar-brand  font-weight-bold text-nowrap"> Rekam Medis </a>
        <div class="text-center ml-2">
            <a href="/">
                <img src="/assets/img/icon-rs.png" class="img-fluid rounded-circle my-4 d-none d-md-block" alt="" style="width: 130px;">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse order-last " id="nav">
            <ul class="navbar-nav flex-column w-100 ">
                <span class="side-header">Main Menu</span>
                <hr class="dropdown-divider">
                <li class="nav-item ">
                    <a href="/" class="nav-link active"><i class="fas fa-home"></i> HOME</a>
                </li>
                <?php if (session('hak_akses') ==  'petugas_medis') : ?>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-injured"></i> Pasien
                        </a>
                        <ul class="dropdown-menu shadow" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/pasien/form_pasien/"><i class="fas fa-plus-square"></i> Pendaftaran Pasien</a></li>
                            <li><a class="dropdown-item" href="/pasien/"><i class="fas fa-file-alt"></i> Data Pasien</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (session('hak_akses') == 'admin') : ?>
                    <li class="nav-item">
                        <a href="/dokter/" class="nav-link"><i class="fas fa-user-nurse"></i> Data Dokter</a>
                    </li>
                    <li class="nav-item">
                        <a href="/obat/" class="nav-link"><i class="fas fa-pills"></i> Data Obat</a>
                    </li>
                    <li class="nav-item">
                        <a href="/poli/" class="nav-link"><i class="fas fa-hand-holding-medical"></i> Data Poli</a>
                    </li>
                <?php endif; ?>
                <?php if (session('hak_akses') == 'petugas_medis') : ?>
                    <li class="nav-item">
                        <a href="/rekam_medis/" class="nav-link"><i class="fas fa-file-medical-alt"></i> Rekam Medis</a>
                    </li>
                    <li class="nav-item">
                        <a href="/kunjungan/" class="nav-link"><i class="fas fa-file-medical-alt"></i> Kunjungan</a>
                    </li>
                    <li class="nav-item">
                        <a href="/resep/" class="nav-link"><i class="fas fa-receipt"></i> Resep</a>
                    </li>
                <?php endif; ?>
                <?php if (session('hak_akses') == 'admin') : ?>
                    <li class="nav-item">
                        <a href="/laporan/" class="nav-link"><i class="fas fa-file"></i> Laporan</a>
                    </li>
                    <li class="nav-item">
                        <a href="/users/" class="nav-link"><i class="fas fa-users"></i> Users</a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>


    </nav>

</aside>