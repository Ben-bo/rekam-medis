<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div id="konten">
    <?php if (session('hak_akses') !== 'admin' && session('hak_akses') !== 'rekam_medis') : ?>
        <h1>Konten hanya bisa diakses oleh admin dan bagian rekam medis</h1>
        <?php return 0 ?>
    <?php endif ?>
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body">
                    <?php if (session()->GetFlashdata('pesanResep')) : ?>
                        <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                            <strong><?= session()->getFlashdata('pesanResep') ?></strong> <i class="fas fa-receipt"></i>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
                    <div class="row mb-2">
                        <div class="col-12 d-flex justify-content-center">
                            <a href="/rekam_medis/form_ubah/<?= $rekam_medis['id'] ?>/<?= $rekam_medis['id_pasien'] ?>" class="btn btn-success text-white"><i class="fas fa-edit"></i> Edit</a>
                            <div style="width: 5px;"></div>
                            <a href="/rekam_medis/cetak/<?= $rekam_medis['id']; ?>/<?= $rekam_medis['id_pasien'] ?>" class="btn btn-outline-success " style="" type="button"><i class="fas fa-print"></i></a>
                            <div style="width: 5px;"></div>
                            <a href="/resep/resep/<?= $rekam_medis['id']; ?>/" class="btn btn-success text-white"><i class="fas fa-receipt"></i> Buat Resep</a>
                            <div style="width: 5px;"></div>
                            <a href="/rekam_medis/" class="btn btn-primary text-white">Kembali</a>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-12">
                            <div class="card border-success mb-3">
                                <div class="card-body ">
                                    <h5 class="card-header mb-2 bg-success text-white text-center">CATATAN REKAM MEDIS PASIEN</h5>
                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="text-center mt-3">No.RM : RM000<?= $rekam_medis['no_rekam_medis'] ?></h5>
                                        </div>
                                        <div class="col-6">
                                            <h6 class=" text-center mt-3">Tgl : <?= $rekam_medis['created_at_rm'] ?></h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6">
                                            <table class="table">
                                                <tr>
                                                    <td>Nama Pasien</td>
                                                    <td>:</td>
                                                    <td><?= $rekam_medis['nama_pasien'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Jenis Kelamin</td>
                                                    <td>:</td>
                                                    <td><?= $rekam_medis['jenis_kelamin'] ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-6">
                                            <table class="table">
                                                <tr>
                                                    <td>No HP</td>
                                                    <td>:</td>
                                                    <td><?= $rekam_medis['no_hp'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>:</td>
                                                    <td><?= $rekam_medis['alamat'] ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <h5 class="card-header mb-2 bg-success text-white mt-4">Riwayat Medis Pasien</h5>
                                    <table class="table table-hover " id="MyTable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Keluhan</th>
                                                <th scope="col">Anamnese/Diagnosa</th>
                                                <th scope="col">Poli</th>
                                                <th scope="col">Obat</th>
                                                <th scope="col">Dokter</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($history as $history) : ?>
                                                <tr>
                                                    <td><b><?= date_format(new DateTime('today'), 'Y-m-d') === $history['created_at_rm'] ? 'Hari ini' : $rekam_medis['created_at_rm'] ?></b></td>
                                                    <td><?= $history['keluhan'] ?></td>
                                                    <td><?= $history['anamnese/diagnosa'] ?></td>
                                                    <td><?= $history['nama_poli'] ?></td>
                                                    <td><?= $history['id_obat'] ?></td>
                                                    <td><?= $history['nama_dokter'] ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>

        </div>

    </div>
</div>
<?= $this->endSection() ?>