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
                    <h5 class="card-header mb-2 bg-success text-white">Form Rekam Medis</h5>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <form action="/rekam_medis" method="post" id="myform">
                                    <label for="poli" class="form-label">Nama Poli</label>
                                    <select class="form-select" aria-label="Default select example" name="poli" id="poli" onchange="change()">
                                        <option value="" hidden>PILIH</option>
                                        <?php if ($id_poli !== false) : ?>
                                            <?php foreach ($poli as $row) : ?>
                                                <?php if ($row['id_poli'] === $id_poli) : ?>
                                                    <option value="<?php echo $row['id_poli']; ?>" selected><?php echo $row['nama_poli']; ?></option>
                                                <?php else : ?>
                                                    <option value="<?php echo $row['id_poli']; ?>"><?php echo $row['nama_poli']; ?></option>
                                                <?php endif ?>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <?php foreach ($poli as $row) : ?>
                                                <option value="<?php echo $row['id_poli']; ?>"><?php echo $row['nama_poli']; ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                    <form action="/rekam_medis/add_data/" method="post">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <?php if ($id_poli !== false) : ?>
                                        <input type="hidden" name="poli" value="<?= $id_poli ?>">
                                    <?php endif ?>
                                    <label for="no_rm" class="form-label">Nomor Rekam Medis</label>
                                    <input type="text" class="form-control" id="no_rm" name="no_rekam_medis" value="<?php echo sprintf("%04s", $no_rekam_medis) ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_pasien" class="form-label">Nama Pasien</label>
                                    <select class="form-select <?= ($validation->hasError('nama_pasien')) ? 'is-invalid' : ''; ?>" aria-label=" Default select example" name="nama_pasien" id="nama_pasien">
                                        <option selected hidden value="">Pilih Pasien</option>
                                        <?php foreach ($pasien as $pasien) : ?>
                                            <option value="<?= $pasien['id_pasien'] ?>"><?= $pasien['nama_pasien'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('nama_pasien'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="keluhan" class="form-label">Keluhan</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('keluhan')) ? 'is-invalid' : ''; ?>" id="keluhan" name="keluhan" <?= ($validation->hasError('keluhan')) ? 'autofocus' : ''; ?> value="<?= old('keluhan'); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('keluhan'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="obat" class="form-label">Nama Obat</label>
                                    <select class="form-select <?= ($validation->hasError('nama_obat')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="nama_obat" id="obat">
                                        <option selected hidden value="">Pilih Obat</option>
                                        <?php foreach ($obat as $obat) : ?>
                                            <option value="<?= $obat['id_obat'] ?>"><?= $obat['nama_obat'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('nama_obat'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="diagnosa" class="form-label">Anamnese/Diagnosa</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('anamnese/diagnosa')) ? 'is-invalid' : ''; ?>" id="diagnosa" name="anamnese/diagnosa" <?= ($validation->hasError('anamnese/diagnosa')) ? 'autofocus' : ''; ?> value="<?= old('anamnese/diagnosa'); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('anamnese/diagnosa'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_dokter" class="form-label">Nama Dokter</label>
                                    <select class="form-select <?= ($validation->hasError('nama_dokter')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="nama_dokter" id="nama_dokter">
                                        <option selected hidden value="">Pilih poli terlebih dahulu</option>
                                        <?php if ($id_poli !== false) : ?>
                                            <?php foreach ($namaDokter as $row) : ?>
                                                <option selected hidden value="">Pilih Dokter</option>
                                                <option value="<?= $row['id_dokter'] ?>"><?= $row['nama_dokter'] ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('nama_dokter'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 items-center">
                                <input class="btn btn-success" type="submit" value="Simpan">
                                <input class="btn btn-danger" type="reset" value="Reset">
                            </div>
                        </div>
                    </form>
                    <h5 class="card-header mb-2 bg-success text-white mt-4">Data Rekam Medis</h5>
                    <table class="table table-hover " id="MyTable">
                        <thead>
                            <tr>
                                <th scope="col">No Rekam Medis</th>
                                <th scope="col">Nama Pasien</th>
                                <th scope="col">Keluhan</th>
                                <th scope="col">Anamnese/Diagnosa</th>
                                <th scope="col">Dokter</th>
                                <th scope="col">Obat</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rekam_medis as $rekam_medis) : ?>
                                <tr>
                                    <td><?= $rekam_medis['no_rekam_medis'] ?></td>
                                    <td><?= $rekam_medis['nama_pasien'] ?></td>
                                    <td><?= $rekam_medis['keluhan'] ?></td>
                                    <td><?= $rekam_medis['anamnese/diagnosa'] ?></td>
                                    <td><?= $rekam_medis['nama_dokter'] ?></td>
                                    <td><?= $rekam_medis['nama_obat'] ?></td>
                                    <td id="bot">
                                        <a href="/rekam_medis/detail_rm/<?= $rekam_medis['id']; ?>/<?= $rekam_medis['id_pasien']; ?>/" class="btn btn-success text-white"><i class="fas fa-info-circle"></i></a>
                                        <a onclick="return confirm('yakin ingin hapus.?')" href="/rekam_medis/hapus/<?= $rekam_medis['id']; ?>/" class="btn btn-danger text-white"><i class="fas fa-trash-alt"></i></a>


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