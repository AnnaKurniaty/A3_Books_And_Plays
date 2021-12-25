<div class="content">
    <div class="body-content">
        <div class="detail" style="width: 100%;">
            <h6>VENUE INFO</h6>
        </div>
        <div class="widget dashboard-container my-adslist">
        <table class="table table-responsive">
            <tbody>
              <tr>
                  <td>
                    <h3 class="title"><?= $Venue['NAME']; ?></h3>
                  </td>
              </tr>
              <tr>
                <td>
                  <span class="add-id"><strong>Phone</strong></span>
                </td>
                <td>:</td>
                <td><?= $Venue['PHONE']; ?></td>
              </tr>
              <tr>
                <td>
                  <span><strong>Description</strong></span>
                </td>
                <td>:</td>
                <td><?= $Venue['DESCRIPTION']->load(); ?></td>
              </tr>
              <tr>
                <td>
                  <span><strong>Open Time</strong></span>
                </td>
                <td>:</td>
                <td><?= $Venue['OPEN_TIME']; ?></td>
              </tr>
              <tr>
                <td>
                  <span><strong>Close Time</strong></span>
                </td>
                <td>:</td>
                <td><?= $Venue['CLOSED_TIME']; ?></td>
              </tr>
              <tr>
                <td>
                  <span><strong>Address</strong></span>
                </td>
                <td>:</td>
                <td><?= $Address?></td>
              </tr>
            </tbody>
        </table>
        </div>
        <section class="popular-deals section bg-gray" >
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-title">
                <h5>List Fields in Venue</h5>
                <hr>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- offer 01 -->
            <?php foreach ($Fields as $row) { ?>
              <?php if($row['IS_ACTIVE'] == '1') : ?>
                <div class="col-lg-6">
                <div class="card mb-3" style="max-width: 540px;">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                      <img src="<?php echo base_url(); ?>assets/images/fields/<?php echo $row['IMAGE']; ?>" class="card-img img-responsive" alt="venues_image" style="width:100%; height:100%;object-fit:cover;">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title"><?= $row['NAME']; ?></h5>
                        <p class="card-text" style="display:block; text-overflow:ellipsis; word-wrap:break-word; overflow:hidden; max-height:100px;"><?= $row['DESCRIPTION']; ?></p>
                        <a href="<?php echo base_url(); ?>index.php/C_owner/detailField/<?php echo $row['ID']; ?>"><button class="btn-sm btn-primary" style="border: none;">Lihat detail</button></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php endif ?>
            <?php } ?>
          </div>
        </div>
      </section>
    </div>
  </div>