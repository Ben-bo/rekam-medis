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
                    <h5 class="card-header mb-2 bg-success text-white">Form Ubah Data Dokter</h5>
                    <form action="/dokter/ubah_data/<?= $dokter['id_dokter'] ?>/" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="nama_dokter" class="form-label">Nama Dokter</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_dokter')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="nama_dokter" <?= ($validation->hasError('nama_dokter')) ? 'autofocus' : ''; ?> value="<?= (old('nama_dokter')) ? old('nama_dokter') : $dokter['nama_dokter']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('nama_dokter'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="spesialis" class="form-label">Spesialis</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('spesialis')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="spesialis" <?= ($validation->hasError('spesialis')) ? 'autofocus' : ''; ?> value="<?= (old('spesialis')) ? old('spesialis') : $dokter['spesialis']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('spesialis'); ?>
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
                                                <?php if ($dokter['jenis_kelamin_dokter'] == $jenis_kelamin) : ?>
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
                                    <div class="row">
                                        <div class="col-9">
                                            <label for="foto" class="form-label">Foto</label>
                                            <input class="form-control" type="file" id="foto" name="foto" onchange="previewImg()">
                                            <input type="hidden" name="fotoLama" value="<?= $dokter['foto'] ?>">
                                        </div>
                                        <div class="col">
                                            <img src="/assets/img/<?= $dokter['foto'] ?>" alt="" id="img-preview" class="img-thumbnail img-preview foto">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="nama_pasien" class="form-label">Nama Poli</label>
                                    <select class="form-select " aria-label="Default select example" name="nama_poli" id="nama_pasien">
                                        <?php foreach ($poli as $poli) : ?>
                                            <?php if ($dokter['id_poli'] == $poli['id_poli']) : ?>
                                                <option value="<?= $poli['id_poli']; ?>" selected><?= $poli['nama_poli']; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $poli['id_poli'] ?>"><?= $poli['nama_poli']; ?></option>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp_dokter" class="form-label">Nomor Hp</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('no_hp_dokter')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="no_hp_dokter" <?= ($validation->hasError('no_hp_dokter')) ? 'autofocus' : ''; ?> value="<?= (old('no_hp_dokter')) ? old('no_hp_dokter') : $dokter['no_hp_dokter']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('no_hp_dokter'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="email" <?= ($validation->hasError('email')) ? 'autofocus' : ''; ?> value="<?= (old('email')) ? old('email') : $dokter['email']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="alamat" <?= ($validation->hasError('alamat')) ? 'autofocus' : ''; ?> value="<?= (old('alamat')) ? old('alamat') : $dokter['alamat']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="ttl" class="form-label">Tempat Tanggal Lahir</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('ttl')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" name="ttl" <?= ($validation->hasError('ttl')) ? 'autofocus' : ''; ?> value="<?= (old('ttl')) ? old('ttl') : $dokter['ttl']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('ttl'); ?>
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