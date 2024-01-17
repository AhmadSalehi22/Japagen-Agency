<body>
	<div class="container mt-5">
		<div class="card">
			<h5 class="card-header">
				All Data
				<a href="<?= base_url('packs/add'); ?>" class="btn btn-sm btn-success float-end">Add</a>
			</h5>
			<div class="card-body">
				<table class="table table-bordered table-hover">
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Start Date</th>
						<th>End Date</th>
						<th>Price</th>
						<th>Actions</th>
					</tr>
					<?php
					foreach ($packages as $pack) {
						?>
						<tr>
							<td>
								<?php echo htmlspecialchars($pack->pack_id, ENT_QUOTES, 'UTF-8'); ?>
							</td>
							<td>
								<?php echo htmlspecialchars($pack->name, ENT_QUOTES, 'UTF-8'); ?>
							</td>
							<td>
								<?php echo htmlspecialchars($pack->start_date, ENT_QUOTES, 'UTF-8'); ?>
							</td>
							<td>
								<?php echo htmlspecialchars($pack->end_date, ENT_QUOTES, 'UTF-8'); ?>
							</td>
							<td>
								<?php echo htmlspecialchars($pack->price, ENT_QUOTES, 'UTF-8'); ?>
							</td>
							<td>
								<a type="button" href="<?php echo base_url('packs/delete/' . $pack->pack_id); ?>"
									class="btn btn-sm btn-danger">Delete
								</a>
								<a type="button" href="<?php echo base_url('packs/update?id=' . $pack->pack_id); ?>"
									class="btn btn-sm btn-warning">Update
								</a>
							</td>
						</tr>
						<?php
					}
					?>
				</table>
			</div>
		</div>
	</div>
</body>