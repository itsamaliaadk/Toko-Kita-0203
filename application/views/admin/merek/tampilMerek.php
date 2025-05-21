<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manajemen Merek</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manajemen Merek</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Merek</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <?php if ($this->session->flashdata('success')): ?>
                                <div class="alert alert-success">
                                    <?= $this->session->flashdata('success'); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->session->flashdata('error')): ?>
                                <div class="alert alert-danger">
                                    <?= $this->session->flashdata('error'); ?>
                                </div>
                            <?php endif; ?>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Nama Merek</th>
                                        <th>Gambar Merek</th>
                                        <th style="width: 150px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($merek as $m): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $m['nama_merek']; ?></td>
                                            <td>
                                                <?php if ($m['gambar']): ?>
                                                    <img src="<?= base_url('assets/foto_merek/' . $m['gambar']); ?>" width="80">
                                                <?php else: ?>
                                                    <span class="text-muted">Tidak ada gambar</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?= site_url('merek/edit/' . $m['id_merek']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="<?= site_url('merek/delete/' . $m['id_merek']); ?>" onclick="return confirm('Yakin ingin menghapus merek ini?');" class="btn btn-danger btn-sm">Hapus</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <a href="<?= site_url('merek/create'); ?>" class="btn btn-sm btn-info float-left">Tambah Merek</a>
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>