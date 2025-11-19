<?php build('content') ?>
<?php if(whoIs('user_type') != USER_TYPES['CUSTOMER']) :?>
	<div class="page-header">
		<div>
			<h1>👥User Account</h1>
			<p>View Your account details here</p>
		</div>

		<div class="header-actions">
			<a class="btn secondary" href="<?php echo _route('user:edit', $user->id)?>">
				<span>⚙️</span>Edit
			</a>

			<?php if(isEqual(whoIs('user_type'), USER_TYPES['ADMIN']) && $user->is_disabled == false) :?>
				<a class="btn danger" href="<?php echo _route('user:disable', $user->id)?>">
					<span>❌</span>Disable Account
				</a>
			<?php endif?>

			<?php if(isEqual(whoIs('user_type'), USER_TYPES['ADMIN']) && $user->is_disabled == true) :?>
				<a class="btn success" href="<?php echo _route('user:enable', $user->id)?>">
					<span>✅</span>Re-Activate Account
				</a>
			<?php endif?>
		</div>
	</div>
<?php endif?>
<div class="container">
	<div id="modal1" class="modal-overlay">
		<div class="modal">
			<span class="close-btn">&times;</span>
			<h2>Services</h2>

			<div class="card">
				<div class="card-body">
					<table class="table">
						<?php foreach($serviceBundles as $key => $row) :?>
							<tr>
								<td><?php echo $row->name?></td>
								<td><a href="<?php echo _route('user:add-specialization', [
									'user_id' => $user->id,
									'service_id' => $row->id
								])?>" class="btn btn-primary btn-xs">Add</a></td>
							</tr>
						<?php endforeach?>
						
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="card">
		<?php Flash::show()?>
		<div class="card-body">
			<div class="row">
				<div class="col-md-10">
					<div>(#<?php echo $user->user_code?>) / <?php echo strtoupper($user->user_type)?></div>
					<h1 style="margin: 0px;"><?php echo $user->last_name?>, <?php echo $user->first_name?></h1>
					<?php
					   if($user->is_disabled) {
						echo '<h3 style="color:red">Account is currently disabled</h3>';
					   }
					?>
					<div class="row">
						<div class="col-md-7">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-md-3">
											<?php echo $userForm->getLabel('first_name')?>
										</div>

										<div class="col-md-9">
											<input type="text" value="<?php echo $user->first_name?>" disabled>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-3">
											<?php echo $userForm->getLabel('last_name')?>
										</div>

										<div class="col-md-9">
											<input type="text" value="<?php echo $user->last_name?>" disabled>
										</div>
									</div>

									<div class="row">
										<div class="col-md-3">
											<?php echo $userForm->getLabel('gender')?>
										</div>

										<div class="col-md-9">
											<input type="text" value="<?php echo $user->gender?>" disabled>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-3">
											<?php echo $userForm->getLabel('phone_number')?>
										</div>

										<div class="col-md-9">
											<input type="text" value="<?php echo $user->phone_number?>" disabled>
										</div>
									</div>

									<div class="row">
										<div class="col-md-3">
											<?php echo $userForm->getLabel('email')?>
										</div>

										<div class="col-md-9">
											<input type="text" value="<?php echo $user->email?>" disabled>
										</div>
									</div>
								</div>

								<?php if(isEqual(whoIs('user_type'), USER_TYPES['CUSTOMER'])) :?>
									<div class="card-footer">
										<a class="btn secondary" href="<?php echo _route('user:edit', $user->id)?>">
											<span>⚙️</span>Edit
										</a>
									</div>
								<?php endif?>
							</div>
						</div>

						<?php if(isEqual($user->user_type, USER_TYPES['DOCTOR'])) :?>
						<div class="col-md-5">
							<div class="card">
								<h3>Specializations</h3>
								<button class="openModalBtn btn btn-primary" data-modal="modal1">Add Specialization</button>
								<hr>
								<div class="card-body">
									<table class="table">
										<?php foreach($userSpecializations as $key => $row) :?>
											<tr>
												<td><?php echo $row->name?></td>
												<td><a href="<?php echo _route('user:remove-specialization', $row->uss_id)?>" class="btn btn-danger btn-xs">Remove</a></td>
											</tr>
										<?php endforeach?>
									</table>
								</div>
							</div>
						</div>
						<?php endif?>
					</div>
				</div>
			</div>	
		</div>
	</div>

	<?php echo wDivider()?>
	<div class="card">
		<div class="card-body">
			<h2>Appointments</h2>
			<div class="table-wrap">
				<table class="table table-bordered" id="inv-table">
					<thead>
						<th>#</th>
						<th>Reference</th>
						<th>Guest</th>
						<th>Has Account</th>
						<th>Date</th>
						<th>Time</th>
						<th>Type</th>
						<th>Status</th>
						<th>Email</th>
						<th>Phone</th>
					</thead>
					<tbody>
						<?php foreach($appointments as $key => $appointment) :?>
							<?php
								$statusColor = '';
								switch($appointment->status) {
									case 'arrived':
											$statusColor = 'success';
										break;
									case 'pending':
											$statusColor = 'warning';
										break;
									case 'pending':
											$statusColor = 'danger';
										break;

									default:
										$statusColor = 'default';
								}
							?>
							<tr onclick="window.location.href='<?php echo _route('appointment:show', $appointment->id)?>'">
								<td><?php echo ++$key?></td>
								<td><?php echo $appointment->reference?></td>
								<td><?php echo $appointment->guest_name?></td>
								<td><?php echo $appointment->user_id !=0 ? 'Yes' : 'No'?></td>
								<td><?php echo $appointment->date?></td>
								<td><?php echo is_null($appointment->start_time) ? 'Not Available on previous version' : $appointment->start_time?></td>
								<td><?php echo $appointment->type?></td>
								<td><?php echo wSpanBuilder($appointment->status, $statusColor)?></td>
								<td><?php echo $appointment->guest_email?></td>
								<td><?php echo $appointment->guest_phone?></td>
							</tr>
						<?php endforeach?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php endbuild()?>
<?php loadTo()?>