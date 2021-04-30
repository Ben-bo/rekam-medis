<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div id="konten">
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-header mb-2 bg-success text-white">Form Pendaftaran Pasien</h5>
                    <form action="/pasien/add_data/" method="post">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama Pasien</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_pasien')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="nama_pasien" <?= ($validation->hasError('nama_pasien')) ? 'autofocus' : ''; ?> value="<?= old('nama_pasien'); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('nama_pasien'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nomor KTP</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('no_ktp')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="no_ktp" <?= ($validation->hasError('no_ktp')) ? 'autofocus' : ''; ?> value="<?= old('no_ktp'); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('no_ktp'); ?>
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
                                    <label for="exampleFormControlInput1" class="form-label">Agama</label>
                                    <select class="form-select  <?= ($validation->hasError('agama')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="agama">
                                        <?php if (old('agama')) : ?>
                                            <option selected hidden value="<?= old('agama') ?>"> <?= old('agama') ?></option>
                                            <option value="Islam">Islam</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Khatolik">Khatolik</option>
                                            <!-- menampilkan option di atas dapat juga menggunakan fungsi foreach. liat di form ubah -->
                                        <?php else : ?>
                                            <option selected hidden value=""> Pilih Agama</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Khatolik">Khatolik</option>
                                        <?php endif ?>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('agama'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Pendidikan Terakhir</label>
                                    <select class="form-select <?= ($validation->hasError('pendidikan_terakhir')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="pendidikan_terakhir">
                                        <?php if (old('pendidikan_terakhir')) : ?>
                                            <option selected hidden value="<?= old('pendidikan_terakhir') ?>"> <?= old('pendidikan_terakhir') ?></option>
                                            <option value="SD">SD</option>
                                            <option value="SMP/MTs">SMP/MTs</option>
                                            <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                            <option value="S1/Sarjana">S1/Sarjana</option>
                                            <option value="S2/Magister">S2/Magister</option>
                                            <option value="S2/Doktor">S2/Doktor</option>
                                        <?php else : ?>
                                            <option selected hidden value=""> Pilih Jenjang Pendidikan </option>
                                            <option value="SD">SD</option>
                                            <option value="SMP/MTs">SMP/MTs</option>
                                            <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                            <option value="S1/Sarjana">S1/Sarjana</option>
                                            <option value="S2/Magister">S2/Magister</option>
                                            <option value="S2/Doktor">S2/Doktor</option>
                                        <?php endif ?>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('pendidikan_terakhir'); ?>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Status Pernikahan</label>
                                    <select class="form-select <?= ($validation->hasError('status_perkawinan')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="status_perkawinan">
                                        <?php if (old('status_perkawinan')) : ?>
                                            <option selected hidden value="<?= old('status_perkawinan') ?>"> <?= old('status_perkawinan') ?></option>
                                            <option value="Sudah Menikah">Sudah Menikah</option>
                                            <option value="Belum Menikah">Belum Menikah</option>
                                        <?php else : ?>
                                            <option selected hidden value=""> Pilih Status</option>
                                            <option value="Sudah Menikah">Sudah Menikah</option>
                                            <option value="Belum Menikah">Belum Menikah</option>
                                        <?php endif ?>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('status_perkawinan'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Tempat Tanggal Lahir</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('ttl')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="ttl" <?= ($validation->hasError('ttl')) ? 'autofocus' : ''; ?> value="<?= old('ttl'); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('ttl'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Pekerjaan</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('pekerjaan')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="pekerjaan" <?= ($validation->hasError('pekerjaan')) ? 'autofocus' : ''; ?> value="<?= old('pekerjaan'); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('pekerjaan'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nomor Hp</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="no_hp" <?= ($validation->hasError('no_hp')) ? 'autofocus' : ''; ?> value="<?= old('no_hp'); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('no_hp'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="alamat" <?= ($validation->hasError('alamat')) ? 'autofocus' : ''; ?> value="<?= old('alamat'); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Kota/Kabupaten</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('kota/kabupaten')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="kota/kabupaten" <?= ($validation->hasError('kota/kabupaten')) ? 'autofocus' : ''; ?> value="<?= old('kota/kabupaten'); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('kota/kabupaten'); ?>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Desa/Kelurahan</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('desa/kelurahan')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="desa/kelurahan" <?= ($validation->hasError('desa/kelurahan')) ? 'autofocus' : ''; ?> value="<?= old('desa/kelurahan'); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('desa/kelurahan'); ?>
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