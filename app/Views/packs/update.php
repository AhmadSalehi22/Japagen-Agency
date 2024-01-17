<main class="form-update">
  <?= form_open('packs/update') ?>
  <div class="containter mt-4">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h5>Update Package
              <a href="<?= base_url('packs/manage') ?>" class="btn btn-danger btn-sm float-end">Back</a>
            </h5>
          </div>
          <div class="card-body">
            <?php
            $pack_id = $_GET['id'];
            $key = array_search($pack_id, array_column($packages, 'pack_id'));
            $pack = $packages[$key];
            $tour_key = array_search($pack_id, array_column($tours, 'pid'));
            $tour = $tours[$tour_key];
            $flight_key = array_search($pack_id, array_column($flights, 'pid'));
            $flight = $flights[$flight_key];
            $hotel_key = array_search($pack_id, array_column($hotels, 'pid'));
            $hotel = $hotels[$hotel_key];
            ?>
            <div class="form-row">
              <div class="form-group col-md-2 my-2">
                <label>Pack ID</label>
                <input type="input" name="pack_id_show" class="form-control" disabled value=<?php echo $pack->pack_id; ?>>
                <!-- If the input is disabled we can't get the value, so we make a hidden one to get the Package ID! -->
                <input type="input" name="pack_id" class="form-control" hidden value=<?php echo $pack->pack_id; ?>>
              </div>
              <div class="form-group col-md-6 my-2">
                <label>Name</label>
                <textarea type="text" name="name" class="form-control"><?php echo htmlspecialchars($pack->name, ENT_QUOTES, 'UTF-8'); ?></textarea>
                <div id="packNameHelp" class="form-text">Max 50 characters</div>
              </div>
              <div class="form-group col-md-12 my-2">
                <label>Description</label>
                <textarea type="text" name="description" class="form-control"><?php echo htmlspecialchars($pack->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
                <div id="packDescHelp" class="form-text">Max 500 characters</div>
              </div>
              <div class="form-group col-md-3 my-2">
                <label>Start Date</label>
                <input type="date" name="start_date" class="form-control" value=<?php echo htmlspecialchars($pack->start_date, ENT_QUOTES, 'UTF-8'); ?>
                  placeholder="Start Date">
              </div>
            </div>
            <div class="form-group col-md-3 my-2">
              <label>End Date</label>
              <input type="date" name="end_date" class="form-control" value=<?php echo htmlspecialchars($pack->end_date, ENT_QUOTES, 'UTF-8'); ?>
                placeholder="End Date">
            </div>
            <div class="form-group col-md-2 my-2">
              <label>Price</label>
              <input type="input" name="price" class="form-control" value=<?php echo htmlspecialchars($pack->price, ENT_QUOTES, 'UTF-8'); ?>
                placeholder="New Price for the Pack">
            </div>
            <!-- Flight Information -->
            <div class="form-group col-md-4 my-2">
              <hr style="width:300%">
              <h5> Flight Information </h5>
              <hr style="width:300%">
            </div>
            <div class="form-group col-md-4">
              <label class="mt-1">Flight Number</label>
              <input type="input" name="flight_number" class="form-control mt-1" value=<?php echo htmlspecialchars($flight->flight_num, ENT_QUOTES, 'UTF-8'); ?>
              placeholder="Flight Number">
            </div>
            <div class="form-group col-md-4">
              <label class="mt-1">Origin Airport</label>
              <input type="input" name="origin" class="form-control mt-1" value=<?php echo htmlspecialchars($flight->origin, ENT_QUOTES, 'UTF-8'); ?>
              placeholder="Origin">
            </div>
            <div class="form-group col-md-4">
              <label class="mt-1">Destination Airport</label>
              <input type="input" name="destination" class="form-control mt-1" value=<?php echo htmlspecialchars($flight->destination, ENT_QUOTES, 'UTF-8'); ?>
              placeholder="Destination">
            </div>
            <div class="form-group col-md-3">
              <label class="mt-1">Flight Time</label>
              <input type="time" name="flight_time" class="form-control mt-1" value=<?php echo htmlspecialchars($flight->time, ENT_QUOTES, 'UTF-8'); ?>>
            </div>
            <!-- Hotel Information -->
            <div class="form-group col-md-4 my-2">
              <hr style="width:300%">
              <h5> Hotel Information </h5>
              <hr style="width:300%">
            </div>
            <div class="form-group col-md-4">
              <label class="mt-1">Name</label>
              <input type="input" name="hotel_name" class="form-control mt-1" value=<?php echo htmlspecialchars($hotel->name, ENT_QUOTES, 'UTF-8'); ?>
              placeholder="Hotel Name">
            </div>
            <div class="form-group col-md-2">
              <label class="mt-1">Rating</label>
              <input type="input" name="hotel_rating" class="form-control mt-1" value=<?php echo htmlspecialchars($hotel->rating, ENT_QUOTES, 'UTF-8'); ?>
              placeholder="Rating">
              <div id="hotelRatingHelp" class="form-text">
                Number of ⭐s
              </div>
            </div>
            <div class="form-group col-md-12">
              <label class="mt-1">Location</label>
              <textarea type="input" name="location" class="form-control mt-1" placeholder="Address"><?php echo htmlspecialchars($hotel->location, ENT_QUOTES, 'UTF-8'); ?></textarea>
            </div>
            <div class="form-group col-md-12">
              <label class="mt-1">Includes</label>
              <textarea type="input" name="options" class="form-control mt-1"
                placeholder="Hotel/Room Options"><?php echo htmlspecialchars($hotel->options, ENT_QUOTES, 'UTF-8'); ?>
              </textarea>
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
              <textarea type="input" name="day1" class="form-control mt-1"
              placeholder="Tour Location"><?php echo htmlspecialchars($tour->day1, ENT_QUOTES, 'UTF-8'); ?></textarea>
            </div>
            <div class="form-group col-md-4">
              <label class="mt-1">Day Two</label>
              <textarea type="input" name="day2" class="form-control mt-1"
              placeholder="Tour Location"><?php echo htmlspecialchars($tour->day2, ENT_QUOTES, 'UTF-8'); ?></textarea>
            </div>
            <div class="form-group col-md-4">
              <label class="mt-1">Day Three</label>
              <textarea type="input" name="day3" class="form-control mt-1"
              placeholder="Tour Location"><?php echo htmlspecialchars($tour->day3, ENT_QUOTES, 'UTF-8'); ?></textarea>
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
            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-primary mt-2">Update Package</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </form>