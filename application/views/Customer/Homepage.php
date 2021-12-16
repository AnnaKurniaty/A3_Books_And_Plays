  <div class="content">
    <div class="body-content">
      <section class="popular-deals section bg-gray">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-title">
                <h5>List Venue</h5>
                <hr>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- offer 01 -->
            <?php foreach ($Venues as $row) { ?>
              <div class="col-lg-6">
                    <!-- product card -->
                      
                          <div class="product-item bg-light" style="border-radius: 10px;">
                            <div class="card" style="border-radius: 10px;">
                              <table>
                                <tr>
                                    <td rowspan="5" width="200px"> 
                                      <img style="height: 150px; width: 200px; border-top-left-radius: 10px; border-bottom-left-radius: 10px;" src="<?php echo base_url(); ?>assets/images/venues/<?php echo $row->IMAGE; ?>" alt="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10px"> <?= $row->NAME; ?></td>
                                </tr>
                                  <tr>
                                      <td height="10px">Rating</td>
                                  </tr>
                                <tr>
                                    <td>Description</td>
                                </tr>
                                <tr>
                                    <td height="10px"><button>Lihat Detail</button></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                      
          </div>  
          <?php } ?>
        </div>
      </div>
    </section>
    </div>
</div>
