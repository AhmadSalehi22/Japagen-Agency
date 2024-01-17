<body>
	<div class="container mt-5">
		<div class="card">
			<h5 class="card-header">
                All reserved Packages
			</h5>
			<div class="card-body">
				<table class="table table-bordered table-hover">
					<tr>
						<th>#</th>
                        <th>Pack Name</th>
						<th>Date</th>
						<th>Time</th>
						<th>Price</th>
                        <th>Actions</th>
					</tr>
					<?php
                    $user_id = session('user')->id;
					foreach ($reservations as $res) {
                        if($res->user_id=$user_id){
                        $pack_id = $res->pack_id;
                        $key = array_search($pack_id, array_column($packages, 'pack_id'));
                        $pack = $packages[$key];
						?>
						<tr>
							<td>
								<?php echo htmlspecialchars($res->reserve_id, ENT_QUOTES, 'UTF-8'); ?>
							</td>
							<td>
								<?php echo htmlspecialchars($pack->name, ENT_QUOTES, 'UTF-8'); ?>
							</td>
							<td>
								<?php echo htmlspecialchars($res->date, ENT_QUOTES, 'UTF-8'); ?>
							</td>
							<td>
								<?php echo htmlspecialchars($res->time, ENT_QUOTES, 'UTF-8'); ?>
							</td>
							<td>
								<?php echo htmlspecialchars($pack->price, ENT_QUOTES, 'UTF-8'); ?>
							</td>
                            <td>
                                <a type="button" href="<?php echo base_url('packs/info?id=' . $pack->pack_id); ?>"
									class="btn btn-sm btn-success">Info
								</a>
							</td>
						</tr>
						<?php
                        } else {
                        ?>
                            <h5> No Data Found </h5>
                        <?php
                        }
					}
					?>
				</table>
			</div>
		</div>
	</div>
</body>