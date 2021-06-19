<div class="row">
    <div class="col-sm-12 col-md-12">
        <article>
            <nav class="navbar navbar-light bg-light shadow-sm ">
                <div class="container-fluid ">
                    <h5>Klinik Kesehatan</h5>

                    <span class="navbar-text">
                        <li class="nav-item dropdown " style="list-style: none;">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-injured"></i> Backup
                            </a>
                            <ul class="dropdown-menu shadow" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/backup/pasienBackup/"><i class="fas fa-plus-square"></i> Export Pasien</a></li>
                                <li><a class="dropdown-item" href="/backup/importPasien/"><i class="fas fa-plus-square"></i> Import Pasien</a></li>

                            </ul>
                        </li>
                    </span>
                    <span class="navbar-text">
                        <li class="nav-item dropdown" style="list-style: none;">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="/assets/img/<?= session('foto') ?>" alt="" style="width: 20px;" class="img-fluid rounded-circle"> <?= strtoupper(session('nama_users')) ?>
                            </a>
                            <ul class="dropdown-menu shadow" aria-labelledby="navbarDropdown">
                                <li class="px-3 bg-info"><span>Level : </span><?= ucfirst(session('hak_akses')) ?></li>
                                <hr>
                                <li class="bg-danger"><a class="dropdown-item" href="/login/logout"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </span>
                </div>
            </nav>
        </article>
    </div>
</div>