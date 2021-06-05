<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div id="konten">
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-header mb-2 bg-success text-white">Laporan Poli</h5>
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
                                        <a href="/laporan/cetakPoli/<?= $poli['id_poli']; ?>/" class="btn btn-success text-white"><i class="fas fa-print"></i> Buat Laporan</a>

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