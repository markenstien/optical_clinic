<?php build('content')?>
	<div class="card">
		<?php Flash::show()?>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered dataTable">
					<thead>
						<th>#</th>
						<th>Reference</th>
						<th>Amount</th>
						<th>Bill</th>
						<th>Origin</th>
						<th>Action</th>
					</thead>

					<tbody>
						<?php foreach( $payments as $key => $row) :?>
							<tr>
								<td><?php echo ++$key?></td>
								<td><?php echo $row->reference?></td>
								<td><?php echo amountHTML($row->amount)?></td>
								<td><?php echo $row->origin?></td>
								<td>
									<?php if(isEqual($row->origin, 'RESERVATION_FEE')) : ?>
										<a href="<?php echo _route('appointment:show' , $row->bill_id)?>">Show Origin</a> 
									<?php else:?>
										<a href="<?php echo _route('order:show' , $row->bill_id)?>">Show Origin</a> 
									<?php endif?>
								</td>
								<td>
									<?php
										__([
											btnView(_route('payment:show' , $row->id)),
											btnEdit(_route('payment:edit' , $row->id)),
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