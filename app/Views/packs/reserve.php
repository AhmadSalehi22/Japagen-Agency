<body>
    <main class="pack-reserve">
        <?= form_open('packs/reserve') ?>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card text-center d-flex">
                        <h5 class="card-header">
                            Finalise Reserve Package
                        </h5>
                        <div class="row mx-2">
                            <?php
                            $pack_id = $_GET['id'];
                            $key = array_search($pack_id, array_column($packages, 'pack_id'));
                            $pack = $packages[$key];
                            ?>
                            <input type="input" name="pack_id" class="form-control" hidden value=<?php echo $pack->pack_id; ?>>
                            <input type="input" name="user_id" class="form-control" hidden value=<?php echo session('user')->id ?>>
                            <div class="col">
                                <div class="card my-2" style="width: 20rem;">
                                    <img src="<?php echo $pack->image; ?>"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?php echo htmlspecialchars($pack->name, ENT_QUOTES, 'UTF-8'); ?>
                                        </h5>
                                        <p class="card-text">
                                            <?php echo $pack->description; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card my-2" style="width: 20rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            Are you Sure you want to reserve this package?
                                        </h5>
                                        <p class="card-text">
                                        <table class="table table-bordered table-hover">
                                            <tr>
                                                <th>Title:</th>
                                                <th>
                                                    <?php echo htmlspecialchars($pack->name, ENT_QUOTES, 'UTF-8'); ?>
                                                </th>
                                                <!-- We can use td for table data if we don't want it bold -->
                                            </tr>
                                            <tr>
                                                <th>Start Date:</th>
                                                <td>
                                                    <?php echo htmlspecialchars($pack->start_date, ENT_QUOTES, 'UTF-8'); ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>End Date:</th>
                                                <td>
                                                    <?php echo htmlspecialchars($pack->end_date, ENT_QUOTES, 'UTF-8'); ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Price:</th>
                                                <th>
                                                    <?php echo htmlspecialchars($pack->price, ENT_QUOTES, 'UTF-8'); ?>€
                                                </th>
                                            </tr>
                                        </table>
                                        </p>
                                        <p class="card-text">
                                            <button type="submit" class="btn btn-success">Reserve</button>
                                            <a href="#" class="btn btn-danger">Cancel</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>