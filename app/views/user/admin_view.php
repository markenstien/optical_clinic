<?php build('content') ?>
<div class="container">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-5">
					<div class="row">
						<div class="col-md-5">
							<div>
								<?php if($user->profile) :?>
								<img src="<?php echo $user->profile?>" style="width: 150px;">
								<?php else:?>
									<label>No Profile Picture</label>
								<?php endif?>
							</div>
							<?php echo wDivider()?>
							<?php __(anchor(_route('user:edit' , $user->id) , 'Edit')) ?>
							<?php __(anchor(_route('user:delete' , $user->id , ['route' => seal(_route('user:index')) ]) , 'delete' , 'Delete' , 'danger')) ?>
						</div>

						<div class="col-md-7">
							<h4><?php echo $user->last_name?>, <?php echo $user->first_name?></h4>
							<div><span class="badge badge-primary"><?php echo $user->user_code?></span> (<?php echo $user->user_type?>)</div>
						</div>
					</div>
				</div>
				<div class="col-md-7">
					<div class="table-responsive">
						<table class="table table-bordered">
							<tr>
								<td>Gender</td>
								<td><?php echo $user->gender?></td>
							</tr>

							<tr>
								<td>Birth Date</td>
								<td><?php echo $user->birthdate?></td>
							</tr>

							<tr>
								<td colspan="2">Contact & Address</td>
							</tr>

							<tr>
								<td>Phone Number</td>
								<td><?php echo $user->phone_number?></td>
							</tr>

							<tr>
								<td>Email</td>
								<td><?php echo $user->email?></td>
							</tr>

							<?php if(isset($user->address_atomic_text)) :?>
								<tr>
									<td>Address</td>
									<td>
										<?php echo $user->address_atomic_text?>
									</td>
								</tr>
							<?php endif?>
						</table>
					</div>
				</div>
			</div>	
		</div>
	</div>

	<?php echo wDivider()?>
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Sessions</h4>
			<?php echo anchor(_route('session:create', null, ['user_id' => $user->id]) , 'Create' , 'Create')?>
		</div>

		<div class="card-body">
			<table class="table table-bordered dataTable">
				<thead>
					<th><?php echo isEqual($user->user_type, 'patient', '') ? 'Attending Staff' : 'Patient Name'?></th>
					<th>Remarks</th>
					<th>Date</th>
					<th>Action</th>
				</thead>
				<tbody>
					<?php foreach($sessions as $row):?>
						<tr>
							<td><?php echo isEqual($user->user_type, 'patient', '') ? $row->doctor_name : $row->patient_name?></td>
							<td><?php echo $row->remarks?></td>
							<td><?php echo $row->date_created?></td>
							<td><?php echo anchor( _route('session:show' , $row->id), 'view' , 'show')?></td>
						</tr>
					<?php endforeach?>
				</tbody>
			</table>
		</div>
	</div>
	<?php echo wDivider()?>
</div>
<?php endbuild()?>
<?php loadTo()?>