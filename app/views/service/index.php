<?php build('page-control')?>
<div class="page-header">
	<div>
		<h1>📦 Inventory Management</h1>
		<p>Track and manage all clinic products, supplies, and equipment inventory</p>
	</div>
	<div class="header-actions">
		<a class="btn secondary" href="<?php echo _route('service:create')?>">
			<span>➕</span> Add Product
		</a>
		<a class="btn secondary" href="<?php echo _route('stock:log')?>">
			<span>📋</span> Inventory Records
		</a>
	</div>
</div>
<?php endbuild()?>

<?php build('content')?>
	<?php Flash::show()?>
	<div class="card">
		<div class="card-header">
          <div class="header-content">
            <h2>📋 Inventories</h2>
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
						<th>Ref</th>
						<th><?php echo $form->getLabel('service')?></th>
						<th><?php echo $form->getLabel('category_id')?></th>
						<th style="width: 30%;"><?php echo $form->getLabel('description')?></th>
						<th><?php echo $form->getLabel('status')?></th>
						<th>Stocks</th>
						<th>Action</th>
					</thead>

					<tbody>
						<?php foreach($services as $key => $row) :?>
							<tr>
								<td><?php echo ++$key?></td>
								<td><?php echo $row->code?></td>
								<td><?php echo $row->service?></td>
								<td><?php echo $row->category?></td>
								<td><?php echo $row->description?></td>
								<td><?php echo $row->is_visible == true ? 'Active' : 'In-Active'?></td>
								<td><?php echo $row->total_stock?></td>
								<td>
									<?php
										__([
											btnView(_route('service:show' , $row->id)),
											btnView(_route('stock:log' , [
												'item_id' => $row->id
											]),'Records'),
										])
									?>
								</td>
							</tr>
						<?php endforeach?>
					</tbody>
				</table>
			</div>
		</div>
		<?php echo wDivider()?>
		<div class="card-body">
			<h1>Inventory Reports</h1>

			<div class="card-body">
				<h3>Expiring Product</h3>
				<table class="table">
					<thead>
						<th>Product</th>
						<th>Stock Reference</th>
						<th>Days to Expire</th>
						<th>Entry Date</th>
						<th>Expiry Date</th>
						<th>Action</th>
					</thead>

					<tbody>
						<?php $date = date('Y-m-d')?>
						<?php foreach($expiringStocks as $key => $row): ?>
							<?php
								if((($date > $row->expiry_date) && (date_difference_number_format($date, $row->expiry_date) > 20)) || isEqual($row->meta_status,'consumed'))
									continue;
							?>
							<tr>
								<td><?php echo $row->service?></td>
								<td><?php echo $row->stock_reference?></td>
								<td>
									<?php
										if($row->expiry_date > $date) {
										  echo date_difference_number_format($date, $row->expiry_date);
										} else {
											echo '<span style="color:red"> Expired </span>';
										}
									?>
								</td>
								<td><?php echo $row->date?></td>
								<td><?php echo $row->expiry_date?></td>
								<td>
									<?php echo wLinkDefault(_route('stock:completed', $row->id), 'Consumed')?>
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