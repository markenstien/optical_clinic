<?php build('page-control')?>
<div class="page-header">
	<div>
		<h1><?php echo $service_bundle->name?></h1>
		<p>Manage your service, product bundle here</p>
	</div>
	<div class="header-actions">
		<a class="btn secondary" href="<?php echo _route('service-bundle:edit', $service_bundle->id)?>">
			<span>⚙️</span> Edit
		</a>

		<a class="btn secondary" href="<?php echo _route('service-bundle:index')?>">
			<span>📂</span> Services
		</a>
	</div>
</div>
<?php endbuild()?>

<?php build('content')?>	
	<div class="card">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
				<div class="card-body">
					<h1>Service Bundle Details</h1>
					<div class="row">
						<div class="col-md-3">
							#Reference
						</div>

						<div class="col-md-9">
							<input type="text" value="<?php echo $service_bundle->code?>" disabled>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
							<?php echo $form->label('name')?>
						</div>

						<div class="col-md-9">
							<input type="text" value="<?php echo $service_bundle->name?>" disabled>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
							<?php echo $form->label('description')?>
						</div>

						<div class="col-md-9">
							<input type="text" value="<?php echo $service_bundle->description?>" disabled>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
							<?php echo $form->label('price_custom')?>
						</div>

						<div class="col-md-9">
							<input type="text" value="<?php echo $service_bundle->price_custom?>" disabled>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
							<?php echo $form->label('status')?>
						</div>

						<div class="col-md-9">
							<input type="text" value="<?php echo $service_bundle->status?>" disabled>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
							<?php echo $form->label('is_visible')?>
						</div>

						<div class="col-md-9">
							<input type="text" value="<?php echo $service_bundle->is_visible ? 'Yes' : 'No'?>" disabled>
						</div>
					</div>
					
					</div>
				</div>
			</div>

			<?php if($images) :?>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h1>Image</h1>
						<img src="<?php echo $images[0]->full_url?>" alt="<?php echo $service_bundle->name?> banner" style="width: 100%;">
					</div>
				</div>
			</div>
			<?php endif?>
		</div>

		<div class="card">
			<div class="card-body">
				<h1>Service -> Products</h1>
				<div>
					<a class="btn secondary" href="<?php echo _route('service-bundle-item:add', $service_bundle->id)?>">
						<span>📂</span> Manage Products
					</a>
				</div>
				<?php echo wDivider()?>
				<div class="table-responsive">
					<table class="table table-bordered dataTable">
						<thead>
							<th>#</th>
							<th>Ref</th>
							<th><?php echo $formService->getLabel('service')?></th>
							<th><?php echo $formService->getLabel('category_id')?></th>
							<th><?php echo $formService->getLabel('description')?></th>
							<th><?php echo $formService->getLabel('status')?></th>
							<th>Stocks</th>
						</thead>

						<tbody>
							<?php $total = 0?>
							<?php foreach($services as $key => $row) :?>
								<?php $total += $row->price?>
								<tr>
									<td><?php echo ++$key?></td>
									<td><?php echo $row->code?></td>
									<td><?php echo $row->service?></td>
									<td><?php echo $row->category?></td>
									<td><?php echo $row->description?></td>
									<td><?php echo $row->status?></td>
									<td><?php echo $row->total_stock?></td>
								</tr>
							<?php endforeach?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<?php endbuild()?>
<?php loadTo()?>