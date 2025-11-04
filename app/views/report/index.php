<?php build('content') ?>
	
	<div class="col-md-8 mx-auto">
		<div class="card">
			<div class="card-body">
				<h1>Report</h1>
				<div class="col-md-8 mx-auto">
					<h5 class="text-center">Report Filter</h5>
					<?php Form::open(['method' => 'get'])?>
						<div class="row">
							<div class="col-md-6">
								<?php
									Form::label('Start Date');
									Form::date('start_date' , '' , ['class' => 'form-control' , 'required' => true])
								?>
							</div>
							<div class="col-md-6">
								<?php
									Form::label('End Date');
									Form::date('end_date' , '' , ['class' => 'form-control' , 'required' => true])
								?>
							</div>
						</div>
						<div class="form-group">
							<?php
								Form::label('Report Type');
								Form::select('report_type' ,['daily' , 'monthly' , 'yearly'],'' , ['class' => 'form-control' , 'required' => true])
							?>
						</div>
						<?php echo wDivider(25)?>
						<div>
							<?php Form::submit('report_create' , 'Create Report')?>
						</div>
					<?php Form::close()?>
				</div>
			</div>
		</div>
	</div>
<?php endbuild()?>
<?php loadTo()?>