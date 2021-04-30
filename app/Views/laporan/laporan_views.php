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
                <h3 class="card-header mb-2 bg-success text-white text-center">LAPORAN</h3>
                <div class="card-body">
                    <form action="/laporan/filterData/" method="post">
                        <div class="row">
                            <div class="col-6">
                                <a href="<?php if ($bulan && $tahun == true) {
                                                echo '/laporan/cetakData/' . $bulan . '/' . $tahun . '';
                                            } else {
                                                echo '/laporan/cetakData';
                                            }
                                            ?>" class="btn btn-success"><i class="fas fa-print"></i> Print</a>
                            </div>
                            <div class="col-4">
                                <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="tanggal">
                            </div>
                            <div class="col-2">
                                <input type="submit" class="btn btn-success" value="Filter">
                                <a href="/laporan/" class="btn btn-success">Reset</a>
                            </div>

                        </div>
                    </form>
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-header mb-2 bg-success text-white">Data Pasien</h5>
                            <table class="table table-hover" id="MyTable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">No KTP</th>
                                        <th scope="col">Tempat Tanggal Lahir</th>
                                        <th scope="col">ALamat</th>
                                        <th scope="col">No HP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1 ?>
                                    <?php foreach ($pasien as $pasien) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $pasien['nama_pasien'] ?></td>
                                            <td><?= $pasien['jenis_kelamin'] ?></td>
                                            <td><?= $pasien['no_ktp'] ?></td>
                                            <td><?= $pasien['ttl'] ?></td>
                                            <td><?= $pasien['alamat'] ?></td>
                                            <td><?= $pasien['no_hp'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-header mb-2 bg-success text-white">Data Dokter</h5>
                            <table class="table table-hover " id="MyTable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Dokter</th>
                                        <th scope="col">Spesialis</th>
                                        <th scope="col">Jenis Kelmain</th>
                                        <th scope="col">Tempat Tanggal Lahir </th>
                                        <th scope="col">NO HP</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1 ?>
                                    <?php foreach ($dokter as $dokter) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $dokter['nama_dokter'] ?></td>
                                            <td><?= $dokter['spesialis'] ?></td>
                                            <td><?= $dokter['jenis_kelamin_dokter'] ?></td>
                                            <td><?= $dokter['ttl'] ?></td>
                                            <td><?= $dokter['no_hp_dokter'] ?></td>
                                            <td><?= $dokter['email'] ?></td>
                                            <td><?= $dokter['alamat'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-header mb-2 bg-success text-white">Data Obat</h5>
                            <table class="table table-hover " id="MyTable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Obat</th>
                                        <th scope="col">Jenis Obat</th>
                                        <th scope="col">Sediaan</th>
                                        <th scope="col">Dosis Anak</th>
                                        <th scope="col">Dosis Dewasa</th>
                                        <th scope="col">Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1 ?>
                                    <?php foreach ($obat as $obat) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $obat['nama_obat'] ?></td>
                                            <td><?= $obat['jenis_obat'] ?></td>
                                            <td><?= $obat['sediaan'] ?></td>
                                            <td><?= $obat['dosis_anak'] ?></td>
                                            <td><?= $obat['dosis_dewasa'] ?></td>
                                            <td><?= $obat['stok'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-header mb-2 bg-success text-white">Data Rekam Medis</h5>
                            <table class="table table-hover " id="MyTable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">No Rekam Medis</th>
                                        <th scope="col">Nama Pasien</th>
                                        <th scope="col">Keluhan</th>
                                        <th scope="col">Anamnese/Diagnosa</th>
                                        <th scope="col">Dokter</th>
                                        <th scope="col">Obat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1 ?>
                                    <?php foreach ($rekam_medis as $rekam_medis) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $rekam_medis['no_rekam_medis'] ?></td>
                                            <td><?= $rekam_medis['nama_pasien'] ?></td>
                                            <td><?= $rekam_medis['keluhan'] ?></td>
                                            <td><?= $rekam_medis['anamnese/diagnosa'] ?></td>
                                            <td><?= $rekam_medis['nama_dokter'] ?></td>
                                            <td><?= $rekam_medis['nama_obat'] ?></td>
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
<?= $this->endSection() ?>