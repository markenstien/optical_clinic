<?php build('content')?>

<!-- Quick Stats Card -->
	<div class="page-header">
		<div>
			<h1>📅 Appointment Management</h1>
			<p>Manage and track all client appointments with comprehensive scheduling tools</p>
		</div>
	</div>
	<section class="card" style="margin-bottom:24px;">
		<div class="card-header">
          <div class="header-content">
            <h2>📋 Appointment Records</h2>
            <p class="header-subtitle"> Complete list of all products and supplies</p>
          </div>
          <div class="search-actions">
            <div class="search-container">
              <input id="inv-search" placeholder="🔍 Search products..." />
            </div>
          </div>
        </div>

		<div class="card-body">
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
								<td><?php echo $appointment->date?> <a href="#">Test</a></td>
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
	</section>
<?php endbuild()?>
<?php loadTo()?>