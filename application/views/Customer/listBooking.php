<div class="content">
    <div class="body-content">
      <section class="popular-deals section bg-gray" >
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-title">
                <h5>List My Booking</h5>
                <hr>
              </div>
            </div>
          </div>
        <?php if (isset($_SESSION['message'])) : ?>
          <div class="alert <?= $_SESSION['type_message']; ?>" role="alert">
            <?= $this->session->flashdata('message'); ?>
            <?php unset($_SESSION['message']) ?>
          </div>
        <?php endif; ?>
        <div class="row">
          <?php foreach ($Booking as $row) { ?>
            <div class="col-lg-12">
              <div class="card mb-3" style="max-width: 1200px;">
                <div class="row no-gutters">
                  <div class="col-md-2">
                    <img src="<?php echo base_url(); ?>assets/images/fields/<?php echo $row['FIELD_IMAGE']; ?>" class="card-img img-responsive" alt="venues_image" style="width:100%; height:100%;object-fit:cover;">
                  </div>
                  <div class="col" style="padding:20px; box-sizing:auto; margin-top:15px;text-align:center;">
                    <p class="card-text"><?= $row['FIELD_NAME']; ?></p>
                  </div>
                  <div class="col" style="padding:20px; box-sizing:auto; margin-top:15px;text-align:center;">
                    <p class="card-text"><?= $row['START_DATE']; ?></p>
                  </div>
                  <div class="col" style="padding:20px; box-sizing:auto; margin-top:15px;text-align:center;">
                    <p class="card-text"><?= $row['END_DATE']; ?></p>
                  </div>
                  <div class="col" style="padding:20px; box-sizing:auto; margin-top:20px; text-align:center;">
                    <p class="card-text"><?= $row['DURATION']; ?> Jam</p>
                  </div>
                  <div class="col" style="padding:20px; box-sizing:auto; margin-top:20px;text-align:center;">
                    <p class="card-text"><?= $row['BOOKING_STATUS']; ?></p>
                  </div>
                  <div class="col" style="padding:20px; box-sizing:auto; margin-top:15px;">
                    <a href="<?php echo base_url(); ?>index.php/C_customer/detailBooking/<?php echo $row['BOOKINGS_ID']; ?>"><button class="btn-sm btn-primary" style="border: none;">Lihat detail</button></a>
                  </div>
                  <div class="col" style="padding:20px; box-sizing:auto; margin-top:15px;">
                    <a href="<?php echo base_url(); ?>index.php/C_customer/viewReview/<?php echo $row['BOOKINGS_ID']; ?>">
                      <button class="btn-sm btn-primary" style="border: none;" 
                      <?php if ($row['BOOKING_STATUS'] != "Game Over"): ?> 
                      disabled 
                    <?php endif; ?>
                      >Review</button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>
  </div>
</div>