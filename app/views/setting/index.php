<?php build('content') ?>
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Setting</h4>
		</div>

		<div class="card-body">
			<div class="row">
				<div class="col-md-5">
					<div class="card">
						<div class="card-header">
							<a href="<?php echo _route('schedule:index')?>"><h4>Max Appointment Setting</h4></a>
						</div>
					</div>
				</div>

				<div class="col-md-5">
					<div class="card">
						<div class="card-header">
							<a href="<?php echo _route('rsv-setting:index')?>"><h4>Reservations' Fee setting</h4></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endbuild()?>
<?php loadTo()?>