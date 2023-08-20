<?php build('content')?>
	<div class="card">
		<div class="card-body">
			<div class="col-md-6 mx-auto">
				<?Php if(isEqual($payment->origin, 'RESERVATION_FEE')) :?>
					<?php echo wLinkDefault(_route('appointment:show', $payment->bill_id), 'Source')?>
				<?php else:?>
					<?php echo wLinkDefault(_route('order:show', $payment->bill_id), 'Source')?>
				<?php endif?>
				<table class="table table-bordered">
					<tr>
						<td>Referece</td>
						<td><?php echo $payment->reference?></td>
					</tr>
					<tr>
						<td>Amount</td>
						<td><?php echo amountHTML($payment->amount)?></td>
					</tr>
					<tr>
						<td>Referece</td>
						<td><?php echo $payment->reference?></td>
					</tr>
					<tr>
						<td>Method</td>
						<td><?php echo $payment->method?></td>
					</tr>
					<tr>
						<td>Payer name</td>
						<td><?php echo $payment->acc_name?></td>
					</tr>
					<?php if(isEqual($payment->method , 'online')):?>
						<tr>
							<td>External Reference</td>
							<td><?php echo $payment->external_reference?></td>
						</tr>
						<tr>
							<td>ORG</td>
							<td><?php echo $payment->org?></td>
						</tr>
						<tr>
							<td>Bill</td>
							<td>
								<?php echo anchor( _route('bill:show' , $payment->bill_id) ,'view' , 'Show Bill')?>
							</td>
						</tr>
					<?php endif?>
				</table>

				<?php if($attachment) :?>
					<div>
						<img src="<?php echo $attachment->full_url?>" 
							alt="Payment Image" style="width:100%; margin:0px auto;">
					</div>
				<?php endif?>
			</div>
		</div>
	</div>
<?php endbuild()?>
<?php loadTo()?>