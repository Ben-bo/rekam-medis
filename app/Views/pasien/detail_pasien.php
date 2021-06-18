<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div id="konten">
    <?php if (session('hak_akses') !== 'admin' && session('hak_akses') !== 'pendaftaran') : ?>
        <h1>Konten hanya bisa diakses oleh admin dan bagian pendaftaran</h1>
        <?php return 0 ?>
    <?php endif ?>
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body">
                    <form action="/pasien/add_data/" method="post">
                        <div class="row ">
                            <div class="col-12 d-flex justify-content-center">
                                <div class="card border-success mb-3" style="width: 40rem;">
                                    <div class="card-body ">
                                        <h5 class="card-header mb-2 bg-success text-white text-center">Data Detail Pasien</h5>
                                        <table class="table">
                                            <tr>
                                                <td>Nama Pasien</td>
                                                <td>:</td>
                                                <td><?= $pasien['nama_pasien'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td>:</td>
                                                <td><?= $pasien['jenis_kelamin'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Agama</td>
                                                <td>:</td>
                                                <td><?= $pasien['agama'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Pendidikan Terakhir</td>
                                                <td>:</td>
                                                <td><?= $pasien['pendidikan_terakhir'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Status Perkawinan</td>
                                                <td>:</td>
                                                <td><?= $pasien['status_perkawinan'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Pekerjaan</td>
                                                <td>:</td>
                                                <td><?= $pasien['pekerjaan'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>No HP</td>
                                                <td>:</td>
                                                <td><?= $pasien['no_hp'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>No KTP</td>
                                                <td>:</td>
                                                <td><?= $pasien['no_ktp'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tempat Tanggal Lahir</td>
                                                <td>:</td>
                                                <td><?= $pasien['ttl'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td><?= $pasien['alamat'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kota/Kabupaten</td>
                                                <td>:</td>
                                                <td><?= $pasien['kota/kabupaten'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Desa/Kelurahan</td>
                                                <td>:</td>
                                                <td><?= $pasien['desa/kelurahan'] ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <a href="/pasien/form_ubah/<?= $pasien['id_pasien'] ?>" class="btn btn-success text-white"><i class="fas fa-edit"></i> Edit</a>
                                <div style="width: 5px;"></div>
                                <a onclick="return confirm('yakin ingin hapus.?')" href="/pasien/hapus/<?= $pasien['id_pasien']; ?>/" class="btn btn-danger text-white"><i class="fas fa-trash-alt"></i></a>
                                <div style="width: 5px;"></div>
                                <a href="/pasien/" class="btn btn-primary text-white">Kembali</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>
</div>
<?= $this->endSection() ?>