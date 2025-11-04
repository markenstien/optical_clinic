<?php build('page-control')?>
<div class="page-header">
	<div>
		<h1>👤 User Management</h1>
		<p>Manage client profiles, information, and account details</p>
	</div>
	<div class="header-actions">
		<a class="btn secondary" href="<?php echo _route('user:create')?>">
		<span>➕</span> Add User
		</a>
	</div>
</div>
<?php endbuild()?>

<?php build('content')?>
	<div class="card">
		<?php Flash::show()?>
		<div class="card-header">
          <div class="header-content">
            <h2>📋 User Records</h2>
          </div>
          <div class="search-actions">
            <div class="search-container">
              <input id="inv-search" placeholder="🔍 Search products..." />
            </div>
          </div>
        </div>

		<div class="card-body">
			<div class="table-wrap">
				<table class="table table-bordered dataTable" id="inv-table">
					<thead>
						<th>#</th>
						<th>Ref</th>
						<th>Name</th>
						<th>Email</th>
						<th>Mobile #</th>
						<th>Type</th>
						<th>Action</th>
					</thead>

					<tbody>
						<?php foreach($users as $key => $row) :?>
							<tr>
								<td><?php echo ++$key?></td>
								<td><?php echo $row->user_code?></td>
								<td><?php echo $row->first_name . ' ' .$row->last_name?></td>
								<td><?php echo $row->email?></td>
								<td><?php echo $row->phone_number?></td>
								<td><?php echo $row->user_type?></td>
								<td>
									<?php
										__([
											btnView(_route('user:show' , $row->id))
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