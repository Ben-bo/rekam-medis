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
                    <a href="/resep/buatResep" class="btn btn-success my-2"><i class="fas fa-plus"></i> Buat Resep Baru</a>
                    <h5 class="card-header mb-2 bg-success text-white">Data Resep</h5>
                    <table class="table table-hover" id="mytable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">NO.RM</th>
                                <th scope="col">Pasien</th>
                                <th scope="col">Diagnosa</th>
                                <th scope="col">Resep</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($resep as $resep) : ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><b><?= date_format(new DateTime('today'), 'Y-m-d') == $resep['created_at'] ? 'Hari ini' : $resep['created_at'] ?></b></td>
                                    <td><?= $resep['no_rekam_medis'] ?></td>
                                    <td><?= $resep['nama_pasien'] ?></td>
                                    <td><?= $resep['diagnosa'] ?></td>
                                    <td><?= $resep['resep'] ?></td>
                                    <td>
                                        <a href="/resep/cetak/<?= $resep['id_resep']; ?>/" class="btn btn-success text-white"><i class="fas fa-print"></i></a>
                                        <a href="/resep/form_ubah/<?= $resep['id_resep']; ?>/" class="btn btn-success text-white"><i class="fas fa-edit"></i> Ubah</a>
                                        <a onclick="return confirm('yakin ingin hapus.?')" href="/resep/hapus/<?= $resep['id_resep']; ?>/" class="btn btn-danger text-white"><i class="fas fa-trash-alt"></i></a>
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
<?= $this->endSection() ?>