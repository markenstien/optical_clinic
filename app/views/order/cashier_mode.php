<?php build('content') ?>
<?php __($formOrder->start())?>
	<!-- GENERAL FORM -->
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Customer Ordering page</h4>
			<p>Signed-In As <strong><?php echo whoIs('first_name') .' '.whoIs('last_name'). '::'?></strong><span class="badge badge-primary"><?php echo whoIs('user_type')?></span></p>
			<?php echo wLinkDefault(_route('order:cancel-session'),'Cancel Order')?>
		</div>

		<div class="card-body">
			<section>
				<h4>Customer</h4>
				<label>#<?php echo Session::get('cashier_mode_token')?></label>
				<div class="row container">
					<div class="mr-2"><?php __($formOrder->getCol('customer_name')) ?></div>
					<div class="mr-2"><?php __($formOrder->getCol('customer_number')) ?>
						<?php echo wLinkDefault('#', 'Search user')?>
					</div>
					<div class="mr-2"><?php __($formOrder->getCol('customer_email')) ?></div>
					<div class="mr-2"><?php __($formOrder->getCol('customer_address')) ?></div>
				</div>

				<?php Form::close()?>
			</section>

			<?php echo wDivider(30)?>
			<section>
				<h4>Particulars</h4>
				<?php echo wLinkDefault('#', 'Add Item', [
					'role' => 'modal',
					'data-toggle' => 'modal',
					'data-target' => '#addItemModal'
				])?>

				<?php if(!empty($order->items)) :?>
				<table class="table table-bordered">
					<thead>
						<th>#</th>
						<th>Product Ref</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total Amount</th>
						<th>Action</th>
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
									<a href="#">Edit</a> | 
									<a href="#">Remove</a>
								</td>
							</tr>
						<?php endforeach?>
					</tbody>
				</table>
				<h4>Order Total : <?php echo amountHTML($orderTotal)?></h4>
				<?php else:?>
					<p>Click Add Item to add product.</p>
				<?php endif?>
			</section>

			<?php echo wDivider(30)?>
			<section class="col-md-5">
				<h4>Discount</h4>
				<?php __($formOrder->getCol('discount_amount'))?>
				<?php __($formOrder->getCol('discount_type'))?>
				<?php __($formOrder->getCol('discount_notes'))?>

				<?php if(empty($order->discount_amount)) :?>
					<div class="form-group">
						<?php
							Form::label('Check only if discount will be applied');
							Form::checkbox('discount_check', '1');
						?>
					</div>
				<?php endif?>

				<?php if(!empty($order->discount_amount)) :?>
					<h4 class="mt-3">Sub Total : <?php echo amountHTMl($orderTotal - $order->discount_amount)?>(Discounted)</h4>
				<?php endif?>
				<div class="form-group mt-3">
					<?php Form::submit('btn_checkout', 'Checkout')?>
				</div>
			</section>
		</div>
	</div>
<?php __($formOrder->end())?>
<!-- END GENRA LFORM -->
	<!-- Modal -->
	<div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<?php __($formOrderItem->start())?>
		        <?php __($formOrderItem->getCol('item_id'))?>
		        <?php __($formOrderItem->getCol('purchased_amount'))?>
		        <?php __($formOrderItem->getCol('quantity'))?>

		        <div class="mt-2"><?php Form::submit('btn_add_item', 'Add Item')?></div>
	        <?php __($formOrderItem->end())?>
	      </div>
	    </div>
	  </div>
	</div>

<?php endbuild()?>

<?php build('scripts') ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#orderItemProductId').change(function(e) {

				let productId = $(this).val();

				$.get(getURL('API_Product/getItem?id='+productId), function(response) {
					$("#orderItemPrice").val(response.price)
				});
			})
		});
	</script>
<?php endbuild()?>
<?php loadTo()?>