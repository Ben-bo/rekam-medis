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
                    <h5 class="card-header mb-2 bg-success text-white">Input Data Kunjungan</h5>
                    <form action="/kunjungan/add_data/" method="post">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="no_rm" class="form-label">No rekam Medis</label>
                                    <select class="form-select rm <?= ($validation->hasError('no_rm')) ? 'is-invalid' : ''; ?>" aria-label=" Default select example" name="no_rm">
                                        <option selected hidden value="">Pilih No rekam Medis</option>
                                        <?php foreach ($pasien as $pasien) : ?>
                                            <?php if (old('no_rm')) : ?>
                                                <?php if (old('no_rm') === $pasien['id_pasien']) : ?>
                                                    <option selected value="<?= $pasien['id_pasien'] ?>">RM000<?= $pasien['id_pasien'] ?></option>
                                                <?php endif ?>
                                                <option value="<?= $pasien['id_pasien'] ?>">RM000<?= $pasien['id_pasien'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $pasien['id_pasien'] ?>">RM000<?= $pasien['id_pasien'] ?></option>
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
                                        <input type="text" class="form-control " name="nama_pasien" id="nama_pasien" value="<?= (old('nama_pasien')) ? old('nama_pasien') : '' ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="poli" class="form-label">Nama Poli</label>
                                    <select class="form-select <?= ($validation->hasError('poli')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="poli" id="poli">
                                        <option value="" hidden>PILIH</option>
                                        <?php foreach ($poli as $row) : ?>
                                            <?php if (old('poli')) : ?>
                                                <?php if (old('poli') === $row['id_poli']) : ?>
                                                    <option selected value="<?= $row['id_poli'] ?>"><?= $row['nama_poli'] ?></option>
                                                <?php endif ?>
                                                <option value="<?= $row['id_poli'] ?>"><?= $row['nama_poli'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $row['id_poli'] ?>"><?= $row['nama_poli'] ?></option>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('poli'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="keluhan" class="form-label">Keluhan</label>
                                    <textarea class="form-control <?= ($validation->hasError('poli')) ? 'is-invalid' : ''; ?>" name="keluhan" id="keluhan" rows="3"><?= (old('keluhan')) ? old('keluhan') : '' ?></textarea>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('keluhan'); ?>
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
                </div>

            </div>

            </form>

        </div>
    </div>

</div>

</div>
</div>
<?= $this->endSection() ?>