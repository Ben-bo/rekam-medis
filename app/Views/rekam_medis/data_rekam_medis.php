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

                        </div>
                    </div>

                    <form action="/rekam_medis/add_data/" method="post" class="form">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="no_rm" class="form-label">Nomor Rekam Medis</label>
                                    <select class="form-select <?= ($validation->hasError('no_rm')) ? 'is-invalid' : ''; ?>" aria-label=" Default select example" name="no_rm" id="rm">
                                        <option selected hidden value="">Pilih No rekam Medis</option>
                                        <?php foreach ($pasien as $pasien) : ?>
                                            <option value="<?= $pasien['id_pasien'] ?>">RM000<?= $pasien['id_pasien'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_pasien" class="form-label">Nama Pasien</label>
                                    <div class="nama_pasien" style="width: 100%;">
                                        <input type="text" class="form-control " id="nama_pasien" readonly>
                                    </div>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('nama_pasien'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="keluhan" class="form-label">Keluhan</label>
                                    <select class="form-select keluhan <?= ($validation->hasError('keluhan')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="keluhan" id="keluhan">
                                        <option selected hidden value="">Pilih No rm</option>
                                    </select>
                                </div>
                                <div class="mt-5 text-center">
                                    <input class="btn btn-success" type="submit" value="Simpan">
                                    <input class="btn btn-danger" type="reset" value="Reset">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="obat" class="form-label">Nama Obat</label>
                                    <select class="form-select <?= ($validation->hasError('nama_obat')) ? 'is-invalid' : ''; ?>" name="nama_obat" id="obat">
                                        <option selected hidden value="">Pilih obat</option>
                                        <?php foreach ($obat2 as $obat) : ?>
                                            <?php if (old('nama_obat')) : ?>
                                                <?php if ($obat['nama_obat'] === old('nama_obat')) : ?>
                                                    <option selected value="<?= $obat['nama_obat'] ?>"><?= $obat['nama_obat'] ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $obat['nama_obat'] ?>"><?= $obat['nama_obat'] ?></option>
                                                <?php endif ?>
                                            <?php else : ?>
                                                <option value="<?= $obat['nama_obat'] ?>"><?= $obat['nama_obat'] ?></option>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('nama_obat'); ?>
                                    </div>
                                    <select class="form-select mt-1 <?= ($validation->hasError('nama_obat1')) ? 'is-invalid' : ''; ?>" name="nama_obat1" id="obat">
                                        <option selected hidden value="">Pilih obat</option>
                                        <?php foreach ($obat1 as $obat) : ?>
                                            <?php if (old('nama_obat1')) : ?>
                                                <?php if ($obat['nama_obat'] === old('nama_obat1')) : ?>
                                                    <option selected value="<?= $obat['nama_obat'] ?>"><?= $obat['nama_obat'] ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $obat['nama_obat'] ?>"><?= $obat['nama_obat'] ?></option>
                                                <?php endif ?>
                                            <?php else : ?>
                                                <option value="<?= $obat['nama_obat'] ?>"><?= $obat['nama_obat'] ?></option>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('nama_obat1'); ?>
                                    </div>
                                    <select class="form-select mt-1 <?= ($validation->hasError('nama_obat2')) ? 'is-invalid' : ''; ?>" name="nama_obat2" id="obat">
                                        <option selected hidden value="">Pilih obat</option>
                                        <?php foreach ($obat2 as $obat) : ?>
                                            <?php if (old('nama_obat2')) : ?>
                                                <?php if ($obat['nama_obat'] === old('nama_obat2')) : ?>
                                                    <option selected value="<?= $obat['nama_obat'] ?>"><?= $obat['nama_obat'] ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $obat['nama_obat'] ?>"><?= $obat['nama_obat'] ?></option>
                                                <?php endif ?>
                                            <?php else : ?>
                                                <option value="<?= $obat['nama_obat'] ?>"><?= $obat['nama_obat'] ?></option>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('nama_obat2'); ?>
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

                                    <label for="poli" class="form-label">Nama Poli</label>
                                    <select class="form-select <?= ($validation->hasError('poli')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="poli" id="poli" onchange="change()">
                                        <option value="" hidden>PILIH</option>
                                        <?php foreach ($poli as $row) : ?>
                                            <option value="<?php echo $row['id_poli']; ?>"><?php echo $row['nama_poli']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('poli'); ?>
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <label for="nama_dokter" class="form-label">Nama Dokter</label>
                                    <select class="form-select mt-1 <?= ($validation->hasError('nama_dokter')) ? 'is-invalid' : ''; ?>" name="nama_dokter" id="dokter">
                                        <option selected hidden value="">Pilih Dokter</option>
                                        <?php foreach ($dokter as $dokter) : ?>
                                            <?php if (old('nama_dokter')) : ?>
                                                <?php if ($dokter['nama_dokter'] === old('nama_dokter')) : ?>
                                                    <option selected value="<?= $dokter['nama_dokter'] ?>"><?= $dokter['nama_dokter'] ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $dokter['nama_dokter'] ?>"><?= $dokter['nama_dokter'] ?></option>
                                                <?php endif ?>
                                            <?php else : ?>
                                                <option value="<?= $dokter['nama_dokter'] ?>"><?= $dokter['nama_dokter'] ?></option>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('nama_dokter'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 items-center">

                            </div>
                        </div>
                    </form>

                    <?php if (session()->GetFlashdata('pesanResep')) : ?>
                        <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                            <i class="fas fa-exclamation-triangle"></i> <strong><?= session()->getFlashdata('pesanResep') ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
                    <h5 class="card-header mb-2 bg-success text-white mt-4">Data Rekam Medis</h5>
                    <table class="table table-hover " id="mytable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">No Rekam Medis</th>
                                <th scope="col">Nama Pasien</th>

                                <th scope="col">Anamnese/Diagnosa</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($rekam_medis as $rekam_medis) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><b><?= date_format(new DateTime('today'), 'Y-m-d') == $rekam_medis['created_at_rm'] ? 'Hari ini' : $rekam_medis['created_at_rm'] ?></b></td>
                                    <td><?= $rekam_medis['no_rekam_medis'] ?></td>
                                    <td><?= $rekam_medis['nama_pasien'] ?></td>

                                    <td><?= $rekam_medis['anamnese/diagnosa'] ?></td>
                                    <td id="bot">
                                        <a href=" <?= session()->GetFlashdata('pesanResep') ? '/resep/resepDetail/' . $rekam_medis['id'] . '/' . $rekam_medis['id_pasien'] . '' : '/rekam_medis/detail_rm/' . $rekam_medis['id'] . '/' . $rekam_medis['id_pasien'] . '' ?>  " class="btn btn-success text-white"><i class="fas fa-info-circle"></i> Detail</a>
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