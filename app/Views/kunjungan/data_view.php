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
                    <h5 class="card-header mb-2 bg-success text-white">Data Obat</h5>
                    <table class="table table-hover" id="mytable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No rekam Medis</th>
                                <th scope="col">Nama Pasien</th>
                                <th scope="col">Poli</th>
                                <th scope="col">Keluhan</th>

                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($kunjungan as $kunjungan) : ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td>RM000<?= $kunjungan['id_pasien'] ?></td>
                                    <td><?= $kunjungan['nama_pasien'] ?></td>
                                    <td><?= $kunjungan['nama_poli'] ?></td>
                                    <td><?= $kunjungan['keluhan'] ?></td>

                                    <td>
                                        <a href="/kunjungan/form_ubah/<?= $kunjungan['id_kunjungan']; ?>/" class="btn btn-success text-white"><i class="fas fa-edit"></i></a>
                                        <a onclick="return confirm('yakin ingin hapus.?')" href="/kunjungan/hapus/<?= $kunjungan['id_kunjungan']; ?>/" class="btn btn-danger text-white"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <a href="/kunjungan/form_kunjungan/" class="btn btn-success text-white"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>
            </div>

        </div>

    </div>
</div>
<?= $this->endSection() ?>