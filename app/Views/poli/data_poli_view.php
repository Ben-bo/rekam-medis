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
                    <h5 class="card-header mb-2 bg-success text-white">Form Input data</h5>
                    <form action="/poli/add_data" method="post">
                        <div class="mb-3">
                            <label for="nama_poli" class="form-label">Nama Poli</label>
                            <input type="text" class="form-control" id="nama_poli" name="nama_poli" placeholder="Nama Poli...">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi_poli" class="form-label">Deskripsi Poli</label>
                            <textarea class="form-control" id="deskripsi_poli" name="deskripsi_poli" rows="3"></textarea>
                        </div>
                        <button class="btn btn-success" type="submit"><i class="fas fa-plus"></i> Simpan</button>
                    </form>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-header mb-2 bg-success text-white">Data Poli</h5>
                    <table class="table table-hover" id="mytable">
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
                                    <td style="width: 550px;text-align: justify;"><?= $poli['deskripsi_poli'] ?></td>
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