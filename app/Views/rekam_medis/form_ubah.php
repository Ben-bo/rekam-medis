<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div id="konten">
    <?php if (session('hak_akses') !== 'admin' && session('hak_akses') !== 'rekam_medis') : ?>
        <h1>Konten hanya bisa diakses oleh admin dan bagian rekam medis</h1>
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
                <div class="card-body">
                    <h5 class="card-header mb-2 bg-success text-white">Form UBAH Rekam Medis</h5>
                    <form action="/rekam_medis/ubah/<?= $rekam_medis['id'] ?>/<?= $rekam_medis['id_pasien'] ?>" method="post">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="no_rm" class="form-label">Nomor Rekam Medis</label>
                                    <input type="hidden" name="rm" value="<?php echo $rekam_medis['no_rekam_medis'] ?>">
                                    <input type="text" class="form-control" id="no_rm" value="RM000<?php echo $rekam_medis['no_rekam_medis'] ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_pasien" class="form-label">Nama Pasien</label>
                                    <input type="hidden" name="nama_pasien" value="<?php echo $rekam_medis['id_pasien'] ?>">
                                    <input type="text" class="form-control" id="no_rm" value="<?php echo $rekam_medis['nama_pasien'] ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="keluhan" class="form-label">Keluhan</label>
                                    <select class="form-select keluhan <?= ($validation->hasError('keluhan')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="keluhan" id="keluhan">
                                        <?php foreach ($pasienPoli as $pasienPoli) : ?>
                                            <?php if (old('keluhan')) : ?>
                                                <?php if ($pasienPoli['id_kunjungan'] === old('keluhan')) : ?>
                                                    <option selected value="<?= $pasienPoli['id_kunjungan'] ?>"><?= $pasienPoli['keluhan'] ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $pasienPoli['id_kunjungan'] ?>"><?= $pasienPoli['keluhan'] ?></option>
                                                <?php endif ?>
                                            <?php else : ?>
                                                <?php if ($rekam_medis['id_kunjungan'] === $pasienPoli['id_kunjungan']) : ?>
                                                    <option selected value="<?= $pasienPoli['id_kunjungan'] ?>"><?= $pasienPoli['keluhan'] ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $pasienPoli['id_kunjungan'] ?>"><?= $pasienPoli['keluhan'] ?></option>
                                                <?php endif ?>

                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('keluhan'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">

                                    <label for="poli" class="form-label">Nama Poli</label>
                                    <select class="form-select <?= ($validation->hasError('poli')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="poli" id="poli" onchange="change()">
                                        <option value="" hidden>PILIH</option>
                                        <?php foreach ($poli as $poli) : ?>
                                            <?php if ($rekam_medis['id_poli'] == $poli['id_poli']) : ?>
                                                <option value="<?= $poli['id_poli']; ?>" selected><?= $poli['nama_poli']; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $poli['id_poli'] ?>"><?= $poli['nama_poli']; ?></option>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('poli'); ?>
                                    </div>

                                </div>
                                <div class="mt-5 text-center">

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label for="exampleFormControlTextarea1" class="form-label">Nama Obat</label>
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
                                                <?php if ($namaObatRM0 === $obat['nama_obat']) : ?>
                                                    <option selected value="<?= $obat['nama_obat'] ?>"><?= $obat['nama_obat'] ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $obat['nama_obat'] ?>"><?= $obat['nama_obat'] ?></option>
                                                <?php endif ?>

                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('nama_obat'); ?>
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <select class="form-select mt-1 <?= ($validation->hasError('nama_obat1')) ? 'is-invalid' : ''; ?>" name="nama_obat1" id="obat1">
                                        <option selected hidden value="">Pilih obat</option>
                                        <?php foreach ($obat1 as $obat) : ?>
                                            <?php if (old('nama_obat1')) : ?>
                                                <?php if ($obat['nama_obat'] === old('nama_obat1')) : ?>
                                                    <option selected value="<?= $obat['nama_obat'] ?>"><?= $obat['nama_obat'] ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $obat['nama_obat'] ?>"><?= $obat['nama_obat'] ?></option>
                                                <?php endif ?>
                                            <?php else : ?>
                                                <?php if ($namaObatRM1 === $obat['nama_obat']) : ?>
                                                    <option selected value="<?= $obat['nama_obat'] ?>"><?= $obat['nama_obat'] ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $obat['nama_obat'] ?>"><?= $obat['nama_obat'] ?></option>
                                                <?php endif ?>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('nama_obat1'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select mt-1 <?= ($validation->hasError('nama_obat2')) ? 'is-invalid' : ''; ?>" name="nama_obat2" id="obat2">
                                        <option selected hidden value="">Pilih obat</option>
                                        <?php foreach ($obat2 as $obat) : ?>
                                            <?php if (old('nama_obat2')) : ?>
                                                <?php if ($obat['nama_obat'] === old('nama_obat2')) : ?>
                                                    <option selected value="<?= $obat['nama_obat'] ?>"><?= $obat['nama_obat'] ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $obat['nama_obat'] ?>"><?= $obat['nama_obat'] ?></option>
                                                <?php endif ?>
                                            <?php else : ?>
                                                <?php if ($namaObatRM2 === $obat['nama_obat']) : ?>
                                                    <option selected value="<?= $obat['nama_obat'] ?>"><?= $obat['nama_obat'] ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $obat['nama_obat'] ?>"><?= $obat['nama_obat'] ?></option>
                                                <?php endif ?>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('nama_obat2'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="anamnese/diagnosa" class="form-label">Anamnese/Diagnosa</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('anamnese/diagnosa')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="anamnese/diagnosa" <?= ($validation->hasError('anamnese/diagnosa')) ? 'autofocus' : ''; ?> value="<?= (old('anamnese/diagnosa')) ? old('anamnese/diagnosa') : $rekam_medis['anamnese/diagnosa']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('anamnese/diagnosa'); ?>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="nama_dokter" class="form-label">Nama Dokter</label>
                                    <select class="form-select " aria-label="Default select example" name="nama_dokter" id="nama_dokter">
                                        <?php foreach ($namaDokter as $dokter) : ?>
                                            <?php if ($rekam_medis['id_dokter'] == $dokter['id_dokter']) : ?>
                                                <option value="<?= $dokter['id_dokter'] ?>" selected><?= $dokter['nama_dokter'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $dokter['id_dokter'] ?>"><?= $dokter['nama_dokter'] ?></option>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 items-center">
                                <input class="btn btn-success" type="submit" value="UBAH">
                                <input class="btn btn-danger" type="button" value="Reset" onclick="return window.location.reload()">
                            </div>
                        </div>
                    </form>
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
                            <?php foreach ($dataRekamMedis as $dataRekamMedis) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><b><?= date_format(new DateTime('today'), 'Y-m-d') == $dataRekamMedis['created_at_rm'] ? 'Hari ini' : $dataRekamMedis['created_at_rm'] ?></b></td>
                                    <td>RM000<?= $dataRekamMedis['no_rekam_medis'] ?></td>
                                    <td><?= $dataRekamMedis['nama_pasien'] ?></td>

                                    <td><?= $dataRekamMedis['anamnese/diagnosa'] ?></td>
                                    <td id="bot">
                                        <a href="/rekam_medis/detail_rm/<?= $dataRekamMedis['id']; ?>/<?= $dataRekamMedis['id_pasien']; ?>/" class="btn btn-success text-white"><i class="fas fa-info-circle"></i> Detail</a>
                                        <a href="/rekam_medis/form_ubah/<?= $dataRekamMedis['id'] ?>/<?= $dataRekamMedis['id_pasien'] ?> " class="btn btn-success text-white"><i class="fas fa-edit"></i> Ubah</a>
                                        <a onclick="return confirm('yakin ingin hapus.?')" href="/rekam_medis/hapus/<?= $dataRekamMedis['id']; ?>/" class="btn btn-danger text-white"><i class="fas fa-trash-alt"></i></a>
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