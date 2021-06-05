<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div id="konten">
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-header mb-2 bg-success text-white">Form Ubah User</h5>
                    <form action="/users/update/<?= $user['id_users'] ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama User</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_users')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="nama_users" <?= ($validation->hasError('nama_users')) ? 'autofocus' : ''; ?> value="<?= (old('nama_users')) ? old('nama_users') : $user['nama_users']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('nama_users'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                                    <div class="text-danger">
                                        Kosongkan Jika tidak ingin ubah password.!!
                                    </div>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="password">
                                    <input type="hidden" name="passwordLama" value="<?= $user['password'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Hak Akses</label>
                                    <select class="form-select <?= ($validation->hasError('hak_akses')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="hak_akses" id="hak_akses">

                                        <?php if (old('hak_akses')) : ?>
                                            <option selected hidden value="<?= old('hak_akses') ?>"><?= old('hak_akses') ?></option>
                                            <?php foreach ($hak_akses as $hak_akses) : ?>
                                                <option value="<?= $hak_akses; ?>"><?= $hak_akses; ?></option>
                                            <?php endforeach ?>
                                        <?php else : ?>
                                            <?php foreach ($hak_akses as $hak_akses) : ?>
                                                <?php if ($user['hak_akses'] == $hak_akses) : ?>
                                                    <option value="<?= $hak_akses; ?>" selected><?= $hak_akses; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $hak_akses; ?>"><?= $hak_akses; ?></option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        <?php endif ?>


                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('hak_akses'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Foto</label>
                                    <input class="form-control" type="file" id="foto" name="foto" onchange="previewImg()">
                                    <input type="hidden" name="fotoLama" value="<?= $user['foto'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="email" <?= ($validation->hasError('email')) ? 'autofocus' : ''; ?> value="<?= (old('email')) ? old('email') : $user['email']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 d-flex align-items-center justify-content-center">
                                <img src="/assets/img/<?= $user['foto'] ?>" alt="" id="img-preview" class="img-thumbnail img-preview foto">
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
</div>
<?= $this->endSection() ?>