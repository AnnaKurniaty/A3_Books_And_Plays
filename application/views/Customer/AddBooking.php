<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
</head>
<body>
    <form action="<?php echo base_url("index.php/C_booking/addBooking"); ?>" method="post">
        <input type="hidden" name="UsersId" value="<?php echo $this->session->ID; ?>">
        <div class="input-group mb-3">
          <input type="datetime-local" name="PlayDateStart" class="form-control" placeholder="">
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="datetime-local" name="PlayDateEnd" class="form-control" placeholder="">
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="number" name="Duration" class="form-control" placeholder="Duration">
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div><div class="input-group mb-3">
          <input type="text" name="InvitationCode" class="form-control" placeholder="Invitation Code">
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="mb-1">
          <h6 class="font-weight-bold pt-1 pb-1">Fields:</h6>
          <div>
            <select class="form-control" name="FieldsId" id="">
            <option value="" selected>-- Pilih Fields --</option>
              <?php
                foreach($FIELDS as $f){?>
                  <option value="<?= $f->ID; ?>"><?= $f->ID; ?> - <?= $f->NAME; ?></option>
              <?php
                }
              ?>
            </select>
          </div>
        </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
</body>
</html>