<div class="content">
  <div class="body-content">
    <div class="detail" style="width: 100%;">
      <h6>FIELDS INFO</h6>
    </div>
    <div class="widget dashboard-container my-adslist">
      <table class="table table-responsive">
        <tbody>
          <tr>
            <td>
              <h3 class="title"><?= $Field['NAME']; ?></h3>
            </td>
          </tr>
          <tr>
            <td>
              <span class="add-id"><strong>Rating : </strong></span>
            </td>
            <td><?= $Field['RATING']; ?></td>
          </tr>
          <tr>
            <td>
              <span class="add-id"><strong>Price : </strong></span>
            </td>
            <td>Rp.<?= $Field['PRICE']; ?></td>
          </tr>
          <tr>
            <td>
              <span><strong>Description : </strong></span>
            </td>
            <td><?= $Field['DESCRIPTION']->load(); ?></td>
          </tr>

        </tbody>
      </table>
    </div>
    <section class="popular-deals section bg-gray">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-title">
              <h5>List Booking in Fields</h5>
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
          <!-- offer 01 -->

          <?php foreach ($Booking as $row) { ?>
            <div class="col-lg-6">
              <div class="card mb-3" style="max-width: 400px;">
                <div class="row no-gutters">
                  <div class="col" style="padding:20px; box-sizing:auto;">
                    <p class="card-text"><?= $row['START_DATE']; ?></p>
                  </div>
                  <div class="col" style="padding:20px; box-sizing:auto;">
                    <p class="card-text"><?= $row['END_DATE']; ?></p>
                  </div>
                  <div class="col" style="padding:20px; box-sizing:auto;">
                    <p class="card-text"><?= $row['INVITATION_CODE']; ?></p>
                  </div>
                  <div class="col" style="padding:20px; box-sizing:auto;">
                    <a href="<?php echo base_url(); ?>index.php/C_owner/detailBooking/<?php echo $row['ID']; ?>"><button class="btn-sm btn-primary" style="border: none;">Lihat detail</button></a>
                  </div>
                  <div class="col" style="padding:20px; box-sizing:auto;">
                    <a href="<?php echo base_url(); ?>index.php/C_owner/deleteBooking/<?php echo $row['ID']; ?>"><button class="btn-sm btn-danger" style="border: none;">Delete Booking</button></a>
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