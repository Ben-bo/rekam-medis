<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div id="konten">
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-header mb-2 bg-success text-white">Form Input Data Obat</h5>
                    <form action="/obat/ubah/<?= $obat['id_obat'] ?>" method="post">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="nama_obat" class="form-label">Nama Obat</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_obat')) ? 'is-invalid' : ''; ?>" id="nama_obat" name="nama_obat" <?= ($validation->hasError('nama_obat')) ? 'autofocus' : ''; ?> value="<?= (old('nama_obat')) ? old('nama_obat') : $obat['nama_obat']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('nama_obat'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_obat" class="form-label">Jenis</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('jenis_obat')) ? 'is-invalid' : ''; ?>" id="jenis_obat" name="jenis_obat" <?= ($validation->hasError('jenis_obat')) ? 'autofocus' : ''; ?> value="<?= (old('jenis_obat')) ? old('jenis_obat') : $obat['jenis_obat']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('jenis_obat'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="sediaan" class="form-label">Sediaan</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('sediaan')) ? 'is-invalid' : ''; ?>" id="sediaan" name="sediaan" <?= ($validation->hasError('sediaan')) ? 'autofocus' : ''; ?> value="<?= (old('sediaan')) ? old('sediaan') : $obat['sediaan']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('sediaan'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="dosis_anak" class="form-label">Dosis Anak</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('dosis_anak')) ? 'is-invalid' : ''; ?>" id="dosis_anak" name="dosis_anak" <?= ($validation->hasError('dosis_anak')) ? 'autofocus' : ''; ?> value="<?= (old('dosis_anak')) ? old('dosis_anak') : $obat['dosis_anak']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('dosis_anak'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="dosis_dewasa" class="form-label">Dosis Dewasa</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('dosis_dewasa')) ? 'is-invalid' : ''; ?>" id="dosis_dewasa" name="dosis_dewasa" <?= ($validation->hasError('dosis_dewasa')) ? 'autofocus' : ''; ?> value="<?= (old('dosis_dewasa')) ? old('dosis_dewasa') : $obat['dosis_dewasa']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('dosis_dewasa'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="stok" class="form-label">Stok</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : ''; ?>" id="stok" name="stok" <?= ($validation->hasError('stok')) ? 'autofocus' : ''; ?> value="<?= (old('stok')) ? old('stok') : $obat['stok']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('stok'); ?>
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