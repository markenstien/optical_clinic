<?php build('content') ?>
<div class="col-md-7 mx-auto">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Order Preview</h4>
		</div>

		<div class="card-body">
			<?php echo wLinkDefault(_route('order:replacement', $order->id), 'Replace Order')?>
			<div class="row">
				<div class="col-md-8">
					<table class="table table-bordered">
						<tr>
							<td style="width:30%">Reference</td>
							<td>#<?php echo $order->order_reference?></td>
						</tr>
						<tr>
							<td><?php echo $formOrder->getLabel('customer_name')?></td>
							<td><?php echo $order->customer_name?></td>
						</tr>
						<tr>
							<td><?php echo $formOrder->getLabel('customer_number')?></td>
							<td><?php echo $order->customer_number?> | <?php echo $order->customer_email?></td>
						</tr>
						<tr>
							<td><?php echo $formOrder->getLabel('customer_address')?></td>
							<td><?php echo $order->customer_address?></td>
						</tr>
					</table>
				</div>

				<div class="col-md-4">
					<table class="table table-bordered">
						<tr>
							<td>Date Of Order : <?php echo $order->created_at?></td>
						</tr>
						<tr>
							<td>
								<h4><?php echo $order->initial_amount?></h4>
								<div>Amount</div>
							</td>
						</tr>

						<tr>
							<td>
								<h4><?php echo $order->current_balance == 0 ? 'PAID' : $order->current_balance?></h4>
								<div>Balance</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<?php if(!empty($order->discount_amount)) :?>
				<p>Discount Applied : <?php echo $order->discount_type?> Amounting to :
					<?php echo $order->discount_amount?> <br><?php echo $order->discount_notes?>
				</p>
			<?php endif?>

			<section>
				<h4>Particulars</h4>

				<table class="table table-bordered">
					<thead>
						<th>#</th>
						<th>Product Ref</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total Amount</th>
					</thead>

					<tbody>
						<?php $orderTotal = 0?>
						<?php foreach($order->items as $key => $row) :?>
							<?php $orderTotal += ($row->quantity * $row->item_price)?>
							<tr>
								<td><?php echo ++$key?></td>
								<td><?php echo $row->item_code?></td>
								<td><?php echo $row->item_name?></td>
								<td><?php echo $row->item_price?></td>
								<td><?php echo $row->quantity?></td>
								<td><?php echo amountHTML($row->quantity * $row->item_price)?></td>
							</tr>
						<?php endforeach?>
					</tbody>
				</table>
			</section>
			<?php echo wDivider(40)?>
			<section>
				<h4>Payments</h4>
				<?php 
					if(!isEqual(whoIs('user_type'), 'patient')) {
						echo wLinkDefault('#', 'Add Payment', [
							'data-toggle' => 'modal',
							'data-target' => '#addPaymentModal'
						]);
					}
				?>
				<?php if(empty($payments)) :?>
					<p class="text-center">No payments found</p>

				<?php else:?>
					<?php $paymentTotal = 0?>
					<table class="table-bordered table">
						<thead>
							<th>#</th>
							<th><?php __($formPayment->getLabel('method'))?></th>
							<th><?php __($formPayment->getLabel('org'))?></th>
							<th><?php __($formPayment->getLabel('amount'))?></th>
						</thead>

						<tbody>
							<?php foreach($payments as $key => $row) :?>
								<?php $paymentTotal += $row->amount?>
								<tr>
									<td><?php echo ++$key?></td>
									<td><?php echo $row->method?></td>
									<td><?php echo $row->org?></td>
									<td><?php echo $row->amount?></td>
								</tr>
							<?php endforeach?>
						</tbody>
					</table>
					<h4>Payment Total : <?php echo amountHTML($paymentTotal)?> </h4>
				<?php endif?>
			</section>
		</div>
	</div>
</div>


<!-- PAYMENT MODAL -->
<div class="modal fade" id="addPaymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<?php __($formPayment->start())?>
      		<?php
				__($formPayment->getRow('bill_id'));
				__($formPayment->getRow('origin'));
			?>
			<div class="form-group">
				<?php __($formPayment->getRow('amount'))?>
			</div>
			<div class="form-group">
				<?php __($formPayment->getRow('method'))?>
			</div>
			<div class="form-group">
				<?php __($formPayment->getRow('org'))?>
			</div>
			<div class="form-group">
				<?php __($formPayment->getRow('external_reference'))?>
			</div>

			<div class="form-group">
				<?php Form::submit('', 'Add Payment')?>
			</div>
		<?php __($formPayment->end())?>
      </div>
    </div>
  </div>
</div>

<?php endbuild()?>
<?php loadTo()?>