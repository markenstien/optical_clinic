<?php build('content') ?>
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
											<?php echo $userForm->getLabel('middle_name')?>
										</div>

										<div class="col-md-9">
											<input type="text" value="<?php echo $user->middle_name?>" disabled>
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
								<hr>
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
							</div>
						</div>


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
												<td><a href="<?php echo _route('user:remove-specialization', $row->id)?>" class="btn btn-danger btn-xs">Remove</a></td>
											</tr>
										<?php endforeach?>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>

	<?php echo wDivider()?>
	<div class="card">
		<div class="card-body">
			<h2>Appointments</h2>
		</div>
	</div>
</div>
<?php endbuild()?>
<?php loadTo()?>