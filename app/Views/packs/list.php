<body>
	<div class="container mt-5">
		<div class="card d-flex">
			<h5 class="card-header">
				All Available Packages
				<?php if (session('logged_in')): ?>
					<?php if (session('user')->role == 2): ?>
						<a href="<?= base_url('packs/manage'); ?>" class="btn btn-sm btn-success float-end">Manage</a>
					<?php endif; ?>
				<?php endif; ?>
			</h5>
			<div class="card-body d-flex flex-row">
				<?php
				foreach ($packages as $pack) {
					?>
					<div class="col-md-3 my-2">
						<div class="card" style="width: 18rem;">
							<img src="<?php echo $pack->image; ?>"
								class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">
									<?php echo htmlspecialchars($pack->name, ENT_QUOTES, 'UTF-8'); ?>
								</h5>
								<p class="card-text"><?php echo $pack->description; ?></p>
							</div>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<?php echo htmlspecialchars($pack->start_date, ENT_QUOTES, 'UTF-8'); ?>
									till
									<?php echo htmlspecialchars($pack->end_date, ENT_QUOTES, 'UTF-8'); ?>
								</li>
							</ul>
							<div class="card-body">
								<a href="<?php echo base_url('packs/info?id='.$pack->pack_id); ?>" class="btn btn-primary">Info</a>
								<a href="#" class="btn btn-danger"><?php echo htmlspecialchars($pack->price, ENT_QUOTES, 'UTF-8'); ?>€</a>
							</div>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</body>