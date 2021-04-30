<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div id="konten">
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-header mb-2 bg-success text-white">Form Input Data Dokter</h5>
                    <form action="/dokter/add_data/" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="nama_dokter" class="form-label">Nama Dokter</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_dokter')) ? 'is-invalid' : ''; ?>" id="nama_dokter" name="nama_dokter" <?= ($validation->hasError('nama_dokter')) ? 'autofocus' : ''; ?> value="<?= old('nama_dokter'); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('nama_dokter'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="spesialis" class="form-label">Spesialis</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('spesialis')) ? 'is-invalid' : ''; ?>" id="spesialis" name="spesialis" <?= ($validation->hasError('spesialis')) ? 'autofocus' : ''; ?> value="<?= old('spesialis'); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('spesialis'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="jenis_kelamin">
                                        <?php if (old('jenis_kelamin')) : ?>
                                            <option selected hidden value="<?= old('jenis_kelamin') ?>"> <?= old('jenis_kelamin') ?></option>
                                            <option value="laki-laki">Laki-Laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        <?php else : ?>
                                            <option selected hidden value=""> Pilih Jenis Kelamin</option>
                                            <option value="laki-laki">Laki-Laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        <?php endif ?>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('jenis_kelamin'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-9">
                                            <label for="foto" class="form-label">Foto</label>
                                            <input class="form-control" type="file" id="foto" name="foto" onchange="previewImg()">
                                        </div>
                                        <div class="col">
                                            <img src="/assets/img/default.jpg" alt="" id="img-preview" class="img-thumbnail img-preview foto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="poli" class="form-label">Nama Poli</label>
                                    <select class="form-select <?= ($validation->hasError('nama_poli')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="nama_poli" id="poli" required>
                                        <option selected hidden value="">Pilih Poli</option>
                                        <?php foreach ($poli as $poli) : ?>
                                            <option value="<?= $poli['id_poli'] ?>"><?= $poli['nama_poli'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('nama_poli'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp_dokter" class="form-label">Nomor Hp</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('no_hp_dokter')) ? 'is-invalid' : ''; ?>" id="no_hp_dokter" name="no_hp_dokter" <?= ($validation->hasError('no_hp_dokter')) ? 'autofocus' : ''; ?> value="<?= old('no_hp_dokter'); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('no_hp_dokter'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" <?= ($validation->hasError('email')) ? 'autofocus' : ''; ?> value="<?= old('email'); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" <?= ($validation->hasError('alamat')) ? 'autofocus' : ''; ?> value="<?= old('alamat'); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="ttl" class="form-label">Tempat Tanggal Lahir</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('ttl')) ? 'is-invalid' : ''; ?>" id="ttl" name="ttl" <?= ($validation->hasError('ttl')) ? 'autofocus' : ''; ?> value="<?= old('ttl'); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('ttl'); ?>
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