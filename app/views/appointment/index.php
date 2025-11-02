
<?php build('content')?>

<!-- Quick Stats Card -->
	<div class="card">
		<div style="display: flex; align-items: center; gap: 16px; margin-bottom: 20px;">
			<div style="width: 56px; height: 56px; background: linear-gradient(135deg, #9a6f46, #b8824a); 
				border-radius: 16px; display: flex; align-items: center; justify-content: center; 
				font-size: 24px; box-shadow: 0 8px 20px rgba(154,111,70,.3);">📊</div>
			<div>
			<h3 style="margin: 0; color: #2c3e50; font-size: 20px; font-weight: 700;">Quick Stats</h3>
			<p style="margin: 4px 0 0 0; color: #6c757d; font-size: 14px; opacity: 0.8;">Today's performance metrics</p>
			</div>
		</div>
		<div class="muted-box">
			<div class="kpi"></div>
			<div style="font-weight: 600; color: #6c757d; font-size: 16px;">Appointments Today</div>
			<div style="margin-top: 8px; padding: 8px 16px; background: rgba(154,111,70,.1); 
			border-radius: 20px; color: #9a6f46; font-size: 12px; font-weight: 600;">LIVE DATA</div>
		</div>
	</div>
	
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
								}
							?>
							<tr>
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