<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Side Menu Dashboard</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styleDas.css" /><!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap-slider.css">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="<?php echo base_url(); ?>assets/plugins/slick-carousel/slick/slick.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
    <!-- Fancy Box -->
    <link href="<?php echo base_url(); ?>assets/plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <!-- CUSTOM CSS -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
  </head>
  <body>
    <div class="sidebar">
      <div class="sidebar-user">
        <div class="image">
          <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $this->session->IMAGE; ?>" alt="" />
        </div>
        <h4 class="username"><?php echo $this->session->NAME; ?></h4>
      </div>
      <a href="<?= base_url(); ?>index.php/C_owner" class="<?php if ($menu == "venue") { echo "active"; }else{ echo "";}; ?>"><i class="fas fa-desktop"></i><span>Venue</span></a>
      <a href="<?= base_url(); ?>index.php/C_owner/viewFields" class="<?php if ($menu == "fields") { echo "active"; }else{ echo "";}; ?>"><i class="fas fa-cogs"></i><span>List Field</span></a>
      <a href="<?= base_url(); ?>index.php/C_owner/viewBooking" class="<?php if ($menu == "booking") { echo "active"; }else{ echo "";}; ?>"><i class="fas fa-table"></i><span>List Bookings</span></a>
      <a href="<?= base_url(); ?>index.php/C_login/logout"><i class="fas fa-sliders-h"></i><span>LogOut</span></a>
    </div>