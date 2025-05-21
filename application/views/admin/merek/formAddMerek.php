<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Merek</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tambah Merek</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Form Tambah Merek</h3>
            </div>
            <form action="<?= site_url('merek/store'); ?>" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="nama_merek">Nama Merek</label>
                  <input type="text" name="nama_merek" class="form-control" id="nama_merek" placeholder="Masukkan nama merek" required>
                </div>
                <div class="form-group">
                  <label for="gambar">Gambar Merek</label>
                  <input type="file" name="gambar" class="form-control-file" id="gambar" accept="image/*">
                </div>
              </div>
              <div class="card-footer">
                <a href="<?= site_url('merek'); ?>" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
