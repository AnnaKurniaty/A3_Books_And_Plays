<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Side Menu Dashboard</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styleDas.css" />
  </head>
  <body>
    <div class="sidebar">
	  <div class="title">
			<span>Book And Play</span>
	  </div>
      <div class="image">
        <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $this->session->IMAGE; ?>" alt="" />
      </div>
      <h4 class="username"><?php echo $this->session->NAME; ?></h4>
      <a href="<?= base_url(); ?>index.php/C_customer" class="<?php if ($menu == "dasboard") { echo "active"; }else{ echo "";}; ?>"><i class="fas fa-desktop"></i><span>List Venue</span></a>
      <a href="<?= base_url(); ?>index.php/C_customer/testing" class="<?php if ($menu == "testing") { echo "active"; }else{ echo "";}; ?>"><i class="fas fa-cogs"></i><span>List Field</span></a>
      <a href="#"><i class="fas fa-table"></i><span>List My Bookings</span></a>
      <a href="#"><i class="fas fa-th"></i><span>Enter Invitation Code</span></a>
      <a href="<?= base_url(); ?>index.php/C_login/logout"><i class="fas fa-sliders-h"></i><span>LogOut</span></a>
    </div>
	<div class="content">
		<div class="grid">
			<div class="grid-1">1</div>
			<div class="grid-1">2</div>
			<div class="grid-1">3</div>
			<div class="grid-1">4</div>
			<div class="grid-1">5</div>
		</div>
	</div>
  </body>
</html>
