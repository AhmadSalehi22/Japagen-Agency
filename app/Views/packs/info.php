<!-- Page Content-->
<div class="container px-4 px-lg-5">
    <!-- Heading Row-->
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
    <div class="row gx-4 gx-lg-5 align-items-center my-5">
        <div class="col-lg-7">
            <img class="img-fluid rounded mb-4 mb-lg-0"
                src="<?php echo $pack->image; ?>" alt="..." />
        </div>
        <div class="col-lg-5">
            <h1 class="font-weight-light">
                <?php echo htmlspecialchars($pack->name, ENT_QUOTES, 'UTF-8'); ?>
            </h1>
            <p>
                <?php echo htmlspecialchars($pack->description, ENT_QUOTES, 'UTF-8'); ?>
            </p>
            <a class="btn btn-primary" href="<?php echo base_url('packs/reserve?id=' . $pack->pack_id); ?>">Reserve package</a>
        </div>
    </div>
    <!-- Content Row-->
    <div class="row gx-4 gx-lg-5">
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <div class="card-body">
                    <h2 class="card-title">Flight Information</h2>
                    <p class="card-text">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Flight Num:</th>
                            <th>
                                <?php echo htmlspecialchars($flight->flight_num, ENT_QUOTES, 'UTF-8'); ?>
                            </th>
                            <!-- We can use td for table data if we don't want it bold -->
                        </tr>
                        <tr>
                            <th>Origin Airport:</th>
                            <td>
                                <?php echo htmlspecialchars($flight->origin, ENT_QUOTES, 'UTF-8'); ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Dest. Airport:</th>
                            <td>
                                <?php echo htmlspecialchars($flight->destination, ENT_QUOTES, 'UTF-8'); ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Date:</th>
                            <th>
                                <?php echo htmlspecialchars($pack->start_date, ENT_QUOTES, 'UTF-8'); ?>
                            </th>
                        </tr>
                        <tr>
                            <th>Time:</th>
                            <th>
                                <?php echo htmlspecialchars($flight->time, ENT_QUOTES, 'UTF-8'); ?>
                            </th>
                        </tr>
                    </table>
                    </p>
                </div>
                <div class="card-footer">
                <a class="btn btn-primary btn-sm"
                        href="<?php echo htmlspecialchars($hotel->website, ENT_QUOTES, 'UTF-8'); ?>">Flight Info</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <div class="card-body">
                    <h2 class="card-title">Hotel Information</h2>
                    <p class="card-text">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Hotel Name:</th>
                            <td>
                                <?php echo htmlspecialchars($hotel->name, ENT_QUOTES, 'UTF-8'); ?>
                            </td>
                            <!-- We can use td for table data if we don't want it bold -->
                        </tr>
                        <tr>
                            <th>Rating:</th>
                            <th>
                                <?php echo htmlspecialchars($hotel->rating, ENT_QUOTES, 'UTF-8'); ?>★
                            </th>
                        </tr>
                        <tr>
                            <th>Location:</th>
                            <th>
                                <?php echo htmlspecialchars($hotel->location, ENT_QUOTES, 'UTF-8'); ?>
                            </th>
                        </tr>
                        <tr>
                            <th>Includes:</th>
                            <td>
                                <?php echo htmlspecialchars($hotel->options, ENT_QUOTES, 'UTF-8'); ?>
                            </td>
                        </tr>
                    </table>
                    </p>
                </div>
                <div class="card-footer"><a class="btn btn-primary btn-sm"
                        href="<?php echo htmlspecialchars($hotel->website, ENT_QUOTES, 'UTF-8'); ?>">Hotel Website</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card h-70">
                <div class="card-body">
                    <h2 class="card-title">Tour Information</h2>
                    <p class="card-text">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>First Day:</th>
                            <td>
                                <?php echo htmlspecialchars($tour->day1, ENT_QUOTES, 'UTF-8'); ?>
                            </td>
                            <!-- We can use td for table data if we don't want it bold -->
                        </tr>
                        <tr>
                            <th>Second Day:</th>
                            <td>
                                <?php echo htmlspecialchars($tour->day2, ENT_QUOTES, 'UTF-8'); ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Last Day:</th>
                            <th>
                                <?php echo htmlspecialchars($tour->day3, ENT_QUOTES, 'UTF-8'); ?>
                            </th>
                        </tr>
                    </table>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>