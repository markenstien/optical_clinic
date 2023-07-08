<?php build('content') ?>
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Orders</h4>
		</div>

		<div class="card-body">
			<?php echo wLinkDefault(_route('order:cashier'), 'New Order')?>
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<th>#</th>
						<th>Reference</th>
						<th><?php __($formOrder->getLabel('customer_name'))?></th>
						<th><?php __($formOrder->getLabel('customer_number'))?></th>
						<th><?php __($formOrder->getLabel('discount_amount'))?></th>
						<th><?php __($formOrder->getLabel('discount_type'))?></th>
						<th>Initial Amount</th>
						<th>Remaining Balance</th>
						<th>Acton</th>
					</thead>

					<tbody>
						<?php foreach($orders as $key => $row) :?>
							<tr>
								<td><?php echo ++$key?></td>
								<td><?php echo $row->order_reference?></td>
								<td><?php echo $row->customer_name?></td>
								<td><?php echo $row->customer_number?></td>
								<td><?php echo $row->discount_amount?></td>
								<td><?php echo $row->discount_type?></td>
								<td><?php echo $row->initial_amount?></td>
								<td><?php echo $row->current_balance?></td>
								<td><?php echo wLinkDefault(_route('order:show', $row->id), 'Show')?></td>
							</tr>
						<?php endforeach?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php endbuild()?>
<?php loadTo()?>