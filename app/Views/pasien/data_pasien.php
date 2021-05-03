<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div id="konten">
    <div class="row">
        <div class="col-12">
            <?php if (session()->GetFlashdata('pesan')) : ?>
                <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                    <strong><?= session()->getFlashdata('pesan') ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-header mb-2 bg-success text-white">Data Pasien</h5>
                    <table class="table table-hover " id="mytable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Pasien</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">No Hp</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($pasien as $pasien) : ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $pasien['nama_pasien'] ?></td>
                                    <td><?= $pasien['jenis_kelamin'] ?></td>
                                    <td><?= $pasien['no_hp'] ?></td>
                                    <td><?= $pasien['alamat'] ?></td>
                                    <td>
                                        <a href="/pasien/detail/<?= $pasien['id_pasien']; ?>/" class="btn btn-success text-white"><i class="fas fa-info-circle"></i></a>
                                        <a onclick="return confirm('yakin ingin hapus.?')" href="/pasien/hapus/<?= $pasien['id_pasien']; ?>/" class="btn btn-danger text-white"><i class="fas fa-trash-alt"></i></a>
                                        <a href="/pasien/cetakKartu/<?= $pasien['id_pasien']; ?>/" class="btn btn-outline-success " style="" type="button"><i class="fas fa-print"></i></a>

                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <a href="/pasien/form_pasien/" class="btn btn-success text-white"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>
            </div>

        </div>

    </div>
</div>
<?= $this->endSection() ?>