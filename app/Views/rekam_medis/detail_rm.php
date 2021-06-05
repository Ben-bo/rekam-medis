<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div id="konten">
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
                            <a href="/rekam_medis/form_ubah/<?= $rekam_medis['id'] ?>" class="btn btn-success text-white"><i class="fas fa-edit"></i> Edit</a>
                            <div style="width: 5px;"></div>
                            <a href="/rekam_medis/cetak/<?= $rekam_medis['no_rekam_medis']; ?>/" class="btn btn-outline-success " style="" type="button"><i class="fas fa-print"></i></a>
                            <div style="width: 5px;"></div>
                            <a href="/resep/resep/<?= $rekam_medis['id']; ?>/" class="btn btn-success text-white"><i class="fas fa-receipt"></i> Buat Resep</a>
                            <div style="width: 5px;"></div>
                            <a href="/rekam_medis/" class="btn btn-primary text-white">Kembali</a>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="card border-success mb-3" style="width: 50rem;">
                                <div class="card-body ">
                                    <h5 class="card-header mb-2 bg-success text-white text-center">CATATAN REKAM MEDIS PASIEN</h5>
                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="text-center mt-3">No.RM : <?= $rekam_medis['no_rekam_medis'] ?></h5>
                                        </div>
                                        <div class="col-6">
                                            <h6 class=" text-center mt-3">Tgl : <?= $rekam_medis['created_at_rm'] ?></h6>
                                        </div>
                                    </div>

                                    <hr>

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
                                        <tr>
                                            <td>No HP</td>
                                            <td>:</td>
                                            <td><?= $rekam_medis['no_hp'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Keluhan</td>
                                            <td>:</td>
                                            <td><?= $rekam_medis['keluhan'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Anamnese/Diagnosa</td>
                                            <td>:</td>
                                            <td><?= $rekam_medis['anamnese/diagnosa'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Obat yang digunakan</td>
                                            <td>:</td>
                                            <td><?= $rekam_medis['id_obat'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Poli</td>
                                            <td>:</td>
                                            <td><?= $rekam_medis['nama_poli'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Dokter yang menangani</td>
                                            <td>:</td>
                                            <td><?= $rekam_medis['nama_dokter'] ?></td>
                                        </tr>
                                    </table>
                                    <h5 class="card-header mb-2 bg-success text-white mt-4">Riwayat Medis Pasien</h5>
                                    <table class="table table-hover " id="MyTable">
                                        <thead>
                                            <tr>

                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Keluhan</th>
                                                <th scope="col">Anamnese/Diagnosa</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($history as $history) : ?>
                                                <tr>
                                                    <td><b><?= date_format(new DateTime('today'), 'Y-m-d') === $history['created_at_rm'] ? 'Hari ini' : $rekam_medis['created_at_rm'] ?></b></td>
                                                    <td><?= $history['keluhan'] ?></td>
                                                    <td><?= $history['anamnese/diagnosa'] ?></td>
                                                    <td id="bot">
                                                        <a href="/rekam_medis/detail_rm/<?= $history['id']; ?>/<?= $history['id_pasien']; ?>/" class="btn btn-success text-white"><i class="fas fa-info-circle"></i></a>

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
            </div>

        </div>

    </div>
</div>
<?= $this->endSection() ?>