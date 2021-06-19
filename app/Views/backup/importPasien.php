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
                <h3 class="card-header mb-2 bg-success text-white text-center">IMPORT DATA</h3>
                <div class="card-body">
                    <form action="/backup/prosesImport/" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-8 text-center">
                                    <input class="form-control" type="file" id="formFile" name="import">
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-success">Import</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card mt-3">
                        <?php if (session()->GetFlashdata('pesan')) : ?>
                            <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                                <strong><?= session()->getFlashdata('pesan') ?></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>