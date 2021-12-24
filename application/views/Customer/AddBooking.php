<div class="content">
  <div class="body-content">
      <section class="ad-post bg-gray py-5">
          <div class="container">
              <form action="<?php echo base_url("index.php/C_booking/addBooking"); ?>" method="POST">
                  <fieldset class="border border-gary p-4 mb-5">
                          <div class="row">
                              <div class="col-lg-12">
                                  <h3>Add Booking</h3>
                              </div>
                              <div class="col-lg-6">
                                  <input type="hidden" name="UsersId" value="<?php echo $this->session->ID; ?>">
                                  <h6 class="font-weight-bold pt-4 pb-1">Date Start:</h6>
                                  <input type="datetime-local" 
                                    name="PlayDateStart" 
                                    class="border w-100 p-2 bg-white text-capitalize" 
                                    placeholder="Play Date Start"
                                    required
                                  >
                                  <h6 class="font-weight-bold pt-4 pb-1">Duration:</h6>
                                  <input type="number" name="Duration" class="border w-100 p-2 bg-white text-capitalize" placeholder="Duration" min="1" required>
                                  <input type="number" name="FieldId" value="<?= $Field ?>" hidden>
                                  <input type="number" name="UserId" value="<?= $_SESSION['ID'] ?>" hidden>
                              </div>
                  </fieldset>
                  <button type="submit" class="btn btn-primary d-block mt-2">Submit</button>
              </form>
          </div>
      </section>
  </div>
</div>


