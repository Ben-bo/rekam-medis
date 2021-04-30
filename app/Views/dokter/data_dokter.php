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
                    <h5 class="card-header mb-2 bg-success text-white">Data Dokter</h5>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Dokter</th>
                                <th scope="col">Spesialis</th>
                                <th scope="col">Poli</th>
                                <th scope="col">jenis kelamin</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($dokter as $dokter) : ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $dokter['nama_dokter'] ?></td>
                                    <td><?= $dokter['spesialis'] ?></td>
                                    <td><?= $dokter['nama_poli'] ?></td>
                                    <td><?= $dokter['jenis_kelamin_dokter'] ?></td>
                                    <td><?= $dokter['no_hp_dokter'] ?></td>
                                    <td>
                                        <a href="/dokter/detail/<?= $dokter['id_dokter']; ?>/" class="btn btn-success text-white"><i class="fas fa-info-circle"></i></a>
                                        <a onclick="return confirm('yakin ingin hapus.?')" href="/dokter/hapus/<?= $dokter['id_dokter']; ?>/" class="btn btn-danger text-white"><i class="fas fa-trash-alt"></i></a>

                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <a href="/dokter/form_dokter/" class="btn btn-success text-white"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>
            </div>

        </div>

    </div>
</div>
<?= $this->endSection() ?>