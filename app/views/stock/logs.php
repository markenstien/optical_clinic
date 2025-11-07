 <?php build('page-control')?>
    <div class="page-header">
        <div>
            <h1>Inventory Logs</h1>
            <p>records of your inventory movements</p>
        </div>
        <div class="header-actions">
            <a class="btn secondary" href="<?php echo _route('service:index')?>">
                <span>⬅️</span> Back
            </a>
        </div>
    </div>
    <?php endbuild()?>

<?php build('content') ?>
    <div class="card">
        <?php Flash::show()?>
        <div class="card-body">
            <h4 class="card-title">Logs</h4>
            <?php Form::open(['method' => 'get'])?>
				<div>
					<label for="#">End Date
						<?php Form::date('start_date', '', ['required' => true])?>
					</label>
					<label for="#">Start Date
						<?php Form::date('end_date', '', ['required' => true])?>
					</label>
				</div>

				<div>
					<?php Form::submit('', 'Filter Date')?>
                    <?php echo wLinkDefault(_route('stock:log'), 'Remove Filter')?>
				</div>
			<?php Form::close()?>

            <?php echo wDivider()?>
            <?php echo wLinkDefault('/'.request()->getCompleteURL().'&excel_export=true', 'Export')?>
            
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <th>#</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Origin</th>
                        <th>Remarks</th>
                        <th>Date</th>
                        <th>Expiry</th>
                        <th>Record Stamp</th>
                    </thead>

                    <tbody>
                        <?php foreach($logs as $key => $row) :?>
                            <tr>
                                <td><?php echo ++$key?></td>
                                <td><?php echo $row->service?></td>
                                <td><?php echo amountHTML($row->quantity) ?></td>
                                <td><?php echo $row->entry_origin?></td>
                                <td><?php echo $row->remarks?></td>
                                <td><?php echo $row->date?></td>
                                <td><?php echo $row->expiry_date?></td>
                                <td><?php echo $row->created_at?></td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php endbuild()?>
<?php loadTo()?>