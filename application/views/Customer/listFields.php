<div class="content">
    <div class="body-content">
      <section class="popular-deals section bg-gray" >
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-title">
                <h5>List Fields</h5>
                <hr>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- offer 01 -->
            <?php foreach ($Fields as $row) { ?>
              <?php if($row->IS_ACTIVE == '1') : ?>
                <div class="col-lg-6">
                <div class="card mb-3" style="max-width: 540px;">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                      <img src="<?php echo base_url(); ?>assets/images/fields/<?php echo $row->IMAGE; ?>" class="card-img img-responsive" alt="venues_image" style="width:100%; height:100%;object-fit:cover;">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title"><?= $row->NAME; ?></h5>
                        <p class="card-text"><small class="text-muted">Rating <span style="color:orange;"><?= $row->RATING; ?></span></small></p>
                        <p class="card-text" style="display:block; text-overflow:ellipsis; word-wrap:break-word; overflow:hidden; max-height:100px;"><?= $row->DESCRIPTION->load(); ?></p>
                        <a href="<?php echo base_url(); ?>index.php/C_customer/detailField/<?php echo $row->ID; ?>"><button class="btn-sm btn-primary" style="border: none;">Lihat detail</button></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php endif; ?>
            <?php } ?>
          </div>
        </div>
      </section>
    </div>
  </div>