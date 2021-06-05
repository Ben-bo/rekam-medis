<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div id="konten">
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-header mb-2 bg-success text-white">Input Data Kunjungan</h5>
                    <form action="/kunjungan/ubah/<?= $kunjungan['id_kunjungan'] ?>" method="post">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="no_rm" class="form-label">No rekam Medis</label>
                                    <select class="form-select rm <?= ($validation->hasError('no_rm')) ? 'is-invalid' : ''; ?>" aria-label=" Default select example" name="no_rm" id="rm">
                                        <option selected hidden value="">Pilih No rekam Medis</option>
                                        <option value="" hidden>PILIH Poli</option>
                                        <?php foreach ($pasien as $pasien) : ?>
                                            <?php if (old('no_rm')) : ?>
                                                <?php if ($pasien['id_pasien'] === old('no_rm')) : ?>
                                                    <option selected value="<?= $pasien['id_pasien'] ?>">RM000<?= $pasien['id_pasien'] ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $pasien['id_pasien'] ?>">RM000<?= $pasien['id_pasien'] ?></option>
                                                <?php endif ?>
                                            <?php else : ?>
                                                <?php if ($kunjungan['id_pasien'] === $pasien['id_pasien']) : ?>
                                                    <option selected value="<?= $pasien['id_pasien'] ?>">RM000<?= $pasien['id_pasien'] ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $pasien['id_pasien'] ?>">RM000<?= $pasien['id_pasien'] ?></option>
                                                <?php endif ?>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('no_rm'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_pasien" class="form-label">Nama Pasien</label>
                                    <div class="nama_pasien" style="width: 100%;">
                                        <input type="text" name="nama_pasien" class="form-control " id="nama_pasien" value="<?= $kunjungan['nama_pasien'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="poli" class="form-label">Nama Poli</label>
                                    <select class="form-select <?= ($validation->hasError('poli')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="poli" id="poli" onchange="change()">
                                        <option value="" hidden>PILIH Poli</option>
                                        <?php foreach ($poli as $poli) : ?>
                                            <?php if (old('poli')) : ?>
                                                <?php if ($poli['id_poli'] === old('poli')) : ?>
                                                    <option selected value="<?= $poli['id_poli'] ?>"><?= $poli['nama_poli'] ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $poli['id_poli'] ?>"><?= $poli['nama_poli'] ?></option>
                                                <?php endif ?>
                                            <?php else : ?>
                                                <?php if ($kunjungan['id_poli'] === $poli['id_poli']) : ?>
                                                    <option selected value="<?= $poli['id_poli'] ?>"><?= $poli['nama_poli'] ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $poli['id_poli'] ?>"><?= $poli['nama_poli'] ?></option>
                                                <?php endif ?>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('poli'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="keluhan" class="form-label">Keluhan</label>
                                    <textarea class="form-control" name="keluhan" id="exampleFormControlTextarea1" rows="3"><?= $kunjungan['keluhan'] ?> </textarea>

                                </div>
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

        </div>
    </div>

</div>

</div>
</div>
<?= $this->endSection() ?>