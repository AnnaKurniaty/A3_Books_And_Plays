<div class="content">
  <div class="body-content">
      <section class="ad-post bg-gray py-5">
          <div class="container">
              <form action="<?php echo base_url("index.php/C_booking/addReview"); ?>" method="POST">
                  <fieldset class="border border-gary p-4 mb-5">
                          <div class="row">
                              <div class="col-lg-12">
                                  <h3>Add Review</h3>
                              </div>
                              <div class="col-lg-6">
                                  <input type="hidden" name="UsersId" value="<?php echo $this->session->ID; ?>">
                                  <h6 class="font-weight-bold pt-4 pb-1">Date Review:</h6>
                                  <input type="date" 
                                    name="DateReview" 
                                    class="border w-100 p-2 bg-white text-capitalize" 
                                    placeholder="Date Review"
                                    required
                                  >
                                  <h6 class="font-weight-bold pt-4 pb-1">Stars:</h6>
                                  <input type="number" name="Stars" class="border w-100 p-2 bg-white text-capitalize" placeholder="Stars" min="1" required>
                                  <h6 class="font-weight-bold pt-4 pb-1">Text</h6>
                                  <textarea name="Text" class="border w-100 py-2 w-100 price" placeholder="Text" required> </textarea>
                                  <input type="number" name="FieldId" value="<?= $Booking ?>" hidden>
                                  <input type="number" name="UserId" value="<?= $_SESSION['ID'] ?>" hidden>
                              </div>
                  </fieldset>
                  <button type="submit" class="btn btn-primary d-block mt-2">Submit</button>
              </form>
          </div>
      </section>
  </div>
</div>


