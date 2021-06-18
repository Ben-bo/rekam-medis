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
                    <h5 class="card-header mb-2 bg-success text-white">Data User</h5>
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama User</th>
                                <th scope="col">Email</th>
                                <th scope="col">Hak Akses</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($users as $users) : ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><img src="/assets/img/<?= $users['foto'] ?>" class="rounded-circle img-thumbnail" style="width: 50px; overFlow: hidden;"></td>
                                    <td><?= $users['nama_users'] ?></td>
                                    <td><?= $users['email'] ?></td>
                                    <td><?= $users['hak_akses'] ?></td>
                                    <td>
                                        <a href="/users/form_ubah/<?= $users['id_users']; ?>/" class="btn btn-success text-white"><i class="fas fa-edit"></i></a>
                                        <a onclick="return confirm('yakin ingin hapus.?')" href="/users/hapus/<?= $users['id_users']; ?>/" class="btn btn-danger text-white"><i class="fas fa-trash-alt"></i></a>

                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <a href="/users/form_users/" class="btn btn-success text-white"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>
            </div>

        </div>

    </div>
</div>
<?= $this->endSection() ?>