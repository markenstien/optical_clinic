<?php build('content')?>
	<?php Flash::show()?>
	<div class="row">
		<div class="col-md-7">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Appointment</h4>
					<label><?php echo $appointment->type?></label>
				</div>

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered">
							<tr>
								<td>Date</td>
								<td><?php echo $appointment->date?></td>
							</tr>
							<tr>
								<td>Arrival Time</td>
								<td><?php echo $appointment->start_time?></td>
							</tr>

							<tr>
								<td>Type</td>
								<td><?php echo $appointment->type?></td>
							</tr>


							<tr>
								<td>Status</td>
								<td><?php echo $appointment->status?></td>
							</tr>


							<tr>
								<td>Guest</td>
								<td><?php echo $appointment->guest_name?></td>
							</tr>

							<tr>
								<td>Email</td>
								<td><?php echo $appointment->guest_email?></td>
							</tr>

							<tr>
								<td>Mobile</td>
								<td><?php echo $appointment->guest_phone?></td>
							</tr>
							
							<tr>
								<td>Fee</td>
								<td><?php echo $appointment->reservation_fee?></td>
							</tr>
						</table>
					</div>
				</div>
				<?php if($session) :?>
				  <div class="card-footer">
				    <?php echo wLinkDefault(_route('session:show', $session->id), 'View Session') ?>
				  </div>
			    <?php endif?>

				<?php if( !isEqual($appointment->status , 'arrived') && isEqual(auth('user_type') , ['staff','admin' , 'doctor'])):?>
					<a href="<?php echo _route('session:create' , $appointment->id)?>" class="btn btn-danger"> Start Session Session</a>
				<?php endif?>
			</div>
		</div>

		<div class="col-md-5">
			<div class="card">
				<div class="card-header"><div class="card-title">Payment</div></div>
				<div class="card-body">
					<?php if(!$payment) :?>
						<p>No Payment</p>
					<?php else:?>
					<?php csrfReload()?>
					<div class="table-responsive">
						<table class="table table-bordered">
							<tr>
								<td>Reference:</td>
								<td><?php echo $payment->payment_reference?></td>
							</tr>
							<tr>
								<td>Amount:</td>
								<td><?php echo $payment->amount?></td>
							</tr>
							<tr>
								<td>Method:</td>
								<td><?php echo $payment->method?></td>
							</tr>
							<tr>
								<td>Status:</td>
								<td><?php echo $payment->payment_status?></td>
							</tr>

							<?php if(isEqual($payment->payment_status,'for-approval') && !isEqual(whoIs('user_type'), 'patient')) :?>
								<tr>
									<td>Payment Actio</td>
									<td>
										<?php echo wLinkDefault(_route('payment:approve', csrfGet(), [
											'payment_id' => $payment->id,
											'origin' => 'RESERVATION_FEE'
										]), 'Approve', [
											'class' => 'form-verify',
										])?> | 
										<a href="#">Decline</a>
									</td>
								</tr>
							<?php endif?>
						</table>

						<?php if($payment->external_reference) :?>
							<table class="table table-bordered">
								<thead>
									<th>ORG</th>
									<th>External Reference</th>
									<th>Account Number</th>
									<th>Account Name</th>
								</thead>
								<tbody>
									<tr>
										<td><?php echo $payment->org?></td>
										<td><?php echo $payment->external_reference?></td>
										<td><?php echo $payment->acc_no?></td>
										<td><?php echo $payment->acc_name?></td>
									</tr>
								</tbody>
							</table>
						<?php endif?>
					</div>
					<?php endif?>
				</div>
			</div>
		</div>
	</div>
<?php endbuild()?>
<?php loadTo()?>