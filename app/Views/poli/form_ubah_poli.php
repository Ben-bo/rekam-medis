<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<?php if (session('hak_akses') !== 'admin') : ?>
    <h1>Konten hanya bisa diakses oleh admin</h1>
    <?php return 0 ?>
<?php endif ?>
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
                    <h5 class="card-header mb-2 bg-success text-white">Form Input data</h5>
                    <form action="/poli/ubahData/<?= $poliPersonel['id_poli'] ?>" method="post">
                        <div class="mb-3">
                            <label for="nama_poli" class="form-label">Nama Poli</label>
                            <input type="text" class="form-control <?= ($validation->hasError('nama_poli')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="nama_poli" <?= ($validation->hasError('nama_poli')) ? 'autofocus' : ''; ?> value="<?= (old('nama_poli')) ? old('nama_poli') : $poliPersonel['nama_poli']; ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('nama_poli'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi_poli" class="form-label">Nama Poli</label>
                            <textarea type="text" class="form-control <?= ($validation->hasError('deskripsi_poli')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="deskripsi_poli" <?= ($validation->hasError('deskripsi_poli')) ? 'autofocus' : ''; ?>><?= (old('deskripsi_poli')) ? old('deskripsi_poli') : $poliPersonel['deskripsi_poli']; ?></textarea>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('deskripsi_poli'); ?>
                            </div>
                        </div>
                        <button class="btn btn-success" type="submit"><i class="fas fa-plus"></i> Simpan</button>
                    </form>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-header mb-2 bg-success text-white">Data Poli</h5>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Poli</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($poli as $poli) : ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td style="width: 200px;"><?= $poli['nama_poli'] ?></td>
                                    <td style="width: 650px;text-align: justify;"><?= $poli['deskripsi_poli'] ?></td>
                                    <td>
                                        <a href="/poli/form_ubah/<?= $poli['id_poli']; ?>/" class="btn btn-success text-white"><i class="fas fa-edit"></i></a>
                                        <a onclick="return confirm('yakin ingin hapus.?')" href="/poli/hapus/<?= $poli['id_poli']; ?>/" class="btn btn-danger text-white"><i class="fas fa-trash-alt"></i></a>
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