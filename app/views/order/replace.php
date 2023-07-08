<?php build('content') ?>
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Order Replacement</h4>
		</div>

		<div class="card-body">
			<?php echo wDivider(30)?>
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
						<th>Action</th>
					</thead>

					<tbody>
						<tr>
							<td>1</td>
							<td>#AAA</td>
							<td>Bulcasil</td>
							<td>100</td>
							<td>1</td>
							<td>200.00</td>
							<td>
								<a href="#">Replace (1) Item</a> | 
								<a href="#">Remove</a>
							</td>
						</tr>
					</tbody>
				</table>
				<h4>Order Total : 200.00</h4>
			</section>
		</div>
	</div>
<?php endbuild()?>
<?php loadTo()?>