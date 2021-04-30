<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div id="konten">
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-header mb-2 bg-success text-white">Form Input Data Obat</h5>
                    <form action="/users/add_data/" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama User</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_users">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="password">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Hak Akses</label>
                                    <select class="form-select " aria-label="Default select example" name="hak_akses">
                                        <option selected>Pilih Hak Akases</option>
                                        <option value="admin">Admin</option>
                                        <option value="rekam medis">Staff Rekam Medis</option>
                                        <option value="pendaftaran">Staff Pendaftaran</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Foto</label>
                                    <input class="form-control" type="file" id="foto" name="foto" onchange="previewImg()">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1" name="email">
                                </div>
                            </div>
                            <div class="col-6 d-flex align-items-center justify-content-center">
                                <img src="/assets/img/default.jpg" alt="" id="img-preview" class="img-thumbnail img-preview foto">
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