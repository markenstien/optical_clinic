<?php build('page-control')?>
<div class="page-header">
	<div>
		<h1><?php echo $bundle->name?></h1>
		<p>Add Products to your service</p>
	</div>
	<div class="header-actions">
		<a class="btn secondary" href="<?php echo _route('service-bundle:index')?>">
		<span>📂</span> Services
		</a>
	</div>
</div>
<?php endbuild()?>

<?php build('content')?>
	<?php Flash::show()?>
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Select Products to add on your service</h4>
					<section>
						<?php
							Form::open([
								'method' => 'GET',
								'action' => ''
							]);
						?>

						<div class="form-group">
							<?php
								Form::label('Keyword Search');
								Form::text('key_word' , '' , [
									'class' => 'form-control',
									'style' => 'margin-bottom:15px'
								])
							?>
						</div>

						<?php
							$filter_categories = $_GET['categories'] ?? [];
						?>
						<?php foreach($categories as $category) :?>
							<label style="padding: 10px; background: #eee;margin-right: 25px;">
								<?php echo strtoupper($category->category)?>
								<?php 
									$category_is_check = isEqual( $category->id, $filter_categories);
									Form::checkbox('categories[]', $category->id , $category_is_check ? [
										'checked' => true
									] : null);
								?>
							</label>
						<?php endforeach?>

						<div class="mt-2" style="margin-top: 20px;">
							<?php Form::submit('btn_filter' , 'Apply Filter')?>
							<?php if( isset($_GET['btn_filter']) || isset($_GET['category'])) :?>
								<a href="?" class="btn btn-warning btn-sm"> Clear Filter </a>
							<?php endif?>
						</div>
						<?php Form::close()?>

					</section>

					<br>

					<table class="table">
						<thead>
							<th>Code</th>
							<th><?php echo $formService->getLabel('service')?></th>
							<th><?php echo $formService->getLabel('category_id')?></th>
							<th>Stocks</th>
							<th>Action</th>
						</thead>
						<tbody>
							<?php foreach($services as $row) :?>
							<tr>
								<td><?php echo $row->code?></td>
								<td><?php echo $row->service?></td>
								<td><?php echo $row->category?></td>
								<td><?php echo $row->total_stock?></td>
								<td><?php
										Form::open([
											'method' => 'post',
											'action' => _route('service-bundle-item:add' , $bundle_id)
										]);

										Form::hidden('service_id' , $row->id);
										Form::hidden('bundle_id' , $bundle_id);

										Form::submit('' , 'Add' , [
											'class' => 'btn btn-primary'
										]);
									?>

									<?php Form::close()?>
								</td>
							</tr>
						<?php endforeach?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="card mt-2">
				<div class="card-body">
					<h4 class="card-title">General</h4>
					<?php echo wLinkDefault( _route('service-bundle:show' , $bundle->id), 'Back to Overview')?>
					<table class="table table-bordered">
						<tr>
							<td>Bundle Name</td>
							<td><?php echo $bundle->name?></td>
						</tr>
						<tr>
							<td>Code</td>
							<td><?php echo $bundle->code?></td>
						</tr>
						<tr>
							<td>Description</td>
							<td><?php echo $bundle->description?></td>
						</tr>
					</table>
				</div>
			</div>

			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Items</h4>
					<table class="table table-bordered">
						<thead>
							<th>Code</th>
							<th><?php echo $formService->getLabel('service')?></th>
							<th style="width: 100px;" title="Quantity Per Usage">QPU</th>
							<th>Action</th>
						</thead>
						<?php foreach($bundle_items as $row) :?>
							<tr>
								<td><a href="#"><?php echo $row->code?></a></td>
								<td><a href="#"><?php echo $row->service?></a></td>
								<td><input type="number" class="qty_per_usage" value="<?php echo $row->quantity_per_usage ?? 0?>" data-id="<?php echo $row->id?>"></td>
								<td><a href="<?php echo _route('service-bundle-item:delete' , $row->id)?>">Delete</a></td>
							</tr>
						<?php endforeach?>
					</table>
				</div>
				<p id="item-update-message"></p>
			</div>
		</div>
	</div>
<?php endbuild()?>

<?php build('scripts') ?>
    <script>
		// --- Debounce utility function ---
		function debounce(func, delay) {
			let timer;
			return function(...args) {
				clearTimeout(timer);
				$('#item-update-message').html('...');
				timer = setTimeout(() => func.apply(this, args), delay);
			};
		}

		// --- AJAX fetch function ---
		function fetchData(input) {
			const quantity = input.value;
			const itemId = input.dataset.id; // optional unique id per item

			if (!quantity) return; // skip if empty
			 // Example endpoint — replace with your API URL
			$.ajax({
				method : 'POST',
				url : getURL('API_ServiceBundleItem/updateItemQuantityPerUsage'),
				data : {
					id : itemId,
					quantity: quantity
				},
				success : function(response) {
					let parsedata = JSON.parse(response);
					$('#item-update-message').html(parsedata['data']['message']);
					
					setTimeout(function() {
						$('#item-update-message').html('');
					},1000); 
				}
			});
		}

		// --- Attach listeners to all inputs with .item class ---
		document.querySelectorAll('input.qty_per_usage[type="number"]').forEach(input => {
			$('#item-update-message').html('');
			const debounced = debounce(() => fetchData(input), 800); // 500ms delay
			input.addEventListener('input', debounced);
		});
	</script>
<?php endbuild()?>
<?php loadTo()?>