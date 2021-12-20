<div class="content">
  <div class="body-content">
    <div class="detail" style="width: 100%;">
      <h6>Booking INFO</h6>
    </div>
    <div class="widget dashboard-container my-adslist">
      <table class="table table-responsive">
        <tbody>
          <tr>
            <td>
              <h3 class="title">Bookingan Atas Nama <strong><?= $Booking['USER_BOOKING']; ?></strong></h3>
            </td>
          </tr>
          <tr>
            <td>
              <span class="add-id"><strong>Tanggal Mulai : </strong></span>
            </td>
            <td><?= $Booking['START_DATE']; ?></td>
          </tr>
          <tr>
            <td>
              <span class="add-id"><strong>Tanggal Berakhir : </strong></span>
            </td>
            <td><?= $Booking['END_DATE']; ?></td>
          </tr>
          <tr>
            <td>
              <span class="add-id"><strong>Durasi Bermain : </strong></span>
            </td>
            <td><?= $Booking['DURATION']; ?> Jam</td>
          </tr>
          <tr>
            <td>
              <span class="add-id"><strong>Invitation Code : </strong></span>
            </td>
            <td><?= $Booking['INVITATION_CODE']; ?></td>
          </tr>
        </tbody>
      </table>
    </div>

    <section class="popular-deals section bg-gray">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-title">
              <h5>List Player in Booking</h5>
              <a href="<?php echo base_url(); ?>index.php/C_customer/<?= ($JoinStatus == 0) ? 'joinBooking' : 'unjoinBooking'; ?>/<?php echo $Booking['ID']; ?>">
                <button class="btn btn-primary"><?= ($JoinStatus == 0) ? 'Join' : 'Unjoin'; ?></button>
              </a>
              <hr>
            </div>
          </div>
        </div>
        <div class="row">

          <?php foreach ($Player as $row) { ?>
            <div class="col-lg-6">
              <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                  <div class="col" style="padding:20px; box-sizing:auto;">
                    <p class="card-text"><?= $row['USER_NAME']; ?></p>
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