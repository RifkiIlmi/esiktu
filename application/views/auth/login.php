<img class="img-responsive img-fluid" src="<?= base_url();?>public/img/logo.png" alt="Esiktu Logo">
<div class="login-box"> 
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
    <?= $this->session->flashdata('message'); ?>
      <p class="login-box-msg">Selamat Datang Kembali</p>

      <form action="<?= base_url('auth') ?>" method="post">
        <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="nip" placeholder="NIP">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
        </div>
        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8"></div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->