<?php build('page-control')?>
<div class="page-header">
	<div>
		<h1>Appointment -> <?php echo $appointment->reference?></h1>
		<p>Check Appointment Details Here</p>
	</div>
	<div class="header-actions">
		<?php if(isEqual(whoIs('user_type'), [USER_TYPES['ADMIN'], USER_TYPES['STAFF']])) :?>
			<?php if(isEqual($appointment->status, 'pending')) :?>
				<a class="btn btn-success" href="<?php echo _route('appointment:approve', $appointment->id)?>">
					<span>✅</span> Approve
				</a>
			<?php endif?>
			<?php if(isEqual($appointment->status, 'approved')) :?>
				<a class="btn btn-success" href="<?php echo _route('appointment:arrived', $appointment->id)?>">
					<span>✅</span> Arrived
				</a>
			<?php endif?>

			<?php if(isEqual($appointment->status, 'arrived')) :?>
				<a class="btn btn-success" href="<?php echo _route('appointment:complete', $appointment->id)?>">
					<span>✅</span> Completed
				</a>
			<?php endif?>
		<?php endif?>


		<?php if(!isEqual($appointment->status, ['completed', 'cancelled'])) :?>
			<a class="btn danger" href="<?php echo _route('appointment:cancel', $appointment->id)?>">
				<span>⚙️</span> Cancel
			</a>
		<?php endif?>

		<a class="btn secondary" href="<?php echo _route('appointment:create')?>">
			<span>📂</span> Add New
		</a>

		<a class="btn secondary" href="<?php echo _route('appointment:index')?>">
			<span>⬅️</span> Back
		</a>
	</div>
</div>
<?php endbuild()?>

<?php build('content')?>
	<?php Flash::show()?>
	<div class="row">
		<div class="col-md-7">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Appointment</h4>
					<div class="row">
						<div class="col-md-3">Guest</div>
						<div class="col-md-9">
							<input type="text" disabled value="<?php echo $appointment->guest_name?>">
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-3">Date</div>
						<div class="col-md-9">
							<input type="text" disabled value="<?php echo $appointment->date?> (<?php echo date('H:i A', strtotime($appointment->start_time))?> - <?php echo date('H:i A', strtotime($appointment->end_time))?>)">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">Service</div>
						<div class="col-md-9">
							<input type="text" disabled value="<?php echo $appointment->service_bundle->name?> - <?php echo $appointment->reservation_fee?> ">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">Doctor</div>
						<div class="col-md-9">
							<input type="text" disabled value="<?php echo $appointment->doctor->last_name . ', '. $appointment->doctor->first_name ?>">
						</div>
					</div>
					<hr>

					<div class="row">
						<div class="col-md-3">Status</div>
						<div class="col-md-9">
							<input type="text" disabled value="<?php echo $appointment->status?>">
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-3">Email</div>
						<div class="col-md-9">
							<input type="text" disabled value="<?php echo $appointment->guest_email?>">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">Mobile</div>
						<div class="col-md-9">
							<input type="text" disabled value="<?php echo $appointment->guest_phone?>">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endbuild()?>
<?php loadTo()?>