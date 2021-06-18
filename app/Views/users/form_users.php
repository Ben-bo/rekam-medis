<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<?php if (session('hak_akses') !== 'admin') : ?>
    <h1>Konten hanya bisa diakses oleh admin</h1>
    <?php return 0 ?>
<?php endif ?>
<div id="konten">
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-header mb-2 bg-success text-white">Form Input Data User</h5>
                    <form action="/users/add_data/" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3" style="display: none;">
                                    <label for="nama_users" class="form-label">Nama User</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_users')) ? 'is-invalid' : ''; ?>" id="nama_users" name="nama_users" <?= ($validation->hasError('nama_users')) ? 'autofocus' : ''; ?> value="<?= old('nama_users'); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('nama_users'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_users" class="form-label">Nama User</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_users')) ? 'is-invalid' : ''; ?>" id="nama_users" name="nama_users" <?= ($validation->hasError('nama_users')) ? 'autofocus' : ''; ?> value="<?= old('nama_users'); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('nama_users'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" <?= ($validation->hasError('password')) ? 'autofocus' : ''; ?> value="<?= old('password'); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('password'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Hak Akses</label>
                                    <select class="form-select <?= ($validation->hasError('hak_akses')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="hak_akses">
                                        <?php if (old('hak_akses')) : ?>
                                            <option selected hidden value="<?= old('hak_akses') ?>"> <?= old('hak_akses') ?></option>
                                            <option value="admin">admin</option>
                                            <option value="pendaftaran">Pendaftaran</option>
                                            <option value="rekam_medis">Rekam Medis</option>
                                        <?php else : ?>
                                            <option selected hidden value=""> Pilih Jenis Kelamin</option>
                                            <option value="admin">admin</option>
                                            <option value="pendaftaran">Pendaftaran</option>
                                            <option value="rekam_medis">Rekam Medis</option>
                                        <?php endif ?>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('hak_akses'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Foto</label>
                                    <input class="form-control" type="file" id="foto" name="foto" onchange="previewImg()">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" <?= ($validation->hasError('email')) ? 'autofocus' : ''; ?> value="<?= old('email'); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 d-flex align-items-center justify-content-center">
                                <img src="/assets/img/default.jpg" alt="" id="img-preview" class="img-thumbnail img-preview foto">
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