<?php build('page-control')?>
	<div class="page-header">
		<div>
			<h1>⚙️ Category Management</h1>
			<p>Manage and track all client appointments with comprehensive scheduling tools</p>
		</div>
		<div class="header-actions">
			<a class="btn secondary" href="<?php echo _route('category:create')?>">
			<span>➕</span> Add Category
			</a>
		</div>
	</div>
<?php endbuild()?>

<?php build('content')?>
<div class="card">
	<?php Flash::show()?>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table" id="inv-table">
				<thead>
					<th>#</th>
					<th>Category</th>
					<th>Action</th>
				</thead>

				<tbody>
					<?php foreach($categories as $key => $row) :?>
						<tr>
							<td><?php echo ++$key?></td>
							<td><?php echo $row->category?></td>
							<td>
								<a href="<?php echo _route('category:edit', $row->id)?>" class="btn btn-primary btn-xs">edit</a>
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
