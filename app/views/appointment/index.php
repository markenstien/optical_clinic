
<?php build('content')?>
	<div class="card">
		<div class="card-header">
			<?php echo wLinkDefault(_route('home:index').'#appointment', 'Make Appointment')?>
		</div>
		<div class="card-body">
			<?php Flash::show()?>
			<div class="table-responsive">
				<table class="table table-bordered dataTable">
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
						<th>Action</th>
					</thead>

					<tbody>
						<?php foreach( $appointments as $key => $appointment) :?>
							<tr>
								<td><?php echo ++$key?></td>
								<td><?php echo $appointment->reference?></td>
								<td><?php echo $appointment->guest_name?></td>
								<td><?php echo $appointment->user_id !=0 ? 'Yes' : 'No'?></td>
								<td><?php echo $appointment->date?></td>
								<td><?php echo is_null($appointment->start_time) ? 'Not Available on previous version' : $appointment->start_time?></td>
								<td><?php echo $appointment->type?></td>
								<td><?php echo $appointment->status?></td>
								<td><?php echo $appointment->guest_email?></td>
								<td><?php echo $appointment->guest_phone?></td>
								<td>
									<?php
										__([
											btnView(_route('appointment:show' , $appointment->id)),
											btnEdit(_route('appointment:edit' , $appointment->id)),
										]);
									?>
								</td>
							</tr>
						<?php endforeach?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php endbuild()?>

<?php loadTo()?>