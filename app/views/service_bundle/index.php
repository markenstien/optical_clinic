<?php build('page-control')?>
<div class="page-header">
	<div>
		<h1>⚙️ Service Management</h1>
		<p>Products automatically deducted for each service</p>
	</div>
	<div class="header-actions">
		<a class="btn secondary" href="<?php echo _route('service-bundle:create')?>">
		<span>➕</span> Add Service
		</a>
	</div>
</div>
<?php endbuild()?>



<?php build('content')?>
	<?php Flash::show()?>
	<div class="card">
		<div class="card-header">
          <div class="header-content">
            <h2>📋 Service Records</h2>
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
						<th><?php echo $_form->getLabel('description')?></th>
						<th><?php echo $_form->getLabel('name')?></th>
						<th style="width: 10%;"><?php echo $_form->getLabel('price_custom')?></th>
						<th style="width: 20%;"><?php echo $_form->getLabel('description')?></th>
						<th><?php echo $_form->getLabel('status')?></th>
						<th><?php echo $_form->getLabel('is_visible')?></th>
						<th>Action</th>
					</thead>

					<tbody>
						<?php foreach($service_bundles as $key => $row) :?>
							<tr>
								<td><?php echo ++$key?></td>
								<td><?php echo $row->code?></td>
								<td><?php echo $row->name?></td>
								<td><?php echo amountHTML($row->price_custom)?></td>
								<td style=""><?php echo $row->description?></td>
								<td><?php echo $row->status?></td>
								<td><?php echo $row->is_visible ? 'Visible' : 'Not Visible'?></td>
								<td>
									<?php
										__([
											btnView(_route('service-bundle:show' , $row->id))
										]);
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