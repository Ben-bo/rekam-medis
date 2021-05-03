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
                                <th scope="col">Nama Obat</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Sediaan</th>
                                <th scope="col">Dosis Anak</th>
                                <th scope="col">Dosis Dewasa</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($obat as $obat) : ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $obat['nama_obat'] ?></td>
                                    <td><?= $obat['jenis_obat'] ?></td>
                                    <td><?= $obat['sediaan'] ?></td>
                                    <td><?= $obat['dosis_anak'] ?></td>
                                    <td><?= $obat['dosis_dewasa'] ?></td>
                                    <td><?= $obat['stok'] ?></td>
                                    <td>
                                        <a href="/obat/form_ubah/<?= $obat['id_obat']; ?>/" class="btn btn-success text-white"><i class="fas fa-edit"></i></a>
                                        <a onclick="return confirm('yakin ingin hapus.?')" href="/obat/hapus/<?= $obat['id_obat']; ?>/" class="btn btn-danger text-white"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <a href="/obat/form_obat/" class="btn btn-success text-white"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>
            </div>

        </div>

    </div>
</div>
<?= $this->endSection() ?>