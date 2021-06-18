<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div id="konten">
    <?php if (session('hak_akses') !== 'admin' && session('hak_akses') !== 'pendaftaran') : ?>
        <h1>Konten hanya bisa diakses oleh admin dan bagian pendaftaran</h1>
        <?php return 0 ?>
    <?php endif ?>
    <div class="row">
        <div class="col-12">
            <?php if (session()->GetFlashdata('pesan')) : ?>
                <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                    <strong><?= session()->getFlashdata('pesan') ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>
            <div class="card mt-3">
                <h3 class="card-header mb-2 bg-success text-white text-center">LAPORAN KUNJUNGAN</h3>
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
                            <h5 class="text-center">Data Count :</h5>
                            <hr style="border: 1px solid grey;">
                            <div class="kontainer">
                                <div class="wrap">
                                    <div class="wrapDalam">
                                        <table class="table">
                                            <?php foreach ($pasienTotal as $data) : ?>
                                                <tr>
                                                    <td><?= $data['nama_pasien'] ?></td>
                                                    <td> : </td>
                                                    <td><b><?= $data['total'] ?></b> KUNJUNGAN </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </table>
                                    </div>
                                </div>

                                <div class="wrapt">
                                    <table class="table">
                                        <tr>
                                            <td>Tanggal </td>
                                            <td> : </td>
                                            <td><?= date_format(new DateTime('today'), 'd-m-Y') ?> </td>
                                        </tr>
                                        <tr>
                                            <td>TOTAL DATA</td>
                                            <td> : </td>
                                            <td><b><?= $kunjunganTotal ?></b> DATA </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-header mb-2 bg-success text-white">Data Kunjungan</h5>
                            <table class="table table-hover" id="MyTable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">No Rekam Medis</th>
                                        <th scope="col">Nama Pasien</th>
                                        <th scope="col">Poli</th>
                                        <th scope="col">Keluhan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1 ?>
                                    <?php foreach ($kunjungan as $kunjungan) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $kunjungan['created_at_kunjungan'] ?></td>
                                            <td>RM000<?= $kunjungan['id_pasien'] ?></td>
                                            <td><?= $kunjungan['nama_pasien'] ?></td>
                                            <td><?= $kunjungan['nama_poli'] ?></td>
                                            <td><?= $kunjungan['keluhan'] ?></td>
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