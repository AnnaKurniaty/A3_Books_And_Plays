<div class="content">
    <div class="body-content">
      <section class="popular-deals section bg-gray" >
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-title">
                <h5>Review</h5>
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
          <?php foreach ($Review as $row) { ?>
            <div class="col-lg-12">
              <div class="card mb-3" style="max-width: 1040px;">
                <div class="row no-gutters">
                  <div class="col" style="padding:20px; box-sizing:auto; margin-top:15px;text-align:center;">
                    <p class="card-text"><?= $row['REVIEW_DATE']; ?></p>
                  </div>
                  <div class="col" style="padding:20px; box-sizing:auto; margin-top:15px;text-align:center;">
                    <p class="card-text"><?= $row['STARS']; ?></p>
                  </div>
                  <div class="col" style="padding:20px; box-sizing:auto; margin-top:20px; text-align:center;">
                    <p class="card-text"><?= $row['TEXT']->load(); ?></p>
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