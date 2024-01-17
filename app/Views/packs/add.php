<main class="form-add">
  <?= form_open('packs/add') ?>
  <?= csrf_field() ?>
  <div class="containter mt-4">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h5>Add Package
              <a href="<?= base_url('packs/manage') ?>" class="btn btn-danger btn-sm float-end">Back</a>
            </h5>
          </div>
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Name</label>
                <input type="input" name="name" class="form-control mt-1" placeholder="Name of the pack">
              </div>
              <div class="form-group col-md-12">
                <label class="mt-1">Description</label>
                <textarea type="input" name="description" class="form-control mt-1"
                  placeholder="Description for the pack"></textarea>
              </div>
              <label class="mt-1">Image Address</label>
              <div class="row">
                <div class="col-md-8">
                  <textarea class="form-control my-2" type="text" name="image"></textarea>
                </div>
                <div class="col">
                  <a href="<?php echo base_url('image/upload'); ?>" class="btn btn-primary my-2">Go to Image
                    Uploader</a>
                </div>
                <div id="imageHelp" class="form-text">
                Upload the Image using our uploader and enter the link
              </div>
              </div>
              <div class="form-group col-md-3">
                <label class="mt-1">Start Date</label>
                <input type="date" name="start_date" class="form-control mt-1" placeholder="Start Date">
              </div>
            </div>
            <div class="form-group col-md-3">
              <label class="mt-1">End Date</label>
              <input type="date" name="end_date" class="form-control mt-1" placeholder="End Date">
            </div>
            <div class="form-group col-md-4">
              <label class="mt-1">Price</label>
              <input type="input" name="price" class="form-control mt-1" placeholder="Price for the Pack">
            </div>
            <!-- Flight Information -->
            <div class="form-group col-md-4 my-2">
              <hr style="width:300%">
              <h5> Flight Information </h5>
              <hr style="width:300%">
            </div>
            <div class="form-group col-md-4">
              <label class="mt-1">Flight Number</label>
              <input type="input" name="flight_number" class="form-control mt-1" placeholder="Flight Number">
            </div>
            <div class="form-group col-md-4">
              <label class="mt-1">Origin Airport</label>
              <input type="input" name="origin" class="form-control mt-1" placeholder="Origin">
            </div>
            <div class="form-group col-md-4">
              <label class="mt-1">Destination Airport</label>
              <input type="input" name="destination" class="form-control mt-1" placeholder="Destination">
            </div>
            <div class="form-group col-md-3">
              <label class="mt-1">Flight Time</label>
              <input type="time" name="flight_time" class="form-control mt-1" placeholder="Destination">
            </div>
            <!-- Hotel Information -->
            <div class="form-group col-md-4 my-2">
              <hr style="width:300%">
              <h5> Hotel Information </h5>
              <hr style="width:300%">
            </div>
            <div class="form-group col-md-4">
              <label class="mt-1">Name</label>
              <input type="input" name="hotel_name" class="form-control mt-1" placeholder="Hotel Name">
            </div>
            <div class="form-group col-md-2">
              <label class="mt-1">Rating</label>
              <input type="input" name="hotel_rating" class="form-control mt-1" placeholder="Rating">
              <div id="hotelRatingHelp" class="form-text">
                Number of ⭐s
              </div>
            </div>
            <div class="form-group col-md-12">
              <label class="mt-1">Location</label>
              <textarea type="input" name="location" class="form-control mt-1" placeholder="Address"></textarea>
            </div>
            <div class="form-group col-md-12">
              <label class="mt-1">Includes</label>
              <textarea type="input" name="options" class="form-control mt-1"
                placeholder="Hotel/Room Options"></textarea>
            </div>
            <!-- Tour Information -->
            <div class="form-group col-md-4 my-2">
              <hr style="width:300%">
              <h5> Tour Information </h5>
              <hr style="width:300%">
              <div id="tourHelp" class="form-text">
                If there's no tour, Put "-"
              </div>
            </div>
            <div class="form-group col-md-4">
              <label class="mt-1">Day One</label>
              <input type="input" name="day1" class="form-control mt-1" placeholder="Tour Location">
            </div>
            <div class="form-group col-md-4">
              <label class="mt-1">Day Two</label>
              <input type="input" name="day2" class="form-control mt-1" placeholder="Tour Location">
            </div>
            <div class="form-group col-md-4">
              <label class="mt-1">Day Three</label>
              <input type="input" name="day3" class="form-control mt-1" placeholder="Tour Location">
            </div>
            <span class="error">
              <?= \Config\Services::validation()->listErrors(); ?>
            </span>
            <span class="error">
              <?php if (session()->getFlashdata('msg')): ?>
                <div class="alert alert-danger">
                  <?= session()->getFlashdata('msg') ?>
                </div>
              <?php endif; ?>
            </span>
            <div class="mt-3 text-center">
              <button type="submit" class="btn btn-primary mt-2">Add Package</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </form>