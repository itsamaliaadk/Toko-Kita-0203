<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Form Edit Profil Admin</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- NOTIF -->
        <?php if ($this->session->flashdata('msg')): ?>
          <div class="container-fluid">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?= $this->session->flashdata('msg'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        <?php endif; ?>

        <!-- Form Username -->
        <div class="col-md-6">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Username</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('adminpanel/save_profile'); ?>">
              <div class="card-body">
                <div class="form-group row">
                  <label for="username" class="col-sm-3 col-form-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" name="userName" class="form-control" id="username" placeholder="Username Baru" value="<?php echo $admin->userName; ?>" required>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">Simpan</button>
              </div>
            </form>
          </div>
        </div>

        <!-- Form Password -->
        <div class="col-md-6">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Password</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('adminpanel/save_password'); ?>">
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">New Password</label>
                  <div class="col-sm-9">
                    <input type="password" name="password" class="form-control" id="inputEmail3" placeholder="New Password" required>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-info float-right">Simpan</button>
              </div>
            </form>
          </div>
        </div>

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>