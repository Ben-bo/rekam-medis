<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div id="konten">
    <?php if (session('hak_akses') !== 'admin' && session('hak_akses') !== 'pendaftaran') : ?>
        <h1>Konten hanya bisa diakses oleh admin dan bagian pendaftaran</h1>
        <?php return 0 ?>
    <?php endif ?>
    <div class="row">
        <div class="col-12">
            <?php if (session()->GetFlashdata('pesan')) : ?>
                <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                    <strong><?= session()->getFlashdata('pesan') ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>
            <div class="card mt-3">
                <h3 class="card-header mb-2 bg-success text-white text-center">BACKUP DATA</h3>
                <div class="card-body">
                    <form action="/backup/filterData/" method="post">
                        <div class="row">
                            <div class="col-6">

                            </div>
                            <div class="col-4">
                                <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="tanggal">
                            </div>
                            <div class="col-2">
                                <input type="submit" class="btn btn-success" value="Filter">
                                <a href="/backup/pasienBackup" class="btn btn-success">Reset</a>
                            </div>

                        </div>
                    </form>
                    <div class="card mt-3">
                        <div class="card-body">
                            <form action="<?php if ($tahun == true) {
                                                echo '/backup/export/' . $tahun . '';
                                            } else {
                                                echo '/backup/export';
                                            }
                                            ?>" method="post">
                                <button type="submit" class="btn btn-success mb-2">Export</button>
                            </form>
                            <h5 class="card-header mb-2 bg-success text-white">Data Pasien</h5>
                            <table class="table table-hover " id="mytable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Nama Pasien</th>
                                        <th scope="col">No rekam Medis</th>
                                        <th scope="col">No Hp</th>
                                        <th scope="col">NIK</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($pasien as $pasien) : ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><b><?= date_format(new DateTime('today'), 'Y-m-d') == $pasien['created_at_pasien'] ? 'Hari ini' : $pasien['created_at_pasien'] ?></b></td>
                                            <td><?= $pasien['nama_pasien'] ?></td>
                                            <td>RM000<?= $pasien['id_pasien'] ?></td>
                                            <td><?= $pasien['no_hp'] ?></td>
                                            <td><?= $pasien['no_ktp'] ?></td>
                                            <td>
                                                <a href="/pasien/detail/<?= $pasien['id_pasien']; ?>/" class="btn btn-success text-white"><i class="fas fa-info-circle"></i></a>
                                                <a onclick="return confirm('yakin ingin hapus.?')" href="/pasien/hapus/<?= $pasien['id_pasien']; ?>/" class="btn btn-danger text-white"><i class="fas fa-trash-alt"></i></a>
                                                <a href="/pasien/cetakKartu/<?= $pasien['id_pasien']; ?>/" class="btn btn-outline-success " style="" type="button"><i class="fas fa-print"></i></a>

                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>