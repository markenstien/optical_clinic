<?php build('page-control')?>
<div class="page-header">
	<div>
		<h1>📦 <?php  echo $service->service?></h1>
		<p>Manage your product here</p>
	</div>
	<div class="header-actions">
		<a class="btn secondary" href="<?php echo _route('service:edit', $service->id)?>">
			<span>⚙️</span> Edit Product
		</a>
		<a class="btn secondary" href="<?php echo _route('stock:add', null, [
			'item_id' => $service->id,
			'csrfToken' => csrfGet()
		])?>">
			<span>🛠️</span> Manage Stocks
		</a>
		<a class="btn primary" href="<?php echo _route('service:archive', $service->id)?>">
			<span>⚙️</span>
			<?php 
				if(!$service->is_visible) {
					echo 'Restore Product';
				} else {
					echo 'Archive Product';
				}
			?>
		</a>

		<a class="btn secondary" href="<?php echo _route('service:index')?>">
			<span>📂</span> Products
		</a>
	</div>
</div>
<?php endbuild()?>

<?php build('content') ?>
	<div class="card">
		<?php Flash::show()?>
		<div class="card-body">
			<div class="row">
				<div class="col-md-7">
					<section>
						<?php if(!$service->is_visible) : ?>
							<h1 style="color:red">Product Is currently Disabled</h1>
						<?php endif?>
						<h4>Product Detail</h4>
							<div class="table-responsive">
								<table class="table table-bordered">
									<tr>
										<td width="10%">CODE</td>
										<td>#<?php echo $service->code?></td>
									</tr>
									<tr>
										<td width="30%"><?php echo $_form->getLabel('service')?></td>
										<td><?php echo $_form->getValue('service')?></td>
									</tr>

									<tr>
										<td><?php echo $_form->getLabel('description')?></td>
										<td><?php echo $_form->getValue('description')?></td>
									</tr>

									<tr>
										<td><?php echo $_form->getLabel('category_id')?></td>
										<td><?php echo $service->category?></td>
									</tr>
									<tr>
										<td>Stocks</td>
										<td>
											<h5><?php echo $service->total_stock?></h5>
										</td>
									</tr>
								</table>
							</div>
					</section>

					<?php echo wDivider(30)?>
					<?php if(!isEqual(whoIs('user_type'), 'patient')) :?>
						<section>
							<h3>Stocks/Inventory Logs</h3>
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<th>#</th>
										<th>Quantity</th>
										<th>Remarks</th>
										<th>Origin</th>
										<th>Date Time</th>
									</thead>

									<tbody>
										<?php foreach($logs as $key => $row) :?>
											<tr>
												<td><?php echo ++$key?></td>
												<td><?php echo amountHTML($row->quantity) ?></td>
												<td><?php echo $row->remarks?></td>
												<td><?php echo $row->entry_origin?></td>
												<td><?php echo $row->created_at?></td>
											</tr>
										<?php endforeach?>
									</tbody>
								</table>
							</div>
						</section>	
					<?php endif?>
				</div>
			</div>
		</div>
	</div>
<?php endbuild()?>
<?php loadTo()?>