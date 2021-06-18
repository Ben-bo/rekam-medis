<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<?php if (session('hak_akses') !== 'admin') : ?>
    <h1>Konten hanya bisa diakses oleh admin</h1>
    <?php return 0 ?>
<?php endif ?>
<div id="konten">
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body">
                    <form action="/dokter/add_data/" method="post">
                        <div class="row ">
                            <div class="col-12 d-flex justify-content-center">
                                <div class="card border-success mb-3" style="width: 40rem;">
                                    <div class="card-body ">
                                        <h5 class="card-header mb-2 bg-success text-white text-center">Data Detail Dokter</h5>
                                        <table class="table">
                                            <div class="d-flex justify-content-center mb-3">
                                                <img src="/assets/img/<?= $dokter['foto'] ?>" alt="" id="img-preview" class="img-thumbnail rounded-circle img-preview foto">
                                            </div>
                                            <tr>
                                                <td>Nama Dokter</td>
                                                <td>:</td>
                                                <td><?= $dokter['nama_dokter'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Spesialis</td>
                                                <td>:</td>
                                                <td><?= $dokter['spesialis'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Bertugas pada poli</td>
                                                <td>:</td>
                                                <td><?= $dokter['nama_poli'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td>:</td>
                                                <td><?= $dokter['jenis_kelamin_dokter'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tempat Tanggal Lahir</td>
                                                <td>:</td>
                                                <td><?= $dokter['ttl'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>No HP</td>
                                                <td>:</td>
                                                <td><?= $dokter['no_hp_dokter'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>:</td>
                                                <td><?= $dokter['email'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td><?= $dokter['alamat'] ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <a href="/dokter/form_ubah/<?= $dokter['id_dokter'] ?>/" class="btn btn-success text-white"><i class="fas fa-edit"></i> Edit</a>
                                <div style="width: 5px;"></div>
                                <a onclick="return confirm('yakin ingin hapus.?')" href="/dokter/hapus/<?= $dokter['id_dokter']; ?>/" class="btn btn-danger text-white"><i class="fas fa-trash-alt"></i></a>
                                <div style="width: 5px;"></div>
                                <a href="/dokter/" class="btn btn-primary text-white">Kembali</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>
</div>
<?= $this->endSection() ?>