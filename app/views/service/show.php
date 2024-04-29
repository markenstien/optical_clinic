<?php build('content') ?>
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Product View</h4>
		</div>

		<div class="card-body">
			<div class="row">
				<div class="col-md-7">
					<section>
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
										<td><?php echo $_form->getLabel('price')?></td>
										<td><?php echo $_form->getValue('price')?></td>
									</tr>

									<tr>
										<td><?php echo $_form->getLabel('description')?></td>
										<td><?php echo $_form->getValue('description')?></td>
									</tr>

									<tr>
										<td>Category</td>
										<td><?php echo $service->category?></td>
									</tr>
									<tr>
										<td>Stocks</td>
										<td>
											<h5><?php echo $service->total_stock?></h5>
											<?php if(!isEqual(whoIs('user_type'), 'patient')) :?>
												<?php echo wLinkDefault(_route('stock:add', null, [
													'item_id' => $service->id,
													'csrfToken' => csrfGet()
												]),'Manage Stock')?>
											<?php endif?>
										</td>
									</tr>
									<?php if(!isEqual(whoIs('user_type'), 'patient')) :?>
									<tr>
										<td>Action</td>
										<td><?php echo wLinkDefault(_route('service:edit', $service->id),'Edit Product')?></td>
									</tr>
									<?php endif?>
								</table>
							</div>
					</section>

					<?php echo wDivider(30)?>
					<?php if(!isEqual(whoIs('user_type'), 'patient')) :?>
						<section>
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

				<div class="col-md-5">
					<h4>Images</h4>
					<?php if(!isEqual(whoIs('user_type'), 'patient')) :?>
					<div class="mt-3 mb-5">
						<?php echo $_attachmentForm->getForm(); ?>
					</div>
					<?php endif?>

					<?php if($images) :?>
						<div  class="row">
						<?php foreach($images as $key => $row) :?>
							<div class="col-md-3">
								<img src="<?php echo $row->full_url?>" style="width: 100%; height: 150px;">
								<?php if(!isEqual(whoIs('user_type'), 'patient')) :?>
									<?php echo wLinkDefault(_route('attachment:delete', $row->id, [
										'route' => seal(_route('service:show', $service->id))
									]), ' Delete ')?>
								<?php endif?>
								<p><?php echo $row->label?></p>
								
							</div>
						<?php endforeach?>
						</div>
					<?php endif?>
				</div>
			</div>
		</div>
	</div>
<?php endbuild()?>
<?php loadTo()?>