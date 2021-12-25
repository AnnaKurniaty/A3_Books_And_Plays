<div class="content">
  <div class="body-content">
      <section class="ad-post bg-gray py-5">
          <div class="container">
              <form action="<?php echo base_url("index.php/C_owner/addVenue"); ?>" method="POST">
                  <fieldset class="border border-gary p-4 mb-5">
                          <div class="row">
                              <div class="col-lg-12">
                                  <h3>Add Venue</h3>
                              </div>
                              <div class="col-lg-6">
                                  <input type="hidden" name="UsersId" value="<?php echo $this->session->ID; ?>">
                                  <h6 class="font-weight-bold pt-4 pb-1">Name:</h6>
                                  <input type="text" name="Name" class="border w-100 p-2 bg-white text-capitalize" placeholder="Name" required>
                                  <h6 class="font-weight-bold pt-4 pb-1">Phone:</h6>
                                  <input type="number" name="Phone" class="border w-100 p-2 bg-white text-capitalize" placeholder="Phone" min="1" required>
                                  <h6 class="font-weight-bold pt-4 pb-1">Description:</h6>
                                  <textarea name="Description" class="border w-100 p-2 bg-white text-capitalize" placeholder="Description" required></textarea>
                                  <h6 class="font-weight-bold pt-4 pb-1">Image:</h6>
                                  <input type="file" class="form-control-file" id="file-upload" name="image" required>
                              </div>
                              <div class="col-lg-6">
                                  <h6 class="font-weight-bold pt-4 pb-1">Open Time:</h6>
                                  <input type="time" name="open_time"  class="border w-100 p-2 bg-white text-capitalize" required>
                                  <h6 class="font-weight-bold pt-4 pb-1">Closed Time:</h6>
                                  <input type="time" name="closed_time" class="border w-100 p-2 bg-white text-capitalize" required>
                                  <input type="number" name="UserId" value="<?= $_SESSION['ID'] ?>" hidden>
                                  <h6 class="font-weight-bold pt-4 pb-1">Address:</h6>
                                  <textarea name="Address" class="border w-100 p-2 bg-white text-capitalize" placeholder="Address" required></textarea>
                                  <h6 class="font-weight-bold pt-4 pb-1">Post Code:</h6>
                                  <input type="number" name="post_code" class="border w-100 p-2 bg-white text-capitalize" placeholder="Post Code" min="1" required>
                                  <h6 class="font-weight-bold pt-4 pb-1">Cities:</h6>
                                  <select class="form-control" name="city_id" id="CITIES_ID">
                                    <option value="" selected>-- Choose Cities --</option>
                                    <?php
                                        foreach($Cities as $r){?>
                                        <option value="<?= $r['ID']; ?>"><?= $r['CITY_NAME']; ?></option>
                                    <?php
                                        }
                                    ?>
                                  </select>
                              </div>
                  </fieldset>
                  <button type="submit" class="btn btn-primary d-block mt-2">Submit</button>
              </form>
          </div>
      </section>
  </div>
</div>


