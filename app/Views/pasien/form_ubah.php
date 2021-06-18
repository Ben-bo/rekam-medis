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
                    <h5 class="card-header mb-2 bg-success text-white">Form Ubah Pasien</h5>
                    <form action="/pasien/ubah_data/<?= $pasien['id_pasien'] ?>" method="post">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="nama_pasien" class="form-label">Nama Pasien</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_pasien')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="nama_pasien" <?= ($validation->hasError('nama_pasien')) ? 'autofocus' : ''; ?> value="<?= (old('nama_pasien')) ? old('nama_pasien') : $pasien['nama_pasien']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('nama_pasien'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="no_ktp" class="form-label">Nomor KTP</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('no_ktp')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="no_ktp" <?= ($validation->hasError('no_ktp')) ? 'autofocus' : ''; ?> value="<?= (old('no_ktp')) ? old('no_ktp') : $pasien['no_ktp']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('no_ktp'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="jenis_kelamin" id="jenis_kelamin">

                                        <?php if (old('jenis_kelamin')) : ?>
                                            <option selected hidden value="<?= old('jenis_kelamin') ?>"><?= old('jenis_kelamin') ?></option>
                                            <?php foreach ($jenis_kelamin as $jenis_kelamin) : ?>
                                                <option value="<?= $jenis_kelamin; ?>"><?= $jenis_kelamin; ?></option>
                                            <?php endforeach ?>
                                        <?php else : ?>
                                            <?php foreach ($jenis_kelamin as $jenis_kelamin) : ?>
                                                <?php if ($pasien['jenis_kelamin'] == $jenis_kelamin) : ?>
                                                    <option value="<?= $jenis_kelamin; ?>" selected><?= $jenis_kelamin; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $jenis_kelamin; ?>"><?= $jenis_kelamin; ?></option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        <?php endif ?>


                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('jenis_kelamin'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="agama" class="form-label">Agama</label>
                                    <select class="form-select <?= ($validation->hasError('agama')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="agama" id="agama">
                                        <?php if (old('agama')) : ?>
                                            <option selected hidden value="<?= old('agama') ?>"><?= old('agama') ?></option>
                                            <?php foreach ($agama as $agama) : ?>
                                                <option value="<?= $agama; ?>"><?= $agama; ?></option>
                                            <?php endforeach ?>
                                        <?php else : ?>
                                            <?php foreach ($agama as $agama) : ?>
                                                <?php if ($pasien['agama'] == $agama) : ?>
                                                    <option value="<?= $agama; ?>" selected><?= $agama; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $agama; ?>"><?= $agama; ?></option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        <?php endif ?>

                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('agama'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
                                    <select class="form-select <?= ($validation->hasError('pendidikan_terakhir')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="pendidikan_terakhir" id="pendidikan_terakhir">
                                        <?php if (old('pendidikan_terakhir')) : ?>
                                            <option selected hidden value="<?= old('pendidikan_terakhir') ?>"><?= old('pendidikan_terakhir') ?></option>
                                            <?php foreach ($pendidikan_terakhir as $pendidikan_terakhir) : ?>
                                                <option value="<?= $pendidikan_terakhir; ?>"><?= $pendidikan_terakhir; ?></option>
                                            <?php endforeach ?>
                                        <?php else : ?>
                                            <?php foreach ($pendidikan_terakhir as $pendidikan_terakhir) : ?>
                                                <?php if ($pasien['pendidikan_terakhir'] == $pendidikan_terakhir) : ?>
                                                    <option value="<?= $pendidikan_terakhir; ?>" selected><?= $pendidikan_terakhir; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $pendidikan_terakhir; ?>"><?= $pendidikan_terakhir; ?></option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        <?php endif ?>

                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('pendidikan_terakhir'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="status_pernikahan" class="form-label">Status Pernikahan</label>
                                    <select class="form-select <?= ($validation->hasError('status_perkawinan')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="status_perkawinan" id="status_pernikahan">
                                        <?php if (old('status_perkawinan')) : ?>
                                            <option selected hidden value="<?= old('status_perkawinan') ?>"><?= old('status_perkawinan') ?></option>
                                            <?php foreach ($status_perkawinan as $status_perkawinan) : ?>
                                                <option value="<?= $status_perkawinan; ?>"><?= $status_perkawinan; ?></option>
                                            <?php endforeach ?>
                                        <?php else : ?>
                                            <?php foreach ($status_perkawinan as $status_perkawinan) : ?>
                                                <?php if ($pasien['status_perkawinan'] == $status_perkawinan) : ?>
                                                    <option value="<?= $status_perkawinan; ?>" selected><?= $status_perkawinan; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $status_perkawinan; ?>"><?= $status_perkawinan; ?></option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        <?php endif ?>

                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('status_perkawinan'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="ttl" class="form-label">Tempat Tanggal Lahir</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('ttl')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="ttl" <?= ($validation->hasError('ttl')) ? 'autofocus' : ''; ?> value="<?= (old('ttl')) ? old('ttl') : $pasien['ttl']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('ttl'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('pekerjaan')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="pekerjaan" <?= ($validation->hasError('pekerjaan')) ? 'autofocus' : ''; ?> value="<?= (old('pekerjaan')) ? old('pekerjaan') : $pasien['pekerjaan']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('pekerjaan'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">Nomor Hp</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="no_hp" <?= ($validation->hasError('no_hp')) ? 'autofocus' : ''; ?> value="<?= (old('no_hp')) ? old('no_hp') : $pasien['no_hp']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('no_hp'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="alamat" <?= ($validation->hasError('alamat')) ? 'autofocus' : ''; ?> value="<?= (old('alamat')) ? old('alamat') : $pasien['alamat']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="kota/kabupaten" class="form-label">Kota/Kabupaten</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('kota/kabupaten')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="kota/kabupaten" <?= ($validation->hasError('kota/kabupaten')) ? 'autofocus' : ''; ?> value="<?= (old('kota/kabupaten')) ? old('kota/kabupaten') : $pasien['kota/kabupaten']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('kota/kabupaten'); ?>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="desa/kelurahan" class="form-label">Desa/kelurahan</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('desa/kelurahan')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="desa/kelurahan" <?= ($validation->hasError('desa/kelurahan')) ? 'autofocus' : ''; ?> value="<?= (old('desa/kelurahan')) ? old('desa/kelurahan') : $pasien['desa/kelurahan']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('desa/kelurahan'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 items-center">
                                <input class="btn btn-success" type="submit" value="Simpan">
                                <input class="btn btn-danger" type="button" value="Reset" onclick="return window.location.reload()">
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>
</div>
<?= $this->endSection() ?>