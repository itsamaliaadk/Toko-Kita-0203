<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Merek</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Merek</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Form Edit Merek</h3>
                        </div>
                        <form action="<?= site_url('merek/update/' . $merek['id_merek']); ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_merek">Nama Merek</label>
                                    <input type="text" name="nama_merek" class="form-control" id="nama_merek" value="<?= $merek['nama_merek']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar Merek</label><br>
                                    <?php if ($merek['gambar']): ?>
                                        <img src="<?= base_url('assets/foto_merek/' . $merek['gambar']); ?>" width="100" class="mb-2">
                                    <?php endif; ?>
                                    <input type="file" name="gambar" class="form-control-file" id="gambar" accept="image/*">
                                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?= site_url('merek'); ?>" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-warning float-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>