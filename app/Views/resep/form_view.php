<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div id="konten">
    <?php if (session('hak_akses') !== 'admin' && session('hak_akses') !== 'rekam_medis') : ?>
        <h1>Konten hanya bisa diakses oleh admin dan bagian rekam medis</h1>
        <?php return 0 ?>
    <?php endif ?>
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-header mb-2 bg-success text-white">Form Resep Obat</h5>
                    <form action="/resep/add_data/<?= $rekam_medis['id'] ?>" method="post">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="no_rekam_medis" class="form-label">No.RM</label>
                                    <input type="text" class="form-control " id="no_rekam_medis" name="no_rekam_medis" value="RM000<?= $rekam_medis['no_rekam_medis'] ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="pasien" class="form-label">Pasien</label>
                                    <input type="text" class="form-control" id="pasien" name="pasien" value="<?= $rekam_medis['nama_pasien'] ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="diagnosa" class="form-label">Diagnosa</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('diagnosa')) ? 'is-invalid' : ''; ?>" id="diagnosa" name="diagnosa" <?= ($validation->hasError('diagnosa')) ? 'autofocus' : ''; ?> value="<?= $rekam_medis['anamnese/diagnosa'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="dokter" class="form-label">Dokter</label>
                                    <input type="text" class="form-control " id="dokter" name="dokter" value="<?= $rekam_medis['nama_dokter'] ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="obat" class="form-label">Obat</label>
                                    <input type="text" class="form-control " id="obat" name="obat" value="<?= $rekam_medis['id_obat'] ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="resep" class="form-label">Resep</label>
                                    <textarea type="text" class="form-control <?= ($validation->hasError('resep')) ? 'is-invalid' : ''; ?>" id="resep" name="resep" <?= ($validation->hasError('resep')) ? 'autofocus' : ''; ?> value="<?= old('resep'); ?>"> </textarea>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('resep'); ?>
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