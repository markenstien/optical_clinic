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
											
										])
									?>
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