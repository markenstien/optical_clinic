<?php build('content') ?>
<div class="row">
	<div class="col-md-7">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Order Preview</h4>
			</div>

			<div class="card-body">
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
									<h4><?php echo $order->current_balance?></h4>
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
							<th>Replace</th>
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
									<td>
										<a href="?order_item_id=<?php echo $row->id?>">Replace (1) Item</a>
									</td>
								</tr>
							<?php endforeach?>
						</tbody>
					</table>
				</section>
				<?php echo wDivider(40)?>
			</div>
		</div>
	</div>

	<?php if(!empty($req['order_item_id'])) :?>
		<div class="col-md-5">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Replace Item</h4>
				</div>

				<div class="card-body">
					<?php
						Form::open([
							'method' => 'post'
						]);
						Form::hidden('order_item_id', $orderItem->id);
						Form::hidden('item_id', $orderItem->item_id);
					?>
						<div class="form-group">
							<?php
								Form::label('Item Reference');
								Form::text('', $orderItem->item_code, [
									'class' => 'form-control',
									'required' => true,
									'readonly' => true
								])
							?>
						</div>

						<div class="form-group">
							<?php
								Form::label('Item Name');
								Form::text('', $orderItem->item_name, [
									'class' => 'form-control',
									'required' => true,
									'readonly' => true
								])
							?>
						</div>

						<div class="form-group">
							<?php
								Form::label('Reason');
								Form::select('reason', ['DEFECTIVE_ITEM', 'CHANGE_ITEM'], '', [
									'class' => 'form-control'
								])
							?>
						</div>

						<div class="form-group">
							<?php
								Form::label('Notes');
								Form::textarea('notes', '', [
									'class' => 'form-control'
								])
							?>
						</div>

						<div class="form-group">
							<p>Clicking submit will remove (1) item to your order.</p>
							<input type="submit" name="btn_replace_order">
						</div>
					<?php Form::close()?>	
				</div>
			</div>
		</div>
	<?php endif?>
</div>
<?php endbuild()?>
<?php loadTo()?>