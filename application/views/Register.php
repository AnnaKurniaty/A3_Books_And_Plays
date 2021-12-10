<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Books And Plays</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/style.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
      <a href="#"><b>Books And Plays</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Register to make your account</p>

      <form action="<?php echo base_url("index.php/C_register/add"); ?>" method="post">
        <div class="input-group mb-2">
          <input type="text" name="NAME" class="form-control" placeholder="Name">
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="input-group mb-2">
          <input type="text" name="EMAIL" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="input-group mb-1">
          <input type="password" name="PASSWORD" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="mb-1">
          <label for="file-upload">Image</label>
          <div>
              <input type="file" class="form-control-file" id="file-upload" name="IMAGE">
          </div>
        </div>
        <div class="mb-1">
          <h6 class="font-weight-bold pt-1 pb-1">Roles:</h6>
          <div>
            <select class="form-control" name="ROLES_ID" id="ROLES_ID">
            <option value="" selected>-- Pilih Roles --</option>
              <?php
                foreach($ROLES as $r){?>
                  <option value="<?= $r->ID; ?>"><?= $r->ID; ?> - <?= $r->NAME; ?></option>
              <?php
                }
              ?>
            </select>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-8">
            <div class="icheck-primary">
              <label for="remember">
                <a href="<?php echo base_url() ?>index.php/C_login">Login</a>
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" name="submit" value="upload" class="btn btn-primary btn-block btn-flat">Sign Up</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>

